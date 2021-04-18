<?php

session_start();
$email = $_POST['email'];
$password = $_POST['pwd'];
$admins = [ 'gl2@insat.tn' => '1000' , 'i@a.com' => '2000', 'ia@ia.com' => '3000' ];


if(isset($email) && isset($password) && $email!="" && $password!=""){
    foreach ($admins as $mail => $pwd ) {
        if(($email==$mail)&&($password ==$pwd)){
            echo $pwd;
            echo $password;
            $_SESSION['user']='admin';
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