<?php
header('Content-type: text/html; charset=utf-8');

require_once("database.php");
require_once("pagination.php");

class Cat extends Database
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
	
    public function getCat($id) {
	 mysql_query(
            "SELECT * FROM categories WHERE id = $id"          
        );
	}

	public function getCountCat() {
	$query = mysql_numrows(mysql_query('select * from categories'));
	return $query;
	}
	
	public function getListCat($num) {	 
	 mysql_query(
            "SELECT * FROM categories"          
        );
	}
	
	public function addCat($name, $description)
    {
          mysql_query(
            "INSERT INTO categories ( name, description) VALUES( '$name' ,'$description')"          
        );
    }
	
    public function delCat($id)
    {
		 mysql_query(
            "DELETE FROM categories WHERE id = $id"          
        );
    }

    public function updateCat($id, $name, $description)
    {
		 mysql_query(
            "UPDATE categories SET ( name, description ) VALUES( '$name' ,'$description' ) WHERE id = $id"          
        );
    }
}	
?>