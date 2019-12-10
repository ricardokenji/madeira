<?php

namespace MadeiraMadeira\Models;

use MadeiraMadeira\Classes\Model;

class Contact extends Model{    
    
    public function forUserId($id)
    { 
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = :user_id';
        $prepare = $this->connection->getPdo()->prepare($query);
        $prepare->bindParam(':user_id', $id);
        $prepare->execute();
        $results = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        return $this->arrayToObject($results);
    }
}