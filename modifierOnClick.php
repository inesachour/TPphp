<?php

session_start();
$_SESSION['id'] = $_POST['modif'];
header('location:modifpage.php');

?>

