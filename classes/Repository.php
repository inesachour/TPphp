<?php
include_once 'autoload.php';

class Repository
{   protected $tableName;
    protected $bd;

    public function __construct($tableName){
        $this->tableName=$tableName;
        $this->bd = ConnexionBD::getInstance();
    }

    public function findAll() {
        $request = "select * from ".$this->tableName;
        $response =$this->bd->prepare($request);
        $response->execute([]);
        return $response->fetchAll(PDO::FETCH_OBJ);
    }




}