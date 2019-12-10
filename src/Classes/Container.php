<?php

namespace MadeiraMadeira\Classes;

class Container implements \ArrayAccess{
    
    private $binds = [];
    
    private static $instance;
    
    private function __construct()
    {
        
    }
    
    static function getInstance()
    {
        if(empty(self::$instance)){
            return self::$instance = new Container;
        }else{
            return self::$instance;
        }        
    }

    public function offsetSet($offset, $value) {
        if($value instanceof \Closure){
            $this->binds[$offset] = $value($this);
        }else{
            $this->binds[$offset] = $value;
        }
    }

    public function offsetExists($offset) 
    {
        return !empty($this->binds[$offset]);
    }

    public function offsetUnset($offset) 
    {
        unset($this->binds[$offset]);
    }

    public function offsetGet($offset) 
    {
        if(empty($this->binds[$offset])){
            return null;
        }
        
        if($this->binds[$offset] instanceof \Closure){
            return $this->binds[$offset]($this);
        }
        
        return $this->binds[$offset];
    }
    
    public function bindFactory($offset, $value){
        if($value instanceof \Closure){
            $this->binds[$offset] = $value;
        }
        return false;
    }
    
}

