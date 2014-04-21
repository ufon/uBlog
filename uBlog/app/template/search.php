<? 
	$db = mysql_connect("localhost","root","");
	mysql_select_db("project.ru",$db);	
if (empty($_GET['name'])) {
echo 'nothing';
}
else {
$searchq = $_GET['name'];



$getName = mysql_query('SELECT * FROM articles WHERE title LIKE "%'.addslashes($searchq).'%"');

while ($row = mysql_fetch_array($getName))

    echo $row['title'] . '<br/>';
	
}
?>