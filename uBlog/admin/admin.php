<?php
session_start();

$to = isset($_GET['to']) ? $_GET['to'] : 'list';

require_once("functions_adm.php");

switch ( $to ) {
  case 'add_article':       
		    add_article();
  break;  
  case 'add_category':    
        add_category();
  break;
  case 'all_articles':    
        all_articles();
  break;
  case 'all_categories':    
        all_categories();
  break;
  case 'del_article':       
        del_article($_GET['id']);
  break;
  case 'del_category':       
        del_category($_GET['id']);
  break;
  case 'edit_article':       
        edit_article($_GET['id']);
  break;
  case 'edit_category':       
        edit_category($_GET['id']);
  break;
    case 'settings':       
        settings_page();
  break;

  default:
index_page();
}
?>
