<?php
/**
 * 
 *  - Fill out a form
 *  - POST to PHP
 *  - Sanitize
 *  - Validate
 *  - return Data
 *  - Write to Database
 */
require_once 'form.php';
class Form {
    // @var array $_curentItem The immediately posted item
    private $_curentItem = null;
    // @var array $_postData Stores the Posted Data
    private $_postData = array();
    // @var object $_val The validator object
    private $_val = array();
    // @var array $_error Holds the current forms error
    private $_error = array();
    /**
     * __construct - Instantiates the validator class
     */
    function __construct() {
        $this->_val = new Val();
    }
    
    /**
     * post - this is to run $_POST
     * @param type $field - The HTML fieldname to post 
     */
    public function post($field){
        $this->_postData[$field] = $_POST[$field];
        $this->_curentItem = $field;
        //to chain methods
        return $this;
    }
    
    /**
     * getfetch - Return the posted data
     * @param mixed $fieldName
     * @return mixed String or array
     */
    public function getFetch($fieldName){
        if($fieldName){
            if(isse($this->_postData[$fieldName])){
                return $this->_postData[$fieldName];
            }
            
        }else{
            return $this->_postData;
        }
        
    }
    
    /**
     * val - this is to validate
     * @param string $typeOfValidator A method from the Form/Val class
     * @param string $arg A property to validate against 
     */
    public function val($typeOfValidator, $arg = null){
        // Example $val->length("dog", 2);
        if($arg == null){
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_curentItem]);
        }else{
            $error = $this->_val->{$typeOfValidator}($this->_postData[$this->_curentItem], $arg);
        }
        
        if($error){
            $this->_error[$this->_curentItem] = $error;
        }
        return $this;
    }
    
    /**
     * submit - HAndles the form, and throws an exception upon error
     * @return boolean
     * @throws Exception
     */
    public function submit(){
        if(emoty($this->_error)){
            return true;
        }else{
            $str = '';
            foreach ($this->_error as $key => $value){
                $str .= $key . ' => ' . $value . "\n";
            }
            throw new Exception($str);
        }
    }

}
