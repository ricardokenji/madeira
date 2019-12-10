<?php

namespace MadeiraMadeira\Controllers;

use MadeiraMadeira\Classes\Controller;
use MadeiraMadeira\Models\User;

class UserController extends Controller{
    
    public function save()
    {
        $this->validate();
        
        $user = new User();
        if($user->emailExists(input('email'))){
            flash()->set('errors', 'Email já esta cadastrado.');
            redirect(route('home'));
        }
        
        $user->email = input('email');
        $user->admin = 0;
        $user->password = md5(input('password'));
        $user->save();
        
        auth()->login($user);
        redirect(route('contact.index'));
    }   
    
    public function loginForm()
    {
        view('login');
    }
    
    public function login()
    {
        $user = new User();
        $user = $user->login(input('email'), input('password'));
     
        if(!empty($user)){
            auth()->login($user);
            redirect(route('contact.index'));
        }
        flash()->set('errors', 'Usuário ou senha inválidos.');
        redirect(route('home'));
    }
    
    public function logout()
    {
        auth()->logout();
        redirect(route('home'));
    }
    
    public function validate(){
        if(!validate_required(input('email'))){
            flash()->set('errors', 'Email is required.');
            redirect(route('home'));
        }
        if(!validate_required(input('password'))){
            flash()->set('errors', 'Password is required.');
            redirect(route('home'));
        }
    }
}