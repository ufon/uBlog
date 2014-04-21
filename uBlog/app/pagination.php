<?php
$siteurl = "http://project.ru/";
##########################################################################################
##########################################################################################
function pagination($page, $count, $pages_count, $show_link)

	{
	echo '<ul class="pagination">';
	// $show_link - это количество отображаемых ссылок;

	// нагляднее будет, когда это число будет парное

	// Если страница всего одна, то вообще ничего не выводим

	if ($pages_count == 1) return false;

	$sperator = ' '; // Разделитель ссылок; например, вставить "|" между ссылками

	// Для придания ссылкам стиля

	$style = 'style="color: #808000; text-decoration: none;"';

	$begin = $page - intval($show_link / 2);

	unset($show_dots); // На всякий случай :)

	// Сам постраничный вывод

	// Если количество отображ. ссылок больше кол. страниц

	if ($pages_count <= $show_link + 1) $show_dots = 'no';

	// Вывод ссылки на первую страницу

	if (($begin > 2) && ($pages_count - $show_link > 2)) {

	echo '<li><a href=http://project.ru/blog/page/1>first</a></li>';

	}

	for ($j = 0; $j <= $show_link; $j++) // Основный цикл вывода ссылок

	{

	$i = $begin + $j; // Номер ссылки

	// Если страница рядом с началом, то увеличить цикл для того,

	// чтобы количество ссылок было постоянным

	if ($i < 1) continue;

	// Подобное находится в верхнем цикле

	if (!isset($show_dots) && $begin > 1) {

	echo ' <li><a href=http://project.ru/blog/page/'.($i-1).'>&laquo;</a></li> ';

	$show_dots = "no";

	}

	// Номер ссылки перевалил за возможное количество страниц

	if ($i > $pages_count) break;

	if ($i == $page) {

	echo ' <li class="active" ><a><b>'.$i.'</b></a></li> ';

	} else {
	
	echo ' <li><a href=http://project.ru/blog/page/'.$i.'>'.$i.'</a></li>';

	}

	// Если номер ссылки не равен кол. страниц и это не последняя ссылка

	if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

	// Вывод "..." в конце

	if (($j == $show_link) && ($i < $pages_count)) {

	echo ' <li><a href=http://project.ru/blog/page/'.($i+1).'>&raquo;</a></li> ';

	}

	}

	// Вывод ссылки на последнюю страницу

	if ($begin + $show_link + 1 < $pages_count) {

	echo ' <li><a href=http://project.ru/blog/page/'.$pages_count.'>last</a></li>';

	}
	echo '</ul>';
	return true;

	} // Конец функции
	
	
	
##########################################################################################
##########################################################################################

function pagination_admin($page, $count, $pages_count, $show_link)

	{
	echo '<ul class="pagination">';
	// $show_link - это количество отображаемых ссылок;

	// нагляднее будет, когда это число будет парное

	// Если страница всего одна, то вообще ничего не выводим

	if ($pages_count == 1) return false;

	$sperator = ' '; // Разделитель ссылок; например, вставить "|" между ссылками

	// Для придания ссылкам стиля

	$style = 'style="color: #808000; text-decoration: none;"';

	$begin = $page - intval($show_link / 2);

	unset($show_dots); // На всякий случай :)

	// Сам постраничный вывод

	// Если количество отображ. ссылок больше кол. страниц

	if ($pages_count <= $show_link + 1) $show_dots = 'no';

	// Вывод ссылки на первую страницу

	if (($begin > 2) && ($pages_count - $show_link > 2)) {

	echo '<li><a href=http://project.ru/admin/list/page/1>first</a></li>';

	}

	for ($j = 0; $j <= $show_link; $j++) // Основный цикл вывода ссылок

	{

	$i = $begin + $j; // Номер ссылки

	// Если страница рядом с началом, то увеличить цикл для того,

	// чтобы количество ссылок было постоянным

	if ($i < 1) continue;

	// Подобное находится в верхнем цикле

	if (!isset($show_dots) && $begin > 1) {

	echo ' <li><a href=http://project.ru/admin/list/page/'.($i-1).'>&laquo;</a></li> ';

	$show_dots = "no";

	}

	// Номер ссылки перевалил за возможное количество страниц

	if ($i > $pages_count) break;

	if ($i == $page) {

	echo ' <li class="active" ><a><b>'.$i.'</b></a></li> ';

	} else {
	
	echo ' <li><a href=http://project.ru/admin/list/page/'.$i.'>'.$i.'</a></li>';

	}

	// Если номер ссылки не равен кол. страниц и это не последняя ссылка

	if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

	// Вывод "..." в конце

	if (($j == $show_link) && ($i < $pages_count)) {

	echo ' <li><a href=http://project.ru/admin/list/page/'.($i+1).'>&raquo;</a></li> ';

	}

	}

	// Вывод ссылки на последнюю страницу

	if ($begin + $show_link + 1 < $pages_count) {

	echo ' <li><a href=http://project.ru/admin/list/page/'.$pages_count.'>last</a></li>';

	}
	echo '</ul>';
	return true;

	} // Конец функции

	##########################################################################################
##########################################################################################

function pagination_admin_cat($page, $count, $pages_count, $show_link)

	{
	echo '<ul class="pagination">';
	// $show_link - это количество отображаемых ссылок;

	// нагляднее будет, когда это число будет парное

	// Если страница всего одна, то вообще ничего не выводим

	if ($pages_count == 1) return false;

	$sperator = ' '; // Разделитель ссылок; например, вставить "|" между ссылками

	// Для придания ссылкам стиля

	$style = 'style="color: #808000; text-decoration: none;"';

	$begin = $page - intval($show_link / 2);

	unset($show_dots); // На всякий случай :)

	// Сам постраничный вывод

	// Если количество отображ. ссылок больше кол. страниц

	if ($pages_count <= $show_link + 1) $show_dots = 'no';

	// Вывод ссылки на первую страницу

	if (($begin > 2) && ($pages_count - $show_link > 2)) {

	echo '<li><a href=http://project.ru/admin/listcat/page/1>first</a></li>';

	}

	for ($j = 0; $j <= $show_link; $j++) // Основный цикл вывода ссылок

	{

	$i = $begin + $j; // Номер ссылки

	// Если страница рядом с началом, то увеличить цикл для того,

	// чтобы количество ссылок было постоянным

	if ($i < 1) continue;

	// Подобное находится в верхнем цикле

	if (!isset($show_dots) && $begin > 1) {

	echo ' <li><a href=http://project.ru/admin/listcat/page/'.($i-1).'>&laquo;</a></li> ';

	$show_dots = "no";

	}

	// Номер ссылки перевалил за возможное количество страниц

	if ($i > $pages_count) break;

	if ($i == $page) {

	echo ' <li class="active" ><a><b>'.$i.'</b></a></li> ';

	} else {
	
	echo ' <li><a href=http://project.ru/admin/listcat/page/'.$i.'>'.$i.'</a></li>';

	}

	// Если номер ссылки не равен кол. страниц и это не последняя ссылка

	if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

	// Вывод "..." в конце

	if (($j == $show_link) && ($i < $pages_count)) {

	echo ' <li><a href=http://project.ru/admin/listcat/page/'.($i+1).'>&raquo;</a></li> ';

	}

	}

	// Вывод ссылки на последнюю страницу

	if ($begin + $show_link + 1 < $pages_count) {

	echo ' <li><a href=http://project.ru/admin/listcat/page/'.$pages_count.'>last</a></li>';

	}
	echo '</ul>';
	return true;

	} // Конец функции
	
		##########################################################################################
##########################################################################################
	
	function pagination_cat($page, $count, $pages_count, $show_link)

	{	
	echo '<ul class="pagination">';
	// $show_link - это количество отображаемых ссылок;

	// нагляднее будет, когда это число будет парное

	// Если страница всего одна, то вообще ничего не выводим

	if ($pages_count == 1) return false;

	$sperator = ' '; // Разделитель ссылок; например, вставить "|" между ссылками

	// Для придания ссылкам стиля

	$style = '';

	$begin = $page - intval($show_link / 2);

	unset($show_dots); // На всякий случай :)

	// Сам постраничный вывод

	// Если количество отображ. ссылок больше кол. страниц

	if ($pages_count <= $show_link + 1) $show_dots = 'no';

	// Вывод ссылки на первую страницу

	if (($begin > 2) && ($pages_count - $show_link > 2)) {

	echo '<li><a href=http://project.ru/category/page/1/>first</a></li>';

	}

	for ($j = 0; $j <= $show_link; $j++) // Основный цикл вывода ссылок

	{

	$i = $begin + $j; // Номер ссылки

	// Если страница рядом с началом, то увеличить цикл для того,

	// чтобы количество ссылок было постоянным

	if ($i < 1) continue;

	// Подобное находится в верхнем цикле

	if (!isset($show_dots) && $begin > 1) {

	echo ' <li><a  href=http://project.ru/category/page/'.($i-1).'/>&laquo;</a></li> ';

	$show_dots = "no";

	}

	// Номер ссылки перевалил за возможное количество страниц

	if ($i > $pages_count) break;

	if ($i == $page) {

	echo ' <li class="active" ><a '.$style.' ><b>'.$i.'</b></a></li> ';

	} else {
	
	echo ' <li><a href=http://project.ru/category/page/'.$i.'/>'.$i.'</a></li>';

	}

	// Если номер ссылки не равен кол. страниц и это не последняя ссылка

	if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

	// Вывод "..." в конце

	if (($j == $show_link) && ($i < $pages_count)) {

	echo ' <li><a href=http://project.ru/category/page/'.($i+1).'/>&raquo;</a></li> ';

	}

	}

	// Вывод ссылки на последнюю страницу

	if ($begin + $show_link + 1 < $pages_count) {

	echo ' <li><a href=http://project.ru/category/page/'.$pages_count.'/>last</a></li>';

	}
	echo '</ul>';

	return true;

	}
	
##########################################################################################
##########################################################################################
	
	
	function pagination_cat_view($page, $count, $pages_count, $show_link, $getid)

	{
	echo '<ul class="pagination">';
	// $show_link - это количество отображаемых ссылок;

	// нагляднее будет, когда это число будет парное

	// Если страница всего одна, то вообще ничего не выводим

	if ($pages_count == 1) return false;

	$sperator = ' '; // Разделитель ссылок; например, вставить "|" между ссылками

	// Для придания ссылкам стиля

	$style = '';

	$begin = $page - intval($show_link / 2);

	unset($show_dots); // На всякий случай :)

	// Сам постраничный вывод

	// Если количество отображ. ссылок больше кол. страниц

	if ($pages_count <= $show_link + 1) $show_dots = 'no';

	// Вывод ссылки на первую страницу

	if (($begin > 2) && ($pages_count - $show_link > 2)) {

	echo '<li><a href=http://project.ru/category/'.$getid.'/page/1>first</a></li> ';

	}

	for ($j = 0; $j <= $show_link; $j++) // Основный цикл вывода ссылок

	{

	$i = $begin + $j; // Номер ссылки

	// Если страница рядом с началом, то увеличить цикл для того,

	// чтобы количество ссылок было постоянным

	if ($i < 1) continue;

	// Подобное находится в верхнем цикле

	if (!isset($show_dots) && $begin > 1) {

	echo ' <li><a href=http://project.ru/category/'.$getid.'/page/'.($i-1).'>&laquo;</a></li> ';

	$show_dots = "no";

	}

	// Номер ссылки перевалил за возможное количество страниц

	if ($i > $pages_count) break;

	if ($i == $page) {

	echo ' <li class="active" ><a><b>'.$i.'</b></a></li> ';

	} else {
	
	echo ' <li><a href=http://project.ru/category/'.$getid.'/page/'.$i.'>'.$i.'</a></li>';

	}

	// Если номер ссылки не равен кол. страниц и это не последняя ссылка

	if (($i != $pages_count) && ($j != $show_link)) echo $sperator;

	// Вывод "..." в конце

	if (($j == $show_link) && ($i < $pages_count)) {

	echo '<li> <a  href=http://project.ru/category/'.$getid.'/page/'.($i+1).'>&raquo;</a></li> ';

	}

	}

	// Вывод ссылки на последнюю страницу

	if ($begin + $show_link + 1 < $pages_count) {

	echo ' <li><a href=http://project.ru/category/'.$getid.'/page/'.$pages_count.'>last</a></li>';

	}
	echo '</ul>';
	return true;

	}
	
	function rdate($param, $time=0) {
	if(intval($time)==0)$time=time();
	$MonthNames=array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
	if(strpos($param,'M')===false) return date($param, $time);
		else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
}
?>