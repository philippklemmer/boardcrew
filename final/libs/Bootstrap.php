<?php

class Boostrap {

    function __construct() {

        ini_set("display_errors",1);
        error_reporting(E_ALL);
        // wenn url gesetzt ist, dann gut, wenn nicht setzte sie gleich index
        $url = isset($_GET['url']) ? $_GET['url'] : $_GET['url']='index';
        $url = rtrim($url, '/');
        $url = explode('/', $url);


        // if(empty($url[0]) || !class_exists($url[0]) ){
        //     require 'controllers/index.php';
        //     $controller = new Index();
        //     $controller->index();
        //     return false;
        // }

        $file = 'controllers/' . $url[0] . '.php';
        if(file_exists($file)){
            require $file;
        }else{
            $this->error();
        }
        $controller = new $url[0];
        $controller->loadModel($url[0]);

        // calling methods

        if(isset($url[2])){
            if(method_exists($controller, $url[1])){
                $controller->{$url[1]}($url[2]);
            }else{
                $this->error();
            }
        }else{
            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    $controller->{$url[1]}();
                    //Controller->function
                }else{
                    $this->error();
                }
            }else{
                $controller->index();
            }

        }

    }

    function error(){
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index();
        return false;
    }


}
