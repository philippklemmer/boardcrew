<?php

class View {

    function __construct() {
        
    }

    function render($name,$header = 'header', $footer = "footer"){
        require "views/partials/$header.php";
        require "views/$name.php";
        require "views/partials/$footer.php";
    }
    
}