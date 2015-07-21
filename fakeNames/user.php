<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('Content-type: application/json');
if(!isset($_GET['query'])){
    echo json_encode([]);
    exit();
}

$db = new PDO("mysql: host=localhost;dbname=test","root","");

$users = $db->prepare(""
        . "SELECT id, username "
        . "from users "
        . "where username like :query");

$users->execute([
                    "query"=>$_GET['query']."%"
                ]);

echo json_encode($users->fetchAll());