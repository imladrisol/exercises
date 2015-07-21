<?php
$a = array();
for($i=0; $i<100000; $i++)
{
    $a[] = $i+1;
}

$timeStart = microtime(true);

foreach ($a as $val){
    echo $val;
}
echo "<br />";
$timeGeneral = microtime(true)-$timeStart;
echo $timeGeneral;


$timeStart = microtime(true);

for($i=0; $i<100000; $i++){
    echo $a[$i];
}
echo "<br />";
$timeGeneral = microtime(true)-$timeStart;
echo $timeGeneral;

