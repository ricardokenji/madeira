<?php

namespace MadeiraMadeira\Classes;

class Routes{
    
    private $routes = [];
    
    private $alias = [];
    
    public function get($path, $alias, $controller)
    {
        $this->newRoute('GET', $path, $alias, $controller);
    }
    
    public function post($path, $alias, $controller)
    {
        $this->newRoute('POST', $path, $alias, $controller);
    }
    
    public function put($path, $alias, $controller)
    {
        $this->newRoute('PUT', $path, $alias, $controller);
    }
    
    public function delete($path, $alias, $controller)
    {
        $this->newRoute('DELETE', $path, $alias, $controller);
    }
    
    public function newRoute($method, $path, $alias, $controller)
    {
        $this->routes[$method][$path]['controller'] = $controller;
        $this->alias[$alias] = $path;
    }
    
    public function find($method, $path)
    {
        
        var_dump($method);
        var_dump($path); exit;
        if(array_key_exists($path, $this->routes[$method])){
            return $this->routes[$method][$path]['controller'];
        }
        return false;
    }
    
    public function route($alias)
    {
        if(array_key_exists($alias, $this->alias)){
            return $this->alias[$alias];
        }
    }
    
}


