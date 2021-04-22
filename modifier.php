
<?php
session_start();
include_once 'autoload.php';

$personneRepository = new PersonneRepository();
$personne = $personneRepository->findByCin($_SESSION['id']);

$nom = ($_POST['nom']=="")? $personne->nom :  $_POST['nom'];
$prenom = ($_POST['prenom']=="")? $personne->prenom :  $_POST['prenom'];
$age = ($_POST['age']=="")? $personne->age :  $_POST['age'];
$section = ($_POST['section']=="")? $personne->section :  $_POST['section'];
$cin = ($_POST['cin']=="")? $personne->cin :  $_POST['cin'];
$path = $personne->image;

if(isset($_FILES['image']) && ($_FILES['image'])){
    if($_FILES['image']['name']!="")
    {
        $path = "assets/uploads/".uniqid().$_FILES['image']['name'];
        copy($_FILES['image']['tmp_name'], $path);
        unlink($personne->image);
    }
}

include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personneRepository->Update($_SESSION['id'],$cin,$nom,$prenom,$age,$section,$path);

if(!isset($_SESSION['bdError'])) {
    $historyRepository = new HistoriqueRepository();
    $date = date('d-m-y h:i:s');
    $detail = "Le champ : ".$personne->cin.", ".$personne->nom.", ".$personne->prenom.", ".$personne->age.", ".$personne->age.", ".$personne->image.", | a changé a : ${cin}, ${nom}, ${prenom}, ${age}, ${section}, ${image}";
    $historyRepository->ajouthistorique($_SESSION['user'],$date,"modifcation",$cin,$detail);
    header('location:home.php');
    unset($_SESSION['id']);
}
else{
    header('location:modifpage.php');
}