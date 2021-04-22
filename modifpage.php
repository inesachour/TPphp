<?php
include_once 'autoload.php';
$pageTitle = 'Modifier';
include_once 'fragments/header.php';
if(!isset($_SESSION['user'])) header('location:login.php');
$personneRepository = new PersonneRepository();
$personne = $personneRepository->findByCin($_SESSION['id']);

?>
<form class ="container" method="post" action="modifier.php" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nom</label>
            <label>
                <input type="text" class="form-control" name="nom" placeholder= <?= $personne->nom ?> >
            </label>
            <label>Prenom</label>
            <label>
                <input type="text" class="form-control" name="prenom" placeholder= <?= $personne->prenom ?>>
            </label>
            <label>Age</label>
            <label>
                <input type="text" class="form-control" name="age" placeholder= <?= $personne->age ?>>
            </label>
            <label>Section</label>
            <label>
                <input type="text" class="form-control" name="section" placeholder= <?= $personne->section ?>>
            </label>
            <label>CIN</label>
            <label>
                <input type="text" class="form-control" name="cin" placeholder= <?= $personne->cin ?>>
            </label>
            <label >Image</label>
            <img id="photo-modif" alt="photo" src= <?= $personne->image ?> >
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

