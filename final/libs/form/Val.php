<?php

class Val {

    function __construct() {
        
    }
    
    public function minLength($data, $arg){
        if(strlen($data < $arg)){
            return "Your string can only $arg long";
        }
    }
    
    public function maxLength($data, $arg){
        if(strlen($data > $arg)){
            return "Your string can only $arg long";
        }
    }
    
    public function integer($data){
        if(strlen(ctype_digit($data) == false)){
            return "Your string must be an Integer";
        }
    }
    
    public function __call($name, $arguments) {
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }
    
    /** Filter Usernames
     *  @param type $input
     *  @return boolean
     */
    public function filterUsername($input) {
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
    public function filterEmail($input) {
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
    public function filterPasswort($input) {
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
    
     /** Filter ImageSize
     *   @param type $input
     *   @return boolean
     */
    public function FilterImgSize($imgSize) {
        //250kb
        if($imgSize > 250000){
            //Bild zu groß
            return false;
        }else{
            return true;
        }
    }
    /**  Filter MimeType for Images
     *   @param type $input
     *   @return boolean
     */
    public function filterAllowedMimeType($imgType, $allowedMimeTypes = array("image/jpeg", "image/gif", "image/png")) {
        if(is_array($allowedMimeTypes)){

            if(in_array($imgType, $allowedMimeTypes) === false){
                return false;
            }else{
                return true;
            }
        }else{
            // allowedMimeTyoes im falschen Format übergeben
            return false;
        }
    }
    
    /**  Filter Extensions for Images
     *   @param type $input
     *   @return boolean
     */
    public function filterAllowedExts($imgName, $allowedExts = array("jpg", "JPG", "jpeg","gif","png")) {
        //Datei-Endung herausfinden
        $stringParts = explode(".", $imgName);
        //"end" holt den letzten Wert aus StringParts (=Array)
        $extension = end($stringParts);

        if(in_array($extension, $allowedExts) === false){
            //nicht erlaubte Endung
            return false;
        }else{
            //Datei-Endung erlaubt
            return true;
        }
    }

}

