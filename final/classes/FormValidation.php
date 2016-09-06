<?php

class FormValidation {

    function __construct() {}

     /** Filter Usernames
     *  @param type $input
     *  @return boolean
     */
    public static function filterUsername($input) {
        $input = filter_var(trim($input), FILTER_SANITIZE_STRING);
    
        if(filter_var($input, FILTER_VALIDATE_REGEXP, array('options' => array ('regexp' => '/^[a-zA-Z\s]+/')))){
            return $input;
        }else{
            return false;
        }
    }
    
    /** Filter Emails
     *  @param type $input
     *  @return boolean
     */
    public static function filterEmail($input) {
        //Sanitize e-mail adress
        $input = filter_var(trim($input), FILTER_SANITIZE_EMAIL);
        //validate e-mail adress
        if(filter_var($input,FILTER_SANITIZE_EMAIL)){
            return $input;
        }else{
            return false;
        }
    }
    
    /** Filter Passwords
     *  @param type $input
     *  @return boolean
     */
    public static function filterPasswort($input) {
        //Trim entfernt Whitespace hinter und vor dem String
        $input = trim($input);

        //Wenn das Passwort nicht leer ist, wird es weiterverarbeitet
        if(!empty($input)){

            //das eingegebene Passwort mit einem passwort-Muster vergleichen
            if(preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/", $input)){
                // wenn das Passwort unserem Passwort-Muster entspricht
                return $input;
            }else{
                return false;
            }
        }
    }
    
    
}
