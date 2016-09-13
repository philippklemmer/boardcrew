<?php

ini_set("display_errors",1);
error_reporting(E_ALL);

function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


// const for paths
define('URL', 'http://localhost:8888/');
//home fritzix3100
//define('URL', 'http://192.168.188.31:8888/');
//uni
//define('URL', 'http://10.10.74.173:8888/');
//wlan00
//define('URL', 'http://192.168.1.3:8888/');

define ('DIR', realpath(dirname(__FILE__)));
define('USERPROFILE', '/Users/philipp/github/boardcrew/final/public/img/');

// Database config
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_PORT', '8888');
define('DB_NAME', 'pk_bc');
define('DB_USER', 'pk_bc');
define('DB_PASS', 'abc123');
