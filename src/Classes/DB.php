<?php

namespace MadeiraMadeira\Classes;

class DB{
    
    protected static $pdo;
    
    public function __construct($config)
    {
        $this->connect($config);
        $this->install();
    }
    
    public function connect($config){
        try{
            self::$pdo = new \PDO($config['connection'] . ':' . $config['database']);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch(\Exception $e){
            echo 'Conexão Inválida';
        }
    }
    
    private function install(){
        try{
           $result = self::$pdo->query("SELECT 1 FROM 'contacts' LIMIT 1");
        }catch(\Exception $e){
            self::$pdo->exec('CREATE TABLE users (id INTEGER PRIMARY KEY, email TEXT , admin INTEGER, password TEXT);');
            self::$pdo->exec('CREATE TABLE contacts (id INTEGER PRIMARY KEY, user_id INTEGER, name TEXT, email TEXT, phone TEXT, created_at TEXT, FOREIGN KEY(user_id) REFERENCES users(id));');
            
            $password = md5('admin');
            self::$pdo->exec('INSERT INTO users (email, admin, password) VALUES (\'admin@yap.com\', 1, \'' . $password . '\');');
        }
    }
    
    public function getPdo(){
        return self::$pdo;
    }
    
    public function lastInsertId(){
        return self::$pdo->lastInsertId();;
    }
    
    
}