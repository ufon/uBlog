<!DOCTYPE html>
<? include("/app/config.php"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="/styles/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/styles/dist/css/blog.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
         <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=$siteurl?>"><?=$sitename?></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="">Home</a></li>
			  <li><a href="/blog">Blog</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/contact">Contact</a></li>
			  <?php
			  if ($_SESSION['username']): $form = true; else: $form = false; endif?>
			  <?php if ($form == false) { ?>
			<form class="navbar-form navbar-right" action="<?=$siteurl?>?act=login&check" method="post">
            <div class="form-group">
              <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="pass" placeholder="Password" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Sign in</button>
          </form>
              <?php }?>
			  <?php if ($form == true) { ?>
			  <li class="navbar-right visible-md visible-lg hidden-xs" ><div class="btn-group " style="padding-top: 8px;">
  <a class="btn btn-custom" type="button" href="<?=$siteurl?>?act=profile"><?=$_SESSION['username']?></a>
  <button type="button" class="btn btn-custom dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="<?=$siteurl?>?act=profile">Action</a></li>
    <li><a href="<?=$siteurl?>?act=logout">Another action</a></li>
    <li><a href="<?=$siteurl?>?act=logout">Something else here</a></li>
    <li class="divider"></li>
    <li><a href="<?=$siteurl?>?act=logout">Logout</a></li>
  </ul>
</div></li>
			<hr class="hidden-md hidden-lg hidden-sm" style="border-top: 1px solid transparent;border-bottom: 1px solid transparent;-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 0 rgba(255, 255, 255, 0.1);box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1), 0 1px 0 rgba(255, 255, 255, 0.1);">
			<li class="hidden-md hidden-lg hidden-sm"><a href="">My profile</a></li>
            <li class="hidden-md hidden-lg hidden-sm"><a href="/contact">Logout</a></li>

		<?php }  ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div><!-- /.navbar -->