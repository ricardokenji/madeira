<?php

namespace MadeiraMadeira\Controllers;

use MadeiraMadeira\Classes\Controller;

class Home extends Controller{
    
    public function index()
    {
        view('home');
    }
    
}