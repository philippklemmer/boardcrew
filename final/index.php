<?php

//Import Config Files
require_once('config.php');
require_once('util/Auth.php');
//Import Classes
require_once('classes/Validation.php');
require_once('libs/form/Val.php');

/**
 * Import Library Files
 * Using autoloader function from php to load all Classes out of the libs directory
 */
spl_autoload_register(function($class){
    //load files from libs directory
    if(file_exists($libFile = "libs/" . $class . ".php")){
        require_once($libFile);
    }
});

$Bootstrap = new Bootstrap();
$Bootstrap->init();