<?php
$id = $_POST['supp'];
include_once 'autoload.php';
session_start();

$personneRepository = new PersonneRepository();
$historyRepository = new HistoriqueRepository();
$date = date('d-m-y h:i:s');
$historyRepository->ajouthistorique($_SESSION['user'],$date,"suppression",$id,"");
$personne = $personneRepository->Delete($id);

header('location:home.php');

?>