<?php
include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personnes = $personneRepository->findAll();
$pageTitle = 'Home';
include_once 'fragments/header.php';

if(!isset($_SESSION['user'])) header('location:login.php');

?>
<div class="container" >
    <table class="table">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Age</th>
            <th scope="col">Section</th>
            <th scope="col">CIN</th>
            <th scope="col">Image</th>
        </tr>
        <tbody>
        <?php
            foreach($personnes as $personne){
         ?>
                <tr class="table-primary">
                <td><?= $personne->nom ?></td>
                <td><?= $personne->prenom ?></td>
                <td><?= $personne->age ?></td>
                <td><?= $personne->section ?>
                <td><?= $personne->cin ?></td>
                <td> <img id="photo" alt="picture" src=<?= $personne->image ?> /> </td>
                <form method="post" action="modifierOnClick.php">
                    <td>
                    <button type="submit" name="modif" class="btn btn-warning" value=<?=$personne->cin?> >Modifier</button>
                    </td>
                </form>
            <form method="post" action="supprimer.php">
                <td>
                    <button type="submit" name="supp" class="btn btn-warning" value=<?=$personne->cin?>>Supprimer</button>
                </td>
                </tr>
            </form>
            <?php
            }
        ?>

        </tbody>
    </table>
    <a href="ajoutpage.php" class="btn btn-primary">Ajouter</a>
</div>
</body>
</html>


