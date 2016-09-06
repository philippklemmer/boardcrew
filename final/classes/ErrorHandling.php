<?php
/**
 * This class saves the errors and you can get access through them in the view
 */
class ErrorHandling {

    private $_errors = [];
    
    function __construct() {}
    
    public static function setError($key, $value){
        $this->_errors = $error[$key] = $value;
    }
    
    public static function getError($key){
        return $this->_errors[$key];
    }

}