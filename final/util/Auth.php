<?php
/**
 * Auth - handle Authentification for the views which are just avaible for logged in users
 */
class Auth {

    function __construct() {}
    
    public static function handleLogin(){
        
        if(Session::get('loggedIn') == false){
            Session::destroy();
            header('Locations: ../index');
            exit;
        }
        
    }

}
