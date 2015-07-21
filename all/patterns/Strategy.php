<?php

interface Flys{
    public function fly(); 
}

class ItFlys implements Flys{
    public function fly(){
        return "Flying hight<br />";
    }
}

class CantFly implements Flys{
    public function fly() {
        return "Can't flying<br />";
    }
}

class Animal{
    public $flyingType;//composition object of interfaces Flys
    
    public function printAnimal(){
        echo "I ".$this->flyingType->fly()."<br />";
    }
    
    public function TryToFly(){
        return $this->flyingType->fly();
    }
    public function SetFlyingAbility(Flys $fl){
        $this->flyingType = $fl;
    }
} 

class Dog extends Animal{
    public function __construct() {
        $this->flyingType = new CantFly;
    }
}

class Bird extends Animal{
    public function __construct() {
        $this->flyingType = new ItFlys;
    }
}


$obj1 = new Dog;
$obj2 = new Bird;

$obj1->printAnimal();
$obj2->printAnimal();
$obj1->SetFlyingAbility(new ItFlys);
$obj1->printAnimal();