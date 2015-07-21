<?php

class Controller {
    function __construct() {
        $this->view = new View();
    }
    
    public function createModel($name){
        $path = 'models/'.$name.'_model.php';
        if(file_exists($path)){
            require_once $path;
            $modelName= $name.'_Model';
            $this->model = new $modelName();
        }
    }

}
