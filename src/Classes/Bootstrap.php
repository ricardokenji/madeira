<?php

namespace MadeiraMadeira\Classes;

class Bootstrap{
    
    protected $container;
    
    public function __construct($container)
    {
        $this->container = $container;
    }
    
    public function start()
    {
        $path = $this->container['request']->getPath();
        $path = str_replace($_SERVER['SCRIPT_NAME'], '', $path);
        if(empty($path))
            $path = '/';
        
        $routes = $this->container['routes'];
        
        $controllerName = $routes->find($this->container['request']->getMethod(), $path);
        
        if($this->call($controllerName) === false){
            http_response_code(404);
            echo 'Página não encontrada.';
        }
    }
    
    public function call($controllerName)
    {
        $parts = explode('@', $controllerName);
        if(!class_exists($parts[0])){
            return false;
        }
        
        $controller = new $parts[0]($this->container);
        
        if(!method_exists($controller, $parts[1])){
            return false;
        }
        
        $method = $parts[1];
        
        return $controller->$method();
    }
    
}