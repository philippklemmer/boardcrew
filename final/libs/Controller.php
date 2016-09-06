<?php

class Controller {
    
    //model and view attributes
    protected $model;
    protected $view;
    /**
     * Instanciate the View
     */
    public function __construct() {
        $this->view = new View();
    }
    /**
     * Load the Models of the controller with the same name || Keep Attention on naming conventions
     * @param string $name Name of the model
     * @param string $modelPath Location of the model
     */
    public function loadModel($name, $modelPath = 'models/'){
        //define Model name and path 
        $model_file = 'models/' . $name . '_model.php';
        $model_name = $name . '_Model';
        
        if(file_exists($model_file)){
            //create Model Object
            require $model_file;
            $this->model = new $model_name;
        }
        
    }
}