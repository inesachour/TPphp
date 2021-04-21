<?php
session_start();
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$section = $_POST['section'];
$cin = $_POST['cin'];

if(isset($_FILES['image']) && ($_FILES['image'])){
    if($_FILES['image']['name']!="")
    {
        $path = "assets/uploads/".uniqid().$_FILES['image']['name'];
        copy($_FILES['image']['tmp_name'], $path);
    }
    else{
        $_SESSION['bdError'] ="Veillez attacher une image";
        header('location:ajoutpage.php');
    }
}
include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personneRepository->ajoutpersonne($nom,$prenom,$age,$cin,$section,$path);

if(!isset($_SESSION['bdError'])) {
    $historyRepository = new HistoriqueRepository();
    $date = date('d-m-y h:i:s');
    $historyRepository->ajouthistorique($_SESSION['user'],$date,"ajout",$cin,"");
    header('location:home.php');
}
else{
   header('location:ajoutpage.php');
}