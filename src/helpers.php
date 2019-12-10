<?php

function make($dependency){
    $container = MadeiraMadeira\Classes\Container::getInstance();
    return $container[$dependency];
}

function view($name, $data = []){
    $content = $name;
    
    foreach($data as $key => $value){
        $$key = $value;
    }
    
    include __DIR__ . '/../views/layout.php';
}

function route($alias){
    $routes = make('routes');
    return $_SERVER['SCRIPT_NAME'] . '/' . ltrim($routes->route($alias), '/');
}

function input($name){
    $request = make('request');
    return $request->getParam($name);
}

function jsonResponse($data){
    header('Content-Type: application/json');
    return json_encode($data);    
}

function redirect($url){
    http_response_code(301);
    header('Location: ' . $url);
    exit;
}

function auth(){
    $auth = make('auth');
    return $auth;
}

function flash(){
    $flash = make('flash');
    return $flash;
}

    
function validate_phone($phone){
    return preg_match('/\([0-9]{2}\) [9]{1}[0-9]{4}-[0-9]{4}/', $phone);
}

function validate_required($string){
    return !empty($string);
}

function url($path){
    $basePath = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    
    return $basePath.$path;
}
    