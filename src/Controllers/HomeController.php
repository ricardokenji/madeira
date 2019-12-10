<?php

namespace MadeiraMadeira\Controllers;

use MadeiraMadeira\Classes\Controller;


class HomeController extends Controller{
    
    public function index()
    {
        if(auth()->check()){
            redirect(route('contact.index'));
        }
        view('home');
    }
    
}