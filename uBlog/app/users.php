<?php
header('Content-type: text/html; charset=utf-8');

require_once("database.php");
require_once("pagination.php");

class Users extends Database
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
        $sql = 'select * from users where id='.$id.'';
        
        // Execute database query
        return self::getBySql($sql);                    
    }

    public static function getAll() 
    {
        // Build database query
        $sql = 'select * from users';

        // Execute database query
        return self::getBySql($sql);
    }

    public function getCount() {
    $query = 'SELECT COUNT(*) FROM users';
    $result = $this->executeStatement($query);
    return $result;
    }
    
    public function getList($num) {  
    $query = 'SELECT * FROM users';
    $result = $this->executeStatement($query);
    return $result;
    }
    
    public function add($name, $pass, $email)
    {
        mysql_query(
            "INSERT INTO users (username,pass,email,time) VALUES('.$name.','.md5($pass).','.$email.',NOW())"
            );
    }

    public function del($id)
    {
         mysql_query(
            "DELETE FROM users WHERE id = $id"          
        );
    }

    public function update($name, $bio)
    {
    
    $query = 'UPDATE articles SET (name, bio) VALUES('.$name.', '.$bio.') WHERE id = $id';
    $result = $this->executeStatement($query);
    return $result;
     
    }
}
?>