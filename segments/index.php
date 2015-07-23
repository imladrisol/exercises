<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Segment.php';

$arrSegm = [new Segment(0,1),
            new Segment(0,3),
            new Segment(2,5),
            new Segment(4,5),
    
            ];

$segmCommon = $arrSegm[0];
for($i=1; $i<count($arrSegm);$i++){
    //echo $arrSegm[$i]->getX1()." ";
    echo " Current segment : (".$arrSegm[$i];
    echo "); Common segment : (".$segmCommon.")<br />";
    if(($arrSegm[$i]->getX1() < $segmCommon->getX1()) && ($arrSegm[$i]->getX2() > $segmCommon->getX2())){
        $segmCommon->setX1($arrSegm[$i]->getX1());
        $segmCommon->setX2($arrSegm[$i]->getX2());
    }
    else if(($arrSegm[$i]->getX1() > $segmCommon->getX1()) && ($arrSegm[$i]->getX2() < $segmCommon->getX2())){
        
    }
    
    else if((($arrSegm[$i]->getX1() < $segmCommon->getX1() && $arrSegm[$i]->getX2() > $segmCommon->getX1())
            && ($arrSegm[$i]->getX2() < $segmCommon->getX2()))   )
        {
        
        $segmCommon->setX1($arrSegm[$i]->getX1());
    }
    else if((($arrSegm[$i]->getX1() > $segmCommon->getX1() && $arrSegm[$i]->getX1() < $segmCommon->getX2())
            && ($arrSegm[$i]->getX2() > $segmCommon->getX2()))   )
        {
        echo 4;
        $segmCommon->setX2($arrSegm[$i]->getX2());
    }
    else if(($arrSegm[$i]->getX1() < $segmCommon->getX1()) && ($arrSegm[$i]->getX2() == $segmCommon->getX2())){
        $segmCommon->setX1($arrSegm[$i]->getX1());
    }
    else if(($arrSegm[$i]->getX1() == $segmCommon->getX1()) && ($arrSegm[$i]->getX2() > $segmCommon->getX2())){
        $segmCommon->setX2($arrSegm[$i]->getX2());
    }
    
   echo "Common segment new: (".$segmCommon.")<br />";
}
