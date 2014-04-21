<?php
header('Content-type: text/html; charset=utf-8');

require_once("database.php");
require_once("pagination.php");

class Post extends Database
{
    public static function getBySql($sql) 
	{
		// Instantiate database object
		$database = new Database();
		
		// Execute database query
		return $database->executeSql($sql);
	}
	
	public static function getById($id) 
	{
		// Sanitize user input
		$id = (int)$id;
		
		// Build database query
		$sql = 'select * from articles where id='.$id.'';
		
		// Execute database query
		return self::getBySql($sql);					
	}

	public static function getAll() 
	{
		// Build database query
		$sql = 'select * from articles';

		// Execute database query
		return self::getBySql($sql);
	}

	public function getCount() {
	$query = 'SELECT COUNT(*) FROM articles';
	$result = $this->executeStatement($query);
	return $result;
	}
	
	public function getList($num) {	 
	$query = 'SELECT * FROM articles';
	$result = $this->executeStatement($query);
	return $result;
	}
	
	public function add($time, $title, $content, $category, $summary, $user_id)
    {
        mysql_query(
            "INSERT INTO articles ( Date, category, title, summary, content, user_id) VALUES( '$time' ,'$category', '$title', '$summary', '$content', '$user_id')"          
        );
    }

    public function del($id)
    {
		 mysql_query(
            "DELETE FROM articles WHERE id = $id"          
        );
    }

    public function update($id, $title, $content, $category, $summary, $user_id)
    {
		 mysql_query(
            "UPDATE articles SET ( Date, category, title, summary, content, user_id) VALUES( '$time' ,'$category', '$title', '$summary', '$content', '$user_id') WHERE id = $id"          
        );
    }
	
	public function addCom($time, $article_id, $title, $content, $name)
    {
          mysql_query(
            "INSERT INTO comments ( dt, article_id, name, body, email) VALUES( '$time' ,'$article_id', '$title', '$content', '$name')"          
        );
    }

}
?>