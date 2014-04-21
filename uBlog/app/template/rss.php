<?php
$dbhost = "localhost"; // Имя хоста БД
$dbusername = "root"; // Пользователь БД
$dbpass = ""; // Пароль к базе
$dbname = "project.ru"; // Имя базы
$dbconnect = mysql_connect ($dbhost, $dbusername, $dbpass); 
$siteurl = 'project.ru';
$RSSnews= mysql_query("select * from articles");

$RSSLenta='<?xml version="1.0"  encoding="UTF-8"?>
<rss version="2.0">

<channel>
<title></title>
<link></link>
<description></description>
<language>ru-ru</language>
';

for ($i=1;$i<10;$i++){
$row = mysql_fetch_array($RSSnews);
$RSSLenta.= '	
<item>
 <title>'.$row['title'].'</title>
 <link><a href="'.$siteurl.'category/'.$row['id'].'/ " >'.$row['name'].'</a></link>
 <description>'.$row['summary'].'</description>
 <pubDate>'.$row['Data'].'</pubDate>
</item>
';
}

$RSSLenta.="
</channel>
</rss>";

//Запись RSS-ленты в файл
$file="rss.xml";
$fp = fopen($file, "w"); // "w" - создать новый файл или затереть текущий
fwrite($fp,$RSSLenta);
fclose($fp);

?>