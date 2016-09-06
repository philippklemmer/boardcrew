<?php

class Validation {
    
     function __construct() {
        
    }
   
     /** Filter ImageSize
     *   @param type $input
     *   @return boolean
     */
    public static function FilterImgSize($imgSize) {
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
    public static function filterAllowedMimeType($imgType, $allowedMimeTypes = array("image/jpeg", "image/gif", "image/png")) {
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
    public static function filterAllowedExts($imgName, $allowedExts = array("jpg", "JPG", "jpeg","gif","png")) {
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

