<?php


class Segment {
    private $x1;
    private $x2;
    
    public function __construct($x1=0, $x2=0) {
        $this->x1 = $x1;
        $this->x2 = $x2;
    }
    
    public function getX1() {
        return $this->x1;
    }
    public function setX1($param) {
        $this->x1 = $param;
    }
    public function getX2() {
        return $this->x2;
    }
    public function setX2($param) {
        $this->x2 = $param;
    }
    
    public function __toString() {
        return $this->getX1()." ".$this->getX2();
    }
}

