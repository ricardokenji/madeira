<?php

namespace MadeiraMadeira\Classes;

class Auth{
    
    protected $user = null;
    
    public function __construct()
    {
        if(!empty($_SESSION['user'])){
            $this->user = $_SESSION['user'];
        }
    }
    
    public function user()
    {
        return $this->user;
    }
    
    public function login($user)
    {
        $_SESSION['user'] = $user;
        $this->user = $user;
    }
    
    public function logout()
    {
        $_SESSION['user'] = null;
        $this->user = null;
    }
    
    public function check()
    {
        return !empty($this->user);
    }
    
    public function admin(){
        if(!$this->check())
            return false;
        return $this->user->admin ? true : false;
    }
}

