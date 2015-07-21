<?php

class Error  extends Controller{

    function __construct() {
        parent::__construct();
       // print_r($langFile);  
    }
     public function index(){ 
  
        $this->view->msg = "This page doesn't exist!!!<br />";
        $this->view->render('error/index');
    }
    
   
}

