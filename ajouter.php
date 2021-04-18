<?php
session_start();
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$section = $_POST['section'];
$cin = $_POST['cin'];
//IMAGE

include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personnes = $personneRepository->ajoutpersonne($nom,$prenom,$age,$cin,$section);
header('location:main.php');