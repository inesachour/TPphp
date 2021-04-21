<?php
include_once 'autoload.php';
session_start();
$email = $_POST['email'];
$password = $_POST['pwd'];
$adminRepository = new AdminRepository();
$admins = $adminRepository->findAll();


if(isset($email) && isset($password) && $email!="" && $password!=""){
    foreach ($admins as $admin ) {
        if(($email==$admin->email)&&($password ==$admin->password)){
            $_SESSION['user']=&$admin->email;
            header('location:home.php');
            break;
        }
        else {
            $_SESSION['errorMessage']="Veuillez vérifier vos credenitals";
            header('location:login.php');
        }
    }
}
else{
    $_SESSION['errorMessage'] = 'Aucun champs ne doit etre vide';
    header('location:login.php');
}