<?php
header('Content-type: text/html; charset=utf-8');

define('INCLUDE_CHECK',true);

include("./app/functions.php");
include("./app/config.php");
include("./admin/functions_adm.php");

session_name('ufonlogin'); // Название cookies

session_set_cookie_params(2*7*24*60*60); // Параметры cookies

session_start(); // Запуск сесии

$blog = new General(); // Создаем обьект 

$act = isset($_GET['act']) ? $_GET['act'] : 'list';

switch ( $act ) {

	case 'cat':
		$blog->category();
	break;

	case 'blog':
		$blog->blog();
	break;

	case 'view':
		$blog->view();
    break;

	case 'list':
		$blog->homepage();
    break;

    case 'error':
		$blog->error();
    break;

	case 'register':
		$blog->register();
    break;

	case 'login':
		$blog->login();
    break;

	case 'add_com':
		$blog->add_com($_GET['id']);
    break;

	case 'search':
		$blog->search($_GET['name']);
    break;

	case 'logout':
		$blog->logout();
    break;

	case 'profile':
		$blog->profile();
    break;

    case 'rss':
		$blog->rss();
    break;

    case 'firms':
		$blog->firms();
    break;

	case 'admin':
	if (!$_SESSION['admin'] == 1) {
		require("/app/template/errorer.php");
	}
	else {
		include("./admin/admin.php");
	}
    break;
    
  default:
		$blog->homepage();
		
}
?>
