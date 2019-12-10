<?php

namespace MadeiraMadeira\Classes;

class Request{

    protected $params = [];
    
    protected $method;
    
    protected $path;
    
    public function __construct($get, $post, $server)
    {
        $this->mergeParams($get);
        $this->mergeParams($post);
        $this->setMethod($_SERVER['REQUEST_METHOD']);
        $this->setPath($_SERVER['PHP_SELF']);
    }
    
    public function mergeParams($params)
    {
        $this->params = array_merge($params, $this->params);
    }
    
    public function getParam($name)
    {
        if(!empty($this->params[$name]))
            return $this->params[$name];
        else
            return false;
    }
    
    public function setMethod($method)
    {
        if(!empty($this->params['_method']))
            $method = strtoupper($this->params['_method']);
        $this->method = $method;
    }
    
    public function getMethod()
    {
        
        return $this->method;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }
        
    public function getPath()
    {
        return $this->path;
    }


    
}