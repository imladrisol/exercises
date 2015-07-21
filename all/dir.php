<?php

function listDir($start){
    $listFile = scandir($start);
    foreach ($listFile as $val){
        if(is_dir("$start/$val") && (substr($val,0,1)!='.')){
            listDir("$start/$val");
        }
        else{
            echo "$start/$val</br>";
           
        }
        
    }
    /*echo "<pre>";
    print_r($listFile);
    echo "</pre>";*/
}

//listDir('/..');

define(myvalue, "10");
$myarray[10] = "Dog";
$myarray[] = "Human";
$myarray['myvalue'] = "Cat";
$myarray["Dog"] = "Cat";
print "The value is: ";
print $myarray[myvalue]."\n";