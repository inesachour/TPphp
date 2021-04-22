<?php
include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personnes = $personneRepository->findAll();
$pageTitle = 'Ajouter';
include_once 'fragments/header.php';
?>

<form class="container" action="ajouter.php" method="post" enctype="multipart/form-data">
    <div class="form-group" id="s">
        <label>Nom</label>
        <input type="text" class="form-control" name="nom">
        <label>Prenom</label>
        <input type="text" class="form-control" name="prenom">
        <label>Age</label>
        <input type="text" class="form-control" name="age">
        <label>Section</label>
        <input type="text" class="form-control" name="section">
        <label>CIN</label>
        <input type="text" class="form-control" name="cin">
        <label >Image</label>
        <input type="file" class="form-control-file" name="image" >
    </div>
    <?php if (isset($_SESSION['bdError'])){?>
    <div class="alert alert-danger"><?= $_SESSION['bdError']?></div>
    <?php
    unset($_SESSION['bdError']);
    } ?>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>

