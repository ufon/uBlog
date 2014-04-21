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
</style>
      <!-- Fixed navbar -->


      <!-- Begin page content -->
      <div class="container">
	<div style="padding-top: 30px;" ></div>
	   <?php						
						if($_SESSION['msg']['reg-err'])
						{
							echo '<div class="alert alert-danger" >'.$_SESSION['msg']['reg-err'].'</div>';
							unset($_SESSION['msg']['reg-err']);
						}
						
						if($_SESSION['msg']['reg-success'])
						{
							echo '<div class="alert alert-danger" >'.$_SESSION['msg']['reg-success'].'</div>';
							unset($_SESSION['msg']['reg-success']);
						}
					?>

<form class="form-signin" action="http://project.ru/?act=register&check" method="post" >
        <h2 class="form-signin-heading">Register</h2>  
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <input placeholder="Password" class="form-control" type="password" name="pass" /><br />
            <input placeholder="Password check" class="form-control" type="password" name="passverif" /><br />
            <input placeholder="E-mail" type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
            <input placeholder="Avatar (URL)" type="text" class="form-control" name="avatar" value="<?php if(isset($_POST['avatar'])){echo htmlentities($_POST['avatar'], ENT_QUOTES, 'UTF-8');} ?>" /><br />
        <textarea type="text" style="width: 100%;" name="bio" class="form-control" value="<?php if(isset($_POST['bio'])){echo htmlentities($_POST['bio'], ENT_QUOTES, 'UTF-8');} ?>"> </textarea> <br />
        <input type="submit" class="btn btn-large btn-primary" name="Зарегистрироваться" value="Sign up" />
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