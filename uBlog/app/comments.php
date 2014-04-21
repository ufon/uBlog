<?php
header('Content-type: text/html; charset=utf-8');
require_once("db.php");
require_once("pagination.php");

    function getComment($id) {
	 mysql_query(
            "SELECT * FROM comments WHERE id = $id"          
        );
	}

	function getCountComment() {
	 $result = mysql_query(
            "SELECT COUNT(*) FROM comments"          
        );
	$row = mysql_result($result, 0);
	return $row;
	}
	
	function getListComment($num) {	 
	 mysql_query(
            "SELECT * FROM comments"          
        );
	}
	


    function delCom($id)
    {
		 mysql_query(
            "DELETE FROM comments WHERE id = $id"          
        );
    }

    function updateCom($id, $time, $article_id, $title, $content, $name)
    {
		 mysql_query(
            "UPDATE articles SET ( Date, article_id, title, content, name) VALUES( '$time' ,'$article_id', '$title', '$content', '$name') WHERE id = $id"          
        );
    }
?>