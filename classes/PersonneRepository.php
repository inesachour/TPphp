<?php
include_once 'autoload.php';
class PersonneRepository extends  Repository
{
    public function __construct()
    {
        parent::__construct('personne');
    }

    public function ajoutpersonne($nom,$prenom,$age,$cin,$section,$path){

    try {
        $request = "insert into " . $this->tableName . " (`nom`,`prenom`,`age`,`cin`,`section`,`image`) VALUES (?,?,?,?,?,?)";
        $response = $this->bd->prepare($request);
        $response->execute([$nom, $prenom, $age, $cin, $section, $path]);

    }
    catch(PDOException $e){
        if ($e->getCode()=='23000'){
            $_SESSION['bdError'] = "CIN redondant. Veuillez le resaisir";
        }
    }
    }

}