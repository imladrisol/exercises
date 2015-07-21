<?php

function connect(){
    global $pdo;
    $pdo = new PDO("mysql:host=localhost;dbname=sakila","root","");
    
}

function getActors($letter){
    global $pdo;
    $q = $pdo->prepare("select actor_id, first_name, last_name from actor where last_name like :letter");
    $q->execute(array(':letter'=>$letter.'%'));
    return $q->fetchAll(PDO::FETCH_OBJ);
}

function getActorInfo($id){
    global $pdo;
    $q = $pdo->prepare("select actor_id,first_name, last_name, film_info from actor_info where actor_id = :id limit 1");
    $q->execute(array(':id'=>$id));
    return $q->fetch(PDO::FETCH_OBJ);
}