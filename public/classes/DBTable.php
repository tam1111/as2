<?php
class DBTable{
    private $pdo;
    private $table;
    private $pk;


    public function __construct($pdo, $table, $pk){
        $this->pdo = $pdo;
        $this->table = $table;
        $this->pk = $pk;
    }

    public function search($field, $value){
        $stmt-> $this->pdo->prepare('SELECT * FROM' . $this->table. 'WHERE' . $field . '=:value');

        $criteria =[
            'value' => $value
        ];
        $stmt->execute($criteria);

        return $stmt->fetchAll();
    }

    public function findAll(){
        $stmt = $this->pdo->prepare('SELECT * FROM' . $this->table);
        $stmt->execute();
         return $stmt->fetchAl();
    }

    public function insert ($record) {
        $keys = array_keys ($record):
        $values = implode(',',$keys);
        $valuesWithColon = implode(',:',$keys);
        $query = 'INSERT INTO ' . $this->table . '(' . $values . ') VALUES(:' . $valuesWithColon . ')';
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($record):
    }

