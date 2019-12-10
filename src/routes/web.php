<?php

$routes = $container['routes'];
$routes->get('/', 'home', 'MadeiraMadeira\Controllers\HomeController@index');

$routes->get('/admin', 'admin.dashboard', 'MadeiraMadeira\Controllers\AdminController@index');

$routes->get('/contacts', 'contact.index', 'MadeiraMadeira\Controllers\ContactController@index');
$routes->post('/contacts', 'contact.save', 'MadeiraMadeira\Controllers\ContactController@save');
$routes->get('/contacts/edit', 'contact.edit', 'MadeiraMadeira\Controllers\ContactController@edit');
$routes->put('/contacts', 'contact.update', 'MadeiraMadeira\Controllers\ContactController@update');
$routes->delete('/contacts', 'contact.delete', 'MadeiraMadeira\Controllers\ContactController@delete');

$routes->post('/users', 'user.save', 'MadeiraMadeira\Controllers\UserController@save');
$routes->get('/login', 'user.login.form', 'MadeiraMadeira\Controllers\UserController@loginForm');
$routes->post('/login', 'user.login', 'MadeiraMadeira\Controllers\UserController@login');
$routes->get('/logout', 'user.logout', 'MadeiraMadeira\Controllers\UserController@logout');
