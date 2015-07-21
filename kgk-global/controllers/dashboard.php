<?php

class Dashboard extends Controller{

    function __construct() {
        parent::__construct();
       
    }
    public function index(){
        $this->view->msg = "Просмотр маршрутов";
        $this->view->drivers = $this->model->selDrivers();
        $this->view->routs = $this->model->run();
        
        $this->view->render('dashboard/index');
    }
   
}