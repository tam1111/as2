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

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM' . $this->table . ' WHERE ' . $this->pk . '= :id');
        $criteria = [
            'id' => $id
        ];
            $stmt->execute($criteria);
    }

    public function save($record) {
         if (empty ($record[$this->pk])) {
             unset ($record[$this->pk]);
         }

         try{
          $this->insert($record);
         }

         catch (Exception $e) {
            $this->update($record);
         }
    }

    public function update($record){
        $query = 'UPDATE ' . $this->table. 'SET';

        $parameters = [];
        foreach($record as $key => $value){
            $parameters[] = $key . '= :' . $key;
        }
        $query .= implode(',', $parameters);
        $query .= 'WHERE ' . $this->pk . '= :pk';

        $record ['pk'] = $record[$this->pk];
        $stmt = $this ->pdo->prepare($query);

        $stmt->execute($record);
    }
}

