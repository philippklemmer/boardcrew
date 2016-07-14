<?php

class Boostrap {

    function __construct() {

        ini_set("display_errors",1);
        error_reporting(E_ALL);
        // wenn url gesetzt ist, dann gut, wenn nicht setzte sie gleich index
        $url = isset($_GET['url']) ? $_GET['url'] : null ;
        // wenn url leer ist setze url = index
        $url = empty($url) ? $_GET['url']='index' : $url ;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $file = 'controllers/' . $url[0] . '.php';
        if(file_exists($file)){
            require $file;
        }else{
            $this->error();
            return false;
            //return false funktioniert nicht in der funktion error
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

    public function error(){
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index();
        return false;
    }


}
