<?php
header('Content-type: text/html; charset=utf-8');

require_once("database.php");
require_once("pagination.php");

class City extends Database
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
		$sql = 'select * from cityies where id='.$id.'';
		
		// Execute database query
		return self::getBySql($sql);					
	}

	public static function getAll() 
	{
		// Build database query
		$sql = 'select * from cityies';

		// Execute database query
		return self::getBySql($sql);
	}
	
    public function getCity($id) {
	 mysql_query(
            "SELECT * FROM cityies WHERE id = $id"          
        );
	}

	public function getCountCity() {
	$query = mysql_numrows(mysql_query('select * from cityies'));
	return $query;
	}
	
	public function getListCity($num) {	 
	 mysql_query(
            "SELECT * FROM cityies"          
        );
	}
	
	public function addCity($name, $description)
    {
          mysql_query(
            "INSERT INTO cityies (cityname, alias) VALUES( '$name' ,'$description')"          
        );
    }
	
    public function delCity($id)
    {
		 mysql_query(
            "DELETE FROM cityies WHERE id = $id"          
        );
    }

    public function updateCity($id, $name, $description)
    {
		 mysql_query(
            "UPDATE cityies SET ( cityname, alias ) VALUES( '$name' ,'$description' ) WHERE id = $id"          
        );
    }
}	
?>