<?php

include_once 'autoload.php';
class PersonneRepository extends  Repository
{
    public function __construct()
    {
        parent::__construct('personne');
    }

    public function ajoutpersonne($nom,$prenom,$age,$cin,$section){
        $request = "insert into ".$this->tableName." (`nom`,`prenom`,`age`,`cin`,`section`,`image`) VALUES (?,?,?,?,?,?)";
        $response =$this->bd->prepare($request);
        $response->execute([$nom,$prenom,$age,$cin,$section,'0']);
        return $response ;
    }
}