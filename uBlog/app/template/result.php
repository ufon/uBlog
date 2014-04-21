<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title></title>

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

	  
	  <? while ($row = mysql_fetch_array($result)) {?>
	       <h1><a href="<?=$siteurl?>view/<?=$row['id']?>/"><?=$row['title'];?></a></h1>   
			<p class="lead">by <a href="<?=$siteurl?>user/<?=$row['user_id']?>"><?=$row['username']?></a></p>
          <hr>
          <p><span class="glyphicon glyphicon-time"></span> </p>
          <hr>
          <img src="http://placehold.it/900x300" class="img-responsive">
          <hr>
          <p class="lead"><?=$row['summary']?></p>
          <a class="btn btn-primary" href="<?=$siteurl?>view/<?=$row['id']?>/">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>                  
          <hr>
    <? }?>

  </body>
</html>
<!-- /.container -->
