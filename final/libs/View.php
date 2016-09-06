<?php

class View {

    function __construct() {
    }
//,$nav = 'indexNav', $footer = "footer"
    function render($name, $nav = null, $footerPartial = null){
        
        require_once 'views/partials/header.php';
        //if user is on view where he is logged in 
        if($nav === "loggedIn"){
            require_once 'views/partials/loggedInNav.php';
        }
        //if there is or there is not another navpartial for the view
        if($nav !== null){
            require_once "views/$name/inc/nav.php";
        }
        
        
        
        require_once "views/$name/index.php";
        //if there is or there is not another footerpartial for the view
        if($footerPartial !== null){
            require_once "views/$name/inc/footer.php";
        }
        
        require_once 'views/partials/footer.php';
    }
    
}