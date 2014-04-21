<!DOCTYPE html>
<? include("/app/config.php"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>uBlog - Admin page</title>

    <!-- Bootstrap core CSS -->
	<link href="/styles/dist/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="/styles/dist/js/redactor/jquery-1.9.0.min.js"></script>
	<!-- Redactor is here -->
	<link rel="stylesheet" href="/styles/dist/js/redactor/redactor.css" />
	<script src="/styles/dist/js/redactor/redactor.min.js"></script>
	
    <!-- Add custom CSS here -->
	    <link href="/styles/dist/css/simple-sidebar.css" rel="stylesheet">
	
    <link href="/styles/dist/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<style>
	.dropdown-menu {
position: inherit;
float: none;
display: none;
padding: 5px 0;
margin: 2px 0 0;
font-size: 14px;
list-style: none;
background-color: rgba(63, 63, 63, 0.53);
border: 1px solid #cccccc;
border: 1px solid rgba(0, 0, 0, 0.15);
-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
background-clip: padding-box;
border-radius: 0px;
}
</style>	

<script type="text/javascript">
	$(document).ready(
		function()
		{
			$('#redactor').redactor();
		}
	);
	</script>
  </head>

  <body>
  
    <div id="wrapper">
      
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <li class="sidebar-brand"><a href="#"><?=$sitename?></a></li>
          <li><a href="<?=$siteurl?>?act=admin">Dashboard</a></li>         
		  <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Article <b class="caret"></b></a>
        <ul class="dropdown-menu" >
          <li><a href="<?=$siteurl?>?act=admin&to=add_article">Add new</a></li>
          <li><a href="<?=$siteurl?>?act=admin&to=del_article">Delete</a></li>
          <li><a href="<?=$siteurl?>?act=admin&to=edit_article">Update</a></li>
          <li><a href="<?=$siteurl?>?act=admin&to=all_articles">All articles</a></li>
        </ul>
      </li>
	   <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <b class="caret"></b></a>
        <ul class="dropdown-menu" >
          <li><a href="<?=$siteurl?>?act=admin&to=add_article">Add new</a></li>
          <li><a href="<?=$siteurl?>?act=admin&to=del_category">Delete</a></li>
          <li><a href="<?=$siteurl?>?act=admin&to=edit_category">Update</a></li>
          <li><a href="<?=$siteurl?>?act=admin&to=all_categories">All categories</a></li>
        </ul>
      </li>
	  <li><a href="#">Contact</a></li>
    <li><a href="<?=$siteurl?>?act=admin&to=settings">Settings</a></li>
    <li><a href="<?=$siteurl?>">Go to site</a></li>
        </ul>
      </div>