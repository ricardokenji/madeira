<?php

namespace MadeiraMadeira\Models;

use MadeiraMadeira\Classes\Model;

class User extends Model{    
    
    public function login($email, $password)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email AND password = :password LIMIT 1';
        $prepare = $this->connection->getPdo()->prepare($query);
        $prepare->bindValue(':email', $email);
        $prepare->bindValue(':password', md5($password));
        $prepare->execute();
        $results = $prepare->fetchAll(\PDO::FETCH_ASSOC);
 
        if(count($results)){
            return $this->arrayToObject($results)[0];
        }

        return false;
    }
    
    public function emailExists($email)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE email = :email LIMIT 1';
        $prepare = $this->connection->getPdo()->prepare($query);
        $prepare->bindValue(':email', $email);
        $prepare->execute();
        $results = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        
        if(count($results)){
            return true;
        }
        
        return false;
    }
    
    

}