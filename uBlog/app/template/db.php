<?php
$link = mysqli_connect ($dbhost, $dbusername, $dbpass); 
if (!$link) { echo ("Не могу подключиться к серверу базы данных!"); }
if(!mysql_select_db($dbname)) { echo "Не могу подключиться к базе данных $dbname!"; }

 function offset($array) { 
    $select = 'SELECT compname FROM companies WHERE id IN ('.$array.')';
    $query = mysql_query($select); 
    while ($row = mysql_fetch_array($query)) {
        echo ' '.$row['compname'];
    }
    }   
?>