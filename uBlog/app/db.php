<?php
require_once("config.php");
$dbconnect = mysql_connect ($dbhost, $dbusername, $dbpass); 
if (!$dbconnect) { echo ("Не могу подключиться к серверу базы данных!"); }

if(!mysql_select_db($dbname)) { echo "Не могу подключиться к базе данных $dbname!"; }

?>