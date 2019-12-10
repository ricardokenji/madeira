<?php

error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

session_name('mmtest');
session_start();

// Container - Singleton
$container = MadeiraMadeira\Classes\Container::getInstance();

// App Dependencies - Todas as dependências da aplicação

// Configurações
$container['config'] = require __DIR__ . '/../src/config.php';

// Classe Request
$container['request'] = function($container){
    return new MadeiraMadeira\Classes\Request($_GET, $_POST, $_SERVER);
};

// Classe de gerenciamento de Rotas
$container['routes'] = function ($container){
    return new MadeiraMadeira\Classes\Routes();
};

// Classe conexão com DB
$container['db'] = function($container){
    return new MadeiraMadeira\Classes\DB($container['config']['database']);
};

// Classe session flash
$container['flash'] = function($container){
    return new MadeiraMadeira\Classes\SessionFlash();
};

// Classe de autenticação
$container['auth'] = function($container){
    return new MadeiraMadeira\Classes\Auth();
};

// Carrega as rotas
require __DIR__ . '/../src/routes/web.php';

$bootstrap = new MadeiraMadeira\Classes\Bootstrap($container);
$bootstrap->start();