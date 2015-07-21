<?php

class Driver extends Controller{

    function __construct() {
        parent::__construct();
       
    }
    public function index(){
        $this->view->msg = "Просмотр статистики по водителям";
        $this->view->drivers = $this->model->selDrivers();
        $this->view->routs = $this->model->run();
        $this->view->render('driver/index');
    }
   
}