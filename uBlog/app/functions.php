<?php
session_name('ufonlogin');
session_set_cookie_params(2*7*24*60*60);
session_start();
require_once("articles.php");
require_once("category.php");
require_once("users.php");
require_once("comments.php");
require_once("database.php");
require_once("config.php");

class General extends Database //Start Class

{
	public function offset($id) {	 
	$query = 'SELECT * FROM companies WHERE id = id';
	$result = $this->executeStatement($query);
	return $result;
	}

	public function search($str)
	{
		if (empty($str)) 
		{
			$this->error("Пусто!","Возможно вы ничего не ввели","Попробуйте еще раз.");
		}

		else 
		{

			$searchq = $str;
			$query = 'select articles.*,users.username from articles,users WHERE articles.user_id=users.id and title LIKE "%'.addslashes($searchq).'%"';
			$result = $this->executeStatement($query);

				if(mysql_num_rows($result)>0) 
				{
    				require("/template/result.php");
				}

				else 
				{
					$this->error("Ничего не найдено","Попробуйте еще раз.","Пожалуйста...");
				}
		}
	}

	public function checkEmail($str)
	{
		return preg_match("/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/", $str);
	}

	public function success($success,$urlto) 
	{
		require("/template/success.php");
	}

	public function generateCode($length=6) 
	{
    	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    	$code = "";
    	$clen = strlen($chars) - 1;  

    		while (strlen($code) < $length) 
    			{
            		$code .= $chars[mt_rand(0,$clen)];  
    			}

    	return $code;
	}

	public function logout() 
	{
		$_SESSION = array();
		session_destroy();
		header("Location: http:/$siteurl");
	}

	public function myprofile() 
	{
		$query = 'select * from users where id = '.$_SESSION['id'].'';
		$result = $this->executeStatement($query);
			if (isset($_GET["edit"])) 
			{
				require("/template/editprofile.php");
			}

			elseif (isset($_GET["update"])) 
			{
				$query = 'update users set name="'.$_POST['name'].'", bio="'.$_POST['bio'].'" where id="'.$_SESSION['id'].'"';
				$result = $this->executeStatement($query);
					if ($result) 
					{
						$this->success('Успешное обновление профиля',$siteurl);
					}

					else 
					{
						$this->success('Плохо дело.',$siteurl);
					}				
			}

			else 
			{
  				require("/template/users-view.php");
  			}
	}

	public function profile() 
	{
		if (!isset($_GET["id"]) || !$_GET["id"] ) 
		{
    		$this->myprofile();
    		return;
  		}

  		else 
  		{
  			$query = 'select * from users where id = '.$_GET['id'].'';
  			$result = $this->executeStatement($query);

  				if (empty($result))
  				{
					header("Location: ".$siteurl."/error");
				}

				if(mysql_num_rows($result)>0) 
				{
  					require("/template/users-view.php");
 				}

  				else {
  					header("Location: ".$siteurl."/error");
  				}
		}
	}

	public function register() 
	{
		if (isset($_GET['check'])) 
		{
			$err = array();
	
				if(strlen($_POST['username'])<4 || strlen($_POST['username'])>32)
				{
					$err[]='Имя пользователя должно содержать от 3 до 32 символов!';
				}
	
				if(preg_match('/[^a-z0-9\-\_\.]+/i',$_POST['username']))
				{
					$err[]='Ваше имя пользователя сожержит недопустимые символы!';
				}
	
				if(empty($_POST['pass']))
				{
					$err[]='Пароль не может быть пустым!';
				}
	
				if($_POST['pass'] !== $_POST['passverif'])
				{
					$err[]='Пароли не соответствуют';
				}
	
				if(!count($err))
				{
					$pass = $_POST['pass'];					
					$_POST['email'] = mysql_real_escape_string($_POST['email']);
					$_POST['username'] = mysql_real_escape_string($_POST['username']);
					mysql_query("INSERT INTO users (username,pass,email,time)
						VALUES(
						
							'".$_POST['username']."',
							'".md5($pass)."',
							'".$_POST['email']."',
							NOW()
							
						)");
				}

				if(count($err))
				{
					$_SESSION['msg']['reg-err'] = implode('<br>',$err);
					require("/template/register.php");
				}

				else 
				{
					$success = 'Успешная регистрация';
					$urlto = $siteurl;
					require("/template/success.php");
				}
	
    	}

		require("/template/register.php");
		exit;

	}

	public function login() {
		if (isset($_GET['check'])) 
		{
			$err = array();	
				if(empty($_POST['username'])) 
				{
				$err[] = 'Все поля должны быть заполнены!';
				}
			
	
				if(!count($err))
				{
					$_POST['username'] = mysql_real_escape_string($_POST['username']);
					$_POST['pass'] = mysql_real_escape_string($_POST['pass']);
					$_POST['rememberMe'] = (int)$_POST['rememberMe'];
					$row = mysql_fetch_assoc(mysql_query("SELECT id,username,admin FROM users WHERE username='{$_POST['username']}' AND pass='".md5($_POST['pass'])."'"));

				if($row['username'])
				{
					$_SESSION['username']=$row['username'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['rememberMe'] = $_POST['rememberMe'];
					$hash = md5($this->generateCode(10));
					mysql_query("UPDATE users SET hash='".$hash."' WHERE id='".$row['id']."'");
					setcookie("id", $row['id'], time()+60*60*24*30);
					setcookie("hash", $hash, time()+60*60*24*30);
					if($row['admin'] == 1){
					$_SESSION['admin'] = 1;
				}

			setcookie('ufonRemember',$_POST['rememberMe']);
		}

		else $err[]='Ошибочный пароль или/и имя пользователя!';

		}
	
		if($err) 
		{
			$_SESSION['msg']['login-err'] = implode('<br />',$err);
			require("/template/login.php");
		}

		else 
		{
			$this->success('Успешная авторизация',$siteurl);
		}

		}

		else {
			require("/template/login.php");
		}
	}

	public function category() 
	{
		if(isset($_GET['id'])) 
		{
			$perpage = 3; // Количество отображаемых данных из БД

			if (empty($_GET['page']) || ($_GET['page'] <= 0)) 
			{
				$page = 1;
			}

			else 
			{
				$page = (int) $_GET['page']; // Считывание текущей страницы
			}

			$count = mysql_numrows(mysql_query('select * from articles where category = '.$_GET['id'].'')) or header("Location: http".$siteurl."/error");
			$pages_count = ceil($count / $perpage); // Количество страниц


			if ($page > $pages_count) 
			{ // Если номер страницы оказался больше количества страниц


				$page = $pages_count;
			}

			$start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД

			$result = mysql_query('select articles.*,users.username from articles,users where articles.user_id=users.id and articles.category = '.$_GET['id'].' limit '.$start_pos.', '.$perpage) or header("Location: http".$siteurl."/error");

			require("/template/view-cat.php");
		}

		else 
		{
			$perpage = 5; // Количество отображаемых данных из БД
				if (empty($_GET['page']) || ($_GET['page'] <= 0)) 
				{
					$page = 1;
				} 

				else 
				{

				$page = (int) $_GET['page']; // Считывание текущей страницы

				}

			$count = mysql_numrows(mysql_query('select * from categories')) or header("Location: http".$siteurl."/error");// Общее количество информации
			$pages_count = ceil($count / $perpage); // Количество страниц

				if ($page > $pages_count) // Если номер страницы оказался больше количества страниц
				{ 
				$page = $pages_count;
				}

			$start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД


			$result = mysql_query('select * from categories limit '.$start_pos.', '.$perpage) or header("Location: http".$siteurl."/error");// Вызов функции, для вывода ссылок на экран


			require("/template/category.php");
		}
 	}

	public function view() 
	{
		if ( !isset($_GET["id"]) || !$_GET["id"] ) 
		{
    		homepage();
    		return;
  		}	

  		else 
  		{
  			$result = mysql_query('select articles.*,users.username from articles,users where articles.user_id=users.id and articles.id = '.$_GET['id'].'') or header("Location: http".$siteurl."/error");
  			$comments = mysql_query('select * from comments where comments.article_id='.$_GET['id'].'') or header("Location: http".$siteurl."/error");

  				if (empty($result) or empty($comments))
  				{
					header("Location: http".$siteurl."/error");
				}

				if(mysql_num_rows($result)>0) 
				{
  					require("/template/view.php");  
  				}

  				else 
  				{
  					header("Location: http".$siteurl."/error");
  				}
		}
	}

		public function viewfirm() 
	{
		if ( !isset($_GET["id"]) || !$_GET["id"] ) 
		{
    		exit('123');
    		return;
  		}	

  		else 
  		{
  			$result = mysql_query('select firms.*,cityies.cityname from firms,cityies where firms.city=cityies.id and firms.id = '.$_GET['id'].'') or header("Location: http".$siteurl."/error"); 			

				if(mysql_num_rows($result)>0) 
				{
  					require("/template/view-firm.php");  
  				}

  				else 
  				{
  					header("Location: http".$siteurl."/error");
  				}
		}
	}

	public function add_com($id) 
	{
		$r = mysql_query('select id from articles where id = '.$id.'') or header("Location: http".$siteurl."/error");

			if(!mysql_num_rows($r)>0) 
			{ 
  				header("Location: http".$siteurl."/error");
			}

			elseif ( empty($_POST['name']) or empty($_POST['email']) or empty($_POST['body']) or empty($id)) 
			{
				header("Location: http".$siteurl."/error");
			}

			else 
			{
				$time = time();
				$article_id = $id;
				$name = $_POST['name'];
				$body = $_POST['body'];
				$email = $_POST['email'];
					mysql_query(
            		"INSERT INTO comments ( dt, article_id, name, body, email) VALUES( NOW() ,'$article_id', '$name', '$body', '$email')"          
        			);
				header("Location: http://www$siteurlview/$id/");
			}
	}

	public function blog() 
	{
		$perpage = 5; // Количество отображаемых данных из БД

			if (empty($_GET['page']) || ($_GET['page'] <= 0)) 
			{

				$page = 1;

			} 

			else 
			{

				$page = (int) $_GET['page']; // Считывание текущей страницы

			}

// Общее количество информации
		$count = mysql_numrows(mysql_query('select * from articles')) or header("Location: http".$siteurl."/error");
		$pages_count = ceil($count / $perpage); // Количество страниц

// Если номер страницы оказался больше количества страниц

			if ($page > $pages_count) 
			{

			$page = $pages_count;

			}

		$start_pos = ($page - 1) * $perpage; // Начальная позиция, для запроса к БД

		$result = mysql_query('select articles.*,users.username from articles,users  WHERE articles.user_id=users.id ORDER BY Date DESC limit '.$start_pos.', '.$perpage) or header("Location: http".$siteurl."/error"); // Вызов функции, для вывода ссылок на экран

		require("/template/blog.php");
	}

	public function homepage() 
	{
		require("/template/homepage.php");
	}

	public function rss() 
	{
		require("/template/rss.php");
	}

} //End Class
?>