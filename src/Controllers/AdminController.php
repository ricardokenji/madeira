<?php

namespace MadeiraMadeira\Controllers;

use MadeiraMadeira\Classes\Controller;
use MadeiraMadeira\Models\User;
use MadeiraMadeira\Models\Contact;

class AdminController extends Controller{
    
    public function __construct()
    {
        if(!auth()->admin()){
            redirect(route('home'));
        }
    }
    
    public function index()
    {
        $user = new User();
        $contact = new Contact();
        
        $latestUsers = $user->latests();
        $usersCount = $user->count();
        $contactsCount = $contact->count();
      
        view('admin/dashboard' , compact('usersCount', 'latestUsers', 'contactsCount'));
    }
    
}