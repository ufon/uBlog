<?php
session_start();

require_once("..\app\articles.php");
require_once("..\app\category.php");
require_once("..\app\db.php");

$article = isset($_GET['article']) ? $_GET['article'] : '';
$cat = isset($_GET['cat']) ? $_GET['cat'] : '';

function check_adm() {
if ($_SESSION['admin'] == 1) {
$_SESSION['edit'] = true;
$success = 'Вы админ!';
$urlto = 'project.ru/?act=admin';
}
return true;
}

function home_adm() {
if(isset($error)) {
include("/template/error.php");
}
require("/template/general.php");
}

function index_page() {
require("/app/template/admin/general.php");
}
?>