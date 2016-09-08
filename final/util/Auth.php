<?php
/**
 * Auth - handle Authentification for the views which are just avaible for logged in users
 */
class Auth {

    function __construct() {}
    
    public static function handleLogin(){
        if(Session::get('status') == false){
            Session::destroy();
            header('Location:' . URL .'index');
            exit;
        }
        
    }

}
