<?php

class Index extends Controller{

    function __construct() {
       parent::__construct();
    }
    public function index(){
          $this->view->msg = "Тестовое задание от компании КГК";
          $this->view->render('index/index');
         // print_r($this);
    }

}
