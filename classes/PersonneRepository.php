<?php
include_once 'autoload.php';
class PersonneRepository extends  Repository
{
    public function __construct()
    {
        parent::__construct('personne');
    }

    public function ajoutpersonne($nom, $prenom, $age, $cin, $section, $path){
        try {
            if(!is_numeric($cin)) {
                $_SESSION['bdError'] = "CIN n'est composé que des chiffres.";
            }
            elseif(!is_numeric($age)) {
                $_SESSION['bdError'] = "Age n'est composé que des chiffres.";
            }
            else {
                $request = "insert into " . $this->tableName . " (`nom`,`prenom`,`age`,`cin`,`section`,`image`) VALUES (?,?,?,?,?,?)";
                $response = $this->bd->prepare($request);
                $response->execute([$nom, $prenom, $age, $cin, $section, $path]);
            }

        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                $_SESSION['bdError'] = "CIN redondant. Veuillez le resaisir";
            }
        }
    }

    public function findByCin($cin)
    {
        $request = "select * from " . $this->tableName . " where cin= ? ";
        $response = $this->bd->prepare($request);
        $response->execute([$cin]);
        return $response->fetch(PDO::FETCH_OBJ);
    }

    public function Update($cininit, $cin, $nom, $prenom, $age, $section,$path)
    {
        try {
            if(!is_numeric($cin)) {
                $_SESSION['bdError'] = "CIN n'est composé que des chiffres.";
            }
            elseif(!is_numeric($age)) {
                $_SESSION['bdError'] = "Age n'est composé que des chiffres.";
            }
            else {
                $request = "update " . $this->tableName . " set cin=? , nom=? , prenom=? , age=? , section=? , image=?  where cin=? ";
                $response = $this->bd->prepare($request);
                $response->execute([$cin, $nom, $prenom, $age, $section, $path, $cininit]);
            }
        } catch (PDOException $e) {
            if ($e->getCode() == '23000') {
                $_SESSION['bdError'] = "CIN redondant. Veuillez le resaisir";
            }
        }
    }

    public function Delete($cin){
        $request = "delete from ".$this->tableName." where cin=? ";
        $response = $this->bd->prepare($request);
        $response->execute([$cin]);
    }
}