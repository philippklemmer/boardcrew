<?php

class Session {
    
    private static $_sessionStarted = false;
    
    /**
     *  Start Session
     *  Checks if Session allready started -> if it's true change $_sessionStarted to true
     */
    public static function init() {
        if(self::$_sessionStarted === false){
            @session_start();
            self::$_sessionStarted = true;
        }
    }
    /**
     * Set Session Value
     * @param type $key
     * @param type $value
     */
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    /**
     * Get Session Values
     * @param type $key
     * @param type $secondKey
     * @return boolean
     */
    public static function get($key, $secondKey = false){
        //checking if i want to get access to an associativen array
        if($secondKey){
            if(isset($_SESSION[$key][$secondKey])){
                return $_SESSION[$key][$secondKey];
            }
        //single value
        }else{
            if(isset($_SESSION[$key])){
                return $_SESSION[$key];
            }
        }
    }
    /**
     * Destroying the Session
     */
    public static function destroy(){
        if(self::$_sessionStarted == true){
            session_unset();
            session_destroy();
            //self::$_sessionStarted = false;
        }
    }
    /**
     * displaying the session variable
     */
    public static function display(){
        echo'<pre>';
        echo $_SESSION;
        echo'</pre>';
    }
}
