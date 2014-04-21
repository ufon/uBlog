<?php
header('Content-type: text/html; charset=utf-8');
class Database 

{
    
    private $connection;
    private $hostname;
    private $username;
    private $password;
    private $database;
        
    public function __construct()
    {
        $this->hostname = DATABASE_HOST;
        $this->username = DATABASE_USER;
        $this->password = DATABASE_PASSWORD;
        $this->database = DATABASE_NAME;        
    }
	
	public function error() {

	include("/template/errorer.php");
	}

    public function openConnection()
    {
        // Open database connection
        $this->connection = mysql_connect($this->hostname, $this->username, $this->password) 
            or $this->error("Ошибка соединения с базой данных!","Возможно произошел сбой...","Не переживайте все будет хорошо.");
        
        // Select target database
        mysql_select_db($this->database, $this->connection) 
            or $this->error("Ошибка соединения с базой данных!","Возможно произошел сбой...","Не переживайте все будет хорошо.");
    }

    public function closeConnection()
    {
        if (isset($this->connection)) {
            // Close database connection
            mysql_close($this->connection) 
                or $this->error("Ошибка соединения с базой данных!","Возможно произошел сбой...","Не переживайте все будет хорошо.");
        }
    }

    public function executeStatement($statement)
    {
        // Open database connection
        $this->openConnection();
        
        // Execute database statement
        $result = mysql_query($statement, $this->connection) 
            or $this->error("Ошибка соединения с базой данных!","Возможно произошел сбой...","Не переживайте все будет хорошо.");

        // Close database connection
        $this->closeConnection();
        
        // Return result
        return $result;
    }
	
	    public function executeStatementcout($statement)
    {
        // Open database connection
        $this->openConnection();
        
        // Execute database statement
        $result = mysql_numrows(mysql_query($statement, $this->connection)) 
            or $this->error("Ошибка соединения с базой данных!","Возможно произошел сбой...","Не переживайте все будет хорошо.");

        // Close database connection
        $this->closeConnection();
        
        // Return result
        return $result;
    }
    
    public function executeSql($sql)
    {
        // Execute database statement       
        $result = $this->executeStatement($sql);
        
        // Check number of rows returned
        if(mysql_num_rows($result) == 1) 
        {
            // Fetch one row from the result           
            $dataset = mysql_fetch_object($result);
        } 
        else 
        {
            // Fetch multiple rows from the result
            $dataset = array();     
            while ($row = mysql_fetch_object($result)) {
                $dataset[] = $row;
            }
        }
        
        // Close database cursor
        mysql_free_result($result);
        
        // Return dataset
        return $dataset;
    }

    public function executeDml($dml)
    {
        // Execute database statement
        $this->executeStatement($dml);
        
        // Return affected rows
        return mysql_affected_rows($this->connection);
    }
        
    public function sanitizeInput($value)
    {
        if (function_exists('mysql_real_escape_string')) 
        {
            if (get_magic_quotes_gpc()) 
            {
                // Undo magic quote effects
                $value = stripslashes($value);
            }
            // Redo escape using mysql_real_escape_string
            $value = mysql_real_escape_string($value);
        } 
        else 
        {
            if (!$this->get_magic_quotes_gpc()) 
            {
                // Add slashed manually
                $value = addslashes($value);
            }
        }
        // Return sanitized value
        return $value;
    }
}

?>