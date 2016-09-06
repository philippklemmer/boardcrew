<?php

class Bootstrap {
    
    private $_url = null;
    private $_controller = null;
    
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';
    /**
     * Starts the Bootstrap
     */
    public function init(){
        //Sets the protected $_url
        $this->_getUrl();
        
        // load the default controllerif no URl is set
        if(empty($this->_url[0])){
            $this->_loadDefaultController();
        }
        $this->_loadExistingController();
        $this->_callControllerMethod();
    }
    /**
     * (Optional) Set a custom path to controller
     * @param string $path
     */
    public function setControllerPath($path){
        $this->_controllerPath = trim($path, "/") . "/";
    }
    /**
     * (Optional) Set a custom path to model
     * @param string $path
     */
    public function setModelPath($path){
        $this->_modelPath = trim($path, "/") . "/";
    }
    /**
     * (Optional) Set a custom path to error
     * @param string $path Use the filename only of your controller, eg: error.php
     */
    public function setErrorFile($path){
        $this->_errorFile = trim($path, "/") . "/";
    }
    /**
     * (Optional) Set a custom path to error
     * @param string $path Use the filename only of your controller, eg: error.php
     */
    public function setDefaultFile($path){
        $this->_defaultFile = trim($path, "/") . "/";
    }
    
    public function getUrl(){
        return $this->_url;
    }
    
    
    /**
     * Fetches the $_GET from 'url'
     * get Url
     */
    private function _getUrl(){
        // wenn url gesetzt ist, dann gut, wenn nicht setzte sie gleich index
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = empty($url) ? $_GET['url']='index' : $url ;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }
    /**
     * This loads if there is no Get parameter passed
     */
    private function _loadDefaultController(){
        require_once $this->_controllerPath . 'index.php';
        $this->_controller = new Index();
        $this->_controller->index();
    }
    /**
     * Load an existing controller if there IS a GET parameter passed
     * @return boolean|string
     */
    private function _loadExistingController(){
        
        $file = $this->_controllerPath . $this->_url[0] . '.php';
        
        if(file_exists($file)){
            require_once $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        }else{
            $this->_error();
        }
    }
    /**
    * If a method is passed in the GET url parameter
    * http://localhost/controller/method/(param)/(param)/(param)
    * url[0] = Controllername
    * url[1] = Method
    * url[2] = Param
    * url[3] = Param
    * url[4] = Param
    */
    private function _callControllerMethod(){
        
        $length = count($this->_url);
         
        //Make sure the method we are calling exists
        if($length > 1 ){
            if(!method_exists($this->_controller, $this->_url[1])){
                $this->_error();
            }
        }
        //Determine what to load
        switch($length){
            case 5:
                //Controller->Method(Param1, Param2, Param3)
                $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
                break;
        
            case 4:
                $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
                break;
        
            case 3:
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
        
            case 2:
                $this->_controller->{$this->_url[1]}();
                break;
            default:
                $this->_controller->index();
                break;
        }
    }
    
    /**
     * Diplay an error page if nothing exists
     * @return boolean
     */
    private function _error(){
        require_once $this->_controllerPath . $this->_errorFile;
        $this->_controller = new Error();
        $this->_controller->index();
        exit;
    }

}
