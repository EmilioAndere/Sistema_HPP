<?php

    require '../vendor/autoload.php';
    require_once '../config/Autoload.php';
    Autoload::run();

if(isset($_GET['url'])){

    $url = explode("/", $_GET['url']);
    $controller = "App\\Controllers\\".ucfirst($url[0])."Controller";
    if(isset($url[1])){
        $metodo = $url[1];
    }else{
        $metodo = "index";
    }
    $instance = new $controller();
    $arg = array();
    for ($i=2; $i < count($url); $i++) { 
        array_push($arg, $url[$i]);
    }
    // var_dump($arg);
    if(count($arg) > 0){
        $instance->{$metodo}($arg);
    }else{
        $instance->{$metodo}();
    }
    

}