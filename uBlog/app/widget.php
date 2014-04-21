<? 
$dbhost = "localhost"; // Имя хоста БД
$dbusername = "root"; // Пользователь БД
$dbpass = ""; // Пароль к базе
$dbname = "project.ru"; // Имя базы
$dbconnect = mysql_connect ($dbhost, $dbusername, $dbpass); 
$query = mysql_query("select * from categories");        
        for ($i=0; $i<mysql_num_rows($query); $i++) 
          { 
        $row = mysql_fetch_array($query); 
        echo '<a href="'.$siteurl.'category/'.$row['id'].'/" class="list-group-item">'.$row['name'].'</a>'; 
          } ?>