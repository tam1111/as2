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

  
