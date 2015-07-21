<?php
/*
require_once 'vendor/autoload.php';

$db = new PDO("mysql:host=localhost;dbname=test", "root", "");

if(!$db){
    echo "Error";
    die();
}


$faker = Faker\Factory::create();
echo $faker->userName;
foreach (range(1,10000) as $x){
    $db->query("INSERT INTO users(username) VALUES ('{$faker->userName}')");
}
*/?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>title</title>
        <link rel="stylesheet" href="css/global.css" />
    </head>
    <body>
        <form action="index.php" method="get" autocomplete="off">
            <input type="text" name="user" id="users">
            <input type="submit" value="Go">
            
        </form>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="js/typehead.js"></script>
        <script src="js/global.js"></script>
    </body>
</html>

<?php


