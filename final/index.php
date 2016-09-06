<?php

//Import Config Files
require_once('config.php');
require_once('util/Auth.php');

/**
 * Import Library Files
 * Using autoloader function from php to load all Classes out of the libs directory
 */
spl_autoload_register(function($class){
    //loads dir -> classes
    if(file_exists($libFile = "classes/" . $class . ".php")){
        require_once($libFile);
    }
    //loads dir -> libs
    if(file_exists($libFile = "libs/" . $class . ".php")){
        require_once($libFile);
    }
});

$Bootstrap = new Bootstrap();
$Bootstrap->init();