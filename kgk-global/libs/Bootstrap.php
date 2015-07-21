<?php

class Bootstrap {

    function __construct() {
        
        $url = isset($_GET['url'])? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        
        //print_r($url);
        if(empty($url[0])){
            require_once 'controllers/index.php';
            $controller = new Index();
            
            $controller->index();
            
            return false;
        }
        
        $file = 'controllers/' . $url[0] . '.php';
        
        if(file_exists($file)){
            require_once $file;
        }
        else{
            
            require_once 'controllers/error.php';
            $controller = new Error();
            //throw new Exception("The file: $file doesn't exist");
            return false;
        }
        
        $controller = new $url[0]();
        $controller->createModel($url[0]);
        //calling methods
        if (isset($url[2])) {
            //echo "Method ".$url[1]."(".$url[2].")\n";
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                //echo "Method ".$url[1]."()\n";
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    
                    $this->error();
                }
            } else {
                $controller->index();
            }
        }
    }

    private function error() {
        require 'controllers/error.php';
        $controller->index();
    }

}
