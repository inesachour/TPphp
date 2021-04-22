/* traitement fait lorsqu'on clique sur le bouton modifier */

<?php
session_start();
$_SESSION['id'] = $_POST['modif'];
header('location:modifpage.php');
?>

