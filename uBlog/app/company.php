<?php
header('Content-type: text/html; charset=utf-8');

require_once("database.php");
require_once("pagination.php");

class Company extends Database
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
		$sql = 'select * from companies where id='.$id.'';
		
		// Execute database query
		return self::getBySql($sql);					
	}

	public static function getAll() 
	{
		// Build database query
		$sql = 'select * from companies';

		// Execute database query
		return self::getBySql($sql);
	}
	
    public function getCompany($id) {
	 mysql_query(
            "SELECT * FROM companies WHERE id = $id"          
        );
	}

	public function getCountCompany() {
	$query = mysql_numrows(mysql_query('select * from companies'));
	return $query;
	}
	
	public function getListCompany($num) {	 
	 mysql_query(
            "SELECT * FROM companies"          
        );
	}
	
	public function addCompany($name, $description)
    {
          mysql_query(
            "INSERT INTO companies (compname, alias) VALUES( '$name' ,'$description')"          
        );
    }
	
    public function delCompany($id)
    {
		 mysql_query(
            "DELETE FROM companies WHERE id = $id"          
        );
    }

    public function updateCompany($id, $name, $description)
    {
		 mysql_query(
            "UPDATE companies SET ( compname, alias ) VALUES( '$name' ,'$description' ) WHERE id = $id"          
        );
    }
}	
?>