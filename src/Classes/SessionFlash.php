<?php

namespace MadeiraMadeira\Classes;

class SessionFlash{
    
    public function set($key, $value)
    {
        $_SESSION['flash'][$key] = $value;
    }
    
    public function get($key)
    {
        if(isset($_SESSION['flash'][$key])){
            $value = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $value;
        }
    }
    
}