<?php

class Database extends PDO{

    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        $opt = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
    parent::__construct("{$DB_TYPE}:host={$DB_HOST};dbname={$DB_NAME};charset=utf8", $DB_USER, $DB_PASS,$opt);
        
 
    }
    
  
    
 
}

