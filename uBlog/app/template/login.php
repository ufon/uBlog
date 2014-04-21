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
    <!-- Wrap all page content here -->
<style>
body {
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
      <!-- Fixed navbar -->


      <!-- Begin page content -->
      <div class="container">
	<div style="padding-top: 30px;" ></div>
	  <?php
						
						if($_SESSION['msg']['login-err'])
						{
							
							echo '<div class="alert alert-danger" >'.$_SESSION['msg']['login-err'].'</div>';
							unset($_SESSION['msg']['login-err']);
						}
	?>

      <form class="form-signin" method="POST" action="?act=login&check">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name="username" class="form-control" placeholder="Email address" autofocus>
        <input type="password" name="pass" class="form-control" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>


      <!--/row-->
      </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/styles/assets/js/jquery.js"></script>
    <script src="/styles/dist/js/bootstrap.min.js"></script>
    <script src="/styles/dist/js/offcanvas.js"></script>
  </body>
</html>
<!-- /.container -->
