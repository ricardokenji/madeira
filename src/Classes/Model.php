<?php

namespace MadeiraMadeira\Classes;

class Model  implements \JsonSerializable{
    
    protected $connection;
    
    protected $table;
    
    protected $fields;
    
    protected $fromDB = false;
    
    public function __construct()
    {
        $db = make('db');
        $this->connection = $db;
        $this->setTable();
    }
    
    protected function setTable()
    {
        if(empty($this->table)){
            $parts = explode('\\', get_class($this));
            $classname = array_pop($parts);
            $tablename = strtolower($classname).'s';
            $this->table = $tablename;
        }
    }
    
    public function arrayToObject($results)
    {
        $objects = [];
        foreach($results as $line)
        {
            $resultObject = new static();
            $resultObject->fields = $line;
            $resultObject->fromDB();
            $objects[] = $resultObject;
        }
        
        return $objects;
    }
    
    public function find($id){
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id LIMIT 1';
        $prepare = $this->connection->getPdo()->prepare($query);
        $prepare->bindParam(':id', $id);
        $prepare->execute();
        $results = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        if(count($results))
            return $this->arrayToObject($results)[0];
        return false;    
    }
    
    public function all()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $prepare = $this->connection->getPdo()->prepare($query);
        $prepare->execute();
        $results = $prepare->fetchAll(\PDO::FETCH_ASSOC);
        return $this->arrayToObject($results);
    }
    
    public function save(){
        if($this->fromDB === true){
            $this->update();
        }else{
            $this->insert();
        }
    }
    
    public function insert()
    {
        $fields = implode(', ' , array_keys($this->fields));
        $values = array_map( function ($value){
            return ':'.$value;
        }, array_keys($this->fields));
        $values = implode(', ' , $values);
        $query = 'INSERT INTO ' . $this->table . '(' . $fields . ') VALUES (' . $values . ')';
        $prepare = $this->connection->getPdo()->prepare($query);
        foreach($this->fields as $field => $value){
            $prepare->bindValue(':' . $field , $value);
        }
        $execution = $prepare->execute();
        $this->id = $this->connection->lastInsertId();
        $this->fromDB();
        return $execution;
    }
    
    public function update()
    {
        $fields = array_map( function ($value){
            return $value . ' = :'.$value;
        }, array_keys($this->fields));
        $fields = implode(', ' , $fields);
        $query = 'UPDATE ' . $this->table  . ' SET ' . $fields . ' WHERE id = ' . $this->id;
        $prepare = $this->connection->getPdo()->prepare($query);
        foreach($this->fields as $field => $value){
            $prepare->bindValue(':' . $field , $value);
        }
        return $prepare->execute();
    }
    
    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id LIMIT 1';
        $prepare = $this->connection->getPdo()->prepare($query);
        $prepare->bindValue(':id', $this->id);
        return $prepare->execute();
    }
    
    public function __set($key, $value)
    {
        $this->fields[$key] = $value;
    }
    
    public function __get($key)
    {
        if(array_key_exists($key, $this->fields)){
            return $this->fields[$key];
        }
        return null;
    }
    
    public function fromDB(){
        $this->fromDB = true;
    }
    
        
    public function setFields($fields){
        $this->fields = $fields;
    }

    
    public function jsonSerialize() 
    {
        return $this->fields;
    }
    
    public function count()
    {
        $query = 'SELECT count(*) as total FROM ' . $this->table;
        $result = $this->connection->getPdo()->query($query);
        $result = $result->fetch(\PDO::FETCH_ASSOC);
        if(!empty($result)){
            return $result['total'];
        }
        return false;
    }
    
    
    public function latests()
    {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id desc LIMIT 10';
        $result = $this->connection->getPdo()->query($query);
        $results = $result->fetchAll(\PDO::FETCH_ASSOC);
        if(count($results)){
            return $this->arrayToObject($results);
        }
        return false;
    }
}