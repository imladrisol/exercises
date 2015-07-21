<?php

require_once 'functions.php';

connect();

if(isset($_GET['id'])){
    $actor = getActorInfo($_GET['id']);
    if($actor){
        echo "<h1>  ".$actor->first_name." ".$actor->last_name ."</h1>";
        echo "<p>".$actor->film_info ."</p>";
    }
    else{
        echo "Actor doesn't exists";
    }
}
?>
<p><a href="index.php">Back home</a></p>