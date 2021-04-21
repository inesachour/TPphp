<?php
include_once 'autoload.php';

class HistoriqueRepository extends Repository
{
    public function __construct()
    {
        parent::__construct('historique');
    }

    public function ajouthistorique($email,$date, $operation, $cin, $details)
    {
        $request = "insert into " . $this->tableName . " (`email`,`date`,`operation`,`cin`,`details`) VALUES (?,?,?,?,?)";
        $response = $this->bd->prepare($request);
        $response->execute([$email, $date, $operation, $cin, $details]);
    }
}