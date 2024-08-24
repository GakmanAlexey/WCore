<?php
set_time_limit(20);

define("MYPOS" , __DIR__);
define("SLASH" ,"/");

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

ini_set('session.gc_maxlifetime', 8640000);
ini_set('session.cookie_lifetime', 8640000);
session_set_cookie_params(0);

spl_autoload_register(function ($class_name) {   
    $class_name = str_replace('\\','/',$class_name);
    $class_name = strtolower($class_name);
    if(file_exists(MYPOS."/".$class_name . '.php')){include_once MYPOS."/".$class_name . '.php';}
    
});
session_start();

$Core = new \Mod\Core\Modul\Core;


//ya123 ya123ya123

?>