<?php

namespace MadeiraMadeira\Controllers;

use MadeiraMadeira\Classes\Controller;
use MadeiraMadeira\Models\Contact;

class ContactController extends Controller{
    
    public function __construct()
    {
        if(!auth()->check()){
            flash()->set('errors', 'Para acessar esta área estar logado.');
            redirect(route('home'));
        }elseif(auth()->admin()){
            redirect(route('admin.dashboard'));
        }
    }
    
    public function index()
    {
        $contact = new Contact();
        $contacts = $contact->forUserId(auth()->user()->id);
        view('contacts/index', compact('contacts'));
    }
        
    public function save()
    {
        
        var_dump($_POST);
        $this->validate();
        $contact = new Contact();
        $contact->user_id = auth()->user()->id;
        $contact->name = input('name');
        $contact->phone = input('phone');
        $contact->email = input('email');
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->save();
        flash()->set('info', 'Salvo com sucesso.');
        redirect(route('contact.index'));
    }    
    
    public function update()
    {
        $this->validate();
        $contact = new Contact();
        $contact = $contact->find(input('contact_id'));
        $contact->name = input('name');
        $contact->phone = input('phone');
        $contact->email = input('email');
        $contact->save();
        
        flash()->set('info', 'Salvo com sucesso.');
        
        redirect(route('contact.index'));
    }
    
    public function edit()
    {
        $contact = new Contact();
        $contact = $contact->find(input('contact_id'));
        view('contacts/edit', compact('contact'));
    }
    
    public function delete()
    {
        $contact = new Contact();
        $contact = $contact->find(input('contact_id'));
        $contact->delete();
        
        flash()->set('info', 'Salvo com sucesso.');
        redirect(route('contact.index'));
    }
    
    public function validate()
    {
        if(!validate_required(input('name'))){
            flash()->set('errors', 'Name is required.');
            redirect(route('home'));
        }
        if(!validate_required(input('email'))){
            flash()->set('errors', 'Email is required.');
            redirect(route('home'));
        }
        if(!validate_required(input('phone'))){
            flash()->set('errors', 'Phone is required.');
            redirect(route('home'));
        }
        if(!validate_phone(input('phone'))){
            flash()->set('errors', 'Phone must be a valid celphone.');
            redirect(route('home'));
        }
    }
}