/*Ajout d'une personne dans la BD*/

<?php
session_start();
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$section = $_POST['section'];
$cin = $_POST['cin'];

if(isset($_FILES['image']) && ($_FILES['image'])&&($_FILES['image']['name']!=""))
        $path = "assets/uploads/".uniqid().$_FILES['image']['name'];
else
        $_SESSION['bdError'] ="Veillez attacher une image";


include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personneRepository->ajoutpersonne($nom,$prenom,$age,$cin,$section,$path);

if(!isset($_SESSION['bdError'])) {
    copy($_FILES['image']['tmp_name'], $path);
    $historyRepository = new HistoriqueRepository();
    $date = date('d-m-y h:i:s');
    $historyRepository->ajouthistorique($_SESSION['user'],$date,"ajout",$cin,"");
    header('location:home.php');
}
else{
    header('location:ajoutpage.php');
}