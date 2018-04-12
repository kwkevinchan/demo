<?php
define('DB_SEREVERIP',  	 'localhost');
define('DB_USERNAME',		 'root');
define('DB_PASSWORD',		 '');
define('DB_DATABASE',		 'demo');

define('SET_CHARACTER', 	 'set character set utf8mb4');

define('ERROR_CONNECT', 	 'Connot connect serever');
define('ERROR_DATABASE',	 'Connot open database');
define('ERROR_CHARACTER',	 'Character set error');
define('ERROR_QUERY', 		 'Error in SQL Query');

define('DB_SOURCE', 'mysql:host='.DB_SEREVERIP.';dbname='.DB_DATABASE);

function db_open()
{
   try {
      $pdo = new PDO(DB_SOURCE, DB_USERNAME, DB_PASSWORD);   
      if(defined(SET_CHARACTER)) $pdo->query(SET_CHARACTER);
   } catch (PDOException $e) { die("Error!: " . $e->getMessage()); } 
      
   return $pdo;
}

function db_close(){
	
}
?>