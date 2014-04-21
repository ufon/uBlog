<?php
header('Content-type: text/html; charset=utf-8');
session_start();
$article = isset($_GET['article']) ? $_GET['article'] : '';
$cat = isset($_GET['cat']) ? $_GET['cat'] : '';
$siteurl = 'opensource.ru';

function check_adm() {
if ($_SESSION['admin'] == 1) {
$_SESSION['edit'] = true;
}
return true;
}

function check_image() {
print_r($_GET);
print_r($_POST);
}

function home_adm() {
if (!$_SESSION['admin'] == 1 or $_SESSION['edit'] = false) {
require("/app/template/error.php");
}
else {
index_page();
}
}

function settings_page() {
if (!$_SESSION['admin'] == 1 or $_SESSION['edit'] = false) {
require("/app/template/error.php");
}
else {
require("/template/settings.php");
}
}

function index_page() {
all_articles();
}

function add_article() {
$post = new Post();
if (!$_SESSION['admin'] == 1 or $_SESSION['edit'] = false) {
require("/app/template/error.php");
}
elseif ($_POST['header']) {
		$time = time();
        $post->add($time, $_POST['header'], $_POST['content'], $_POST['category'], $_POST['summary'], $_SESSION['id']);
		$success = 'Запись успешно добавлена';
		$urlto = ''.$siteurl.'/?act=admin';
		require("/app/template/success.php");
}
else {
require("/template/add_article.php");
}
}

function add_firm() {
$post = new Firm();
if (!$_SESSION['admin'] == 1 or $_SESSION['edit'] = false) {
require("/app/template/error.php");
}
elseif ($_POST['name']) {
    $time = time();
    $post->addFirm($_POST['name'], $_POST['desc'], $_POST['checkFirm'], $_POST['city']);
    $success = 'Запись успешно добавлена';
    $urlto = ''.$siteurl.'/?act=admin';
    require("/app/template/success.php");
}
else {
require("/template/add_firm.php");
}
}

function add_company() {
$post = new Company();
if (!$_SESSION['admin'] == 1 or $_SESSION['edit'] = false) {
require("/app/template/error.php");
}
elseif ($_POST['name']) {
    $time = time();
    $post->addCompany($_POST['name'], $_POST['alias']);
    $success = 'Запись успешно добавлена';
    $urlto = ''.$siteurl.'/?act=admin';
    require("/app/template/success.php");
}
else {
require("/template/add_company.php");
}
}

function add_city() {
$post = new City();
if (!$_SESSION['admin'] == 1 or $_SESSION['edit'] = false) {
require("/app/template/error.php");
}
elseif ($_POST['name']) {
    $time = time();
    $post->addCity($_POST['name'], $_POST['alias']);
    $success = 'Запись успешно добавлена';
    $urlto = ''.$siteurl.'/?act=admin';
    require("/app/template/success.php");
}
else {
require("/template/add_city.php");
}
}

function add_category() {
  $cat = new Cat();
  if (!$_SESSION['admin'] == 1 or $_SESSION['edit'] = false) 
  {
    require("/app/template/error.php");
  }
  elseif ($_POST['name']) 
  {
		$time = time();
    $cat->addCat($_POST['name'], $_POST['description']);
		$success = 'Вы добавили категорию';
		$urlto = ''.$siteurl.'/?act=admin';
		require("/app/template/success.php");
  }
  else 
  {
  require("/template/add_category.php");
  }
}

function edit_article($id) {
$post = new Post();
if(isset($_GET['check'])) {
mysql_query('update articles set title="'.$_POST['header'].'", content="'.$_POST['content'].'", summary="'.$_POST['summary'].'", category="'.$_POST['category'].'", user_id="'.$_POST['user_id'].'" where id="'.$id.'"') or header('Location: http://www.'.$siteurl.'/error');
		$success = 'Вы пиздюк';
		$urlto = ''.$siteurl.'/?act=admin';
}
if ( !isset($id) || !$id ) {
    all_articles();
    return;
}
  else {
  $result = mysql_query('select articles.*,categories.* from articles,categories where articles.id= '.$id.' and articles.category=categories.id ') or header('Location: http://www.'.$siteurl.'/error');
  if (empty($result)){
	header('Location: http://www.'.$siteurl.'/error');
	}
  if(mysql_num_rows($result)>0) {
  require("/template/edit_article.php");  
  }
  else {
  header('Location: http://www.'.$siteurl.'/error');
  }
}
}



function edit_category($id) {
$post = new Cat();
if(isset($_GET['check'])) {
        mysql_query('update categories set name="'.$_POST['name'].'", description="'.$_POST['description'].'" where id="'.$id.'"') or header('Location: http://www.'.$siteurl.'/error');
		$success = 'Вы обновили категорию';
		$urlto = ''.$siteurl.'/?act=admin';
		header("/app/template/success.php");
}
if ( !isset($id) || !$id ) {
    all_articles();
    return;
}
  else {
  $result = mysql_query('select * from categories where id= '.$id.' ') or header('Location: http://www.'.$siteurl.'/error');
  if (empty($result)){
  header('Location: http://www.'.$siteurl.'/error');
	}
  if(mysql_num_rows($result)>0) {
  require("/template/edit_category.php");  
  }
  else {
  header('Location: http://www.'.$siteurl.'/error');
  }
}
}

function del_article($id) {
if (empty($id)) {
 require("/template/del_article.php");
}
else {
$post = new Post();
$post->del($id);
		$success = 'Вы удалили запись';
		$urlto = ''.$siteurl.'/?act=admin';
		require("/app/template/success.php");
}
}

function del_category($id) {
if (empty($id)) {
 require("/template/del_category.php");
}
else 
{
  $cat = new Cat();
  $cat->delCat($id);
  $success = 'Вы удалили категорию';
  require("/app/template/success.php");
}
}

function all_categories() {
$perpage = 5; // Количество отображаемых данных из БД
$nocategories = 0;
if (empty($_GET['page']) || ($_GET['page'] <= 0)) {

$page = 1;

} else {

$page = (int) $_GET['page']; // Считывание текущей страницы

}

// Общее количество информации
$count = mysql_numrows(mysql_query('select * from categories')) or $nocategories = 1;
$pages_count = ceil($count / $perpage); // Количество страниц

// Если номер страницы оказался больше количества страниц

if ($page > $pages_count) $page = $pages_count;

$start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД

// Вызов функции, для вывода ссылок на экран




$result = mysql_query('select * from categories limit '.$start_pos.', '.$perpage) or $nocategories = 1;

require("/template/listcat.php");
}

function all_articles() {
$noarticles = 0;
if (!$_SESSION['admin'] == 1 or $_SESSION['edit'] = false) {
exit ('you lox');
}

$perpage = 5; // Количество отображаемых данных из БД

if (empty($_GET['page']) || ($_GET['page'] <= 0)) {

$page = 1;

} else {

$page = (int) $_GET['page']; // Считывание текущей страницы

}
// Общее количество информации
$count = mysql_numrows(mysql_query('select * from articles'));
$pages_count = ceil($count / $perpage); // Количество страниц

// Если номер страницы оказался больше количества страниц

if ($page > $pages_count) $page = $pages_count;

$start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД

// Вызов функции, для вывода ссылок на экран

$result = mysql_query('select articles.*,users.username from articles,users WHERE articles.user_id=users.id limit '.$start_pos.', '.$perpage);

require("/template/list.php");
}

function crop($image, $x_o, $y_o, $w_o, $h_o) {
    if (($x_o < 0) || ($y_o < 0) || ($w_o < 0) || ($h_o < 0)) {
      echo "Некорректные входные параметры";
      return false;
    }
    list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)
    $types = array("", "gif", "jpeg", "png"); // Массив с типами изображений
    $ext = $types[$type]; // Зная "числовой" тип изображения, узнаём название типа
    if ($ext) {
      $func = 'imagecreatefrom'.$ext; // Получаем название функции, соответствующую типу, для создания изображения
      $img_i = $func($image); // Создаём дескриптор для работы с исходным изображением
    } else {
      echo 'Некорректное изображение'; // Выводим ошибку, если формат изображения недопустимый
      return false;
    }
    if ($x_o + $w_o > $w_i) $w_o = $w_i - $x_o; // Если ширина выходного изображения больше исходного (с учётом x_o), то уменьшаем её
    if ($y_o + $h_o > $h_i) $h_o = $h_i - $y_o; // Если высота выходного изображения больше исходного (с учётом y_o), то уменьшаем её
    $img_o = imagecreatetruecolor($w_o, $h_o); // Создаём дескриптор для выходного изображения
    imagecopy($img_o, $img_i, 0, 0, $x_o, $y_o, $w_o, $h_o); // Переносим часть изображения из исходного в выходное
    $func = 'image'.$ext; // Получаем функция для сохранения результата
    return $func($img_o, $image); // Сохраняем изображение в тот же файл, что и исходное, возвращая результат этой операции
}
?>