<?php
session_start();
require_once "./config/consts.php";
spl_autoload_register('autoload');
function autoload($class_name){
    $array_paths = array(
        "database/",
        "models/",
        "controllers/"
    );
    $parts = explode('\\',$class_name);
    $name =array_pop($parts);
    foreach($array_paths as $path){
        $file = sprintf($path.'%s.php',$name);
        if(is_file($file)){
            require_once $file;
        }
    }
}