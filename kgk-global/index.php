<?php  

function __autoload($class_name) {
    include_once 'libs/' . $class_name . '.php';
}

require_once 'config/paths.php';
require_once 'config/database.php';

$app = new Bootstrap();

