<?php
include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personnes = $personneRepository->findAll();
$pageTitle = 'afficher';
include_once 'fragments/header.php';

?>
<form class="container" >
    <table class="table table-hover">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Age</th>
            <th scope="col">Section</th>
            <td scope="col">CIN</td>
            <td scope="col">Image</td>
        </tr>

        <?php
            foreach($personnes as $personne){
         ?>
        <tr class="table-active">
            <td name="nom"><?= $personne->nom ?></td>
            <td><?= $personne->prenom ?></td>
            <td><?= $personne->age ?></td>
            <td><?= $personne->section ?>
            <td><?= $personne->cin ?></td>
            <td> <img id="photo" src="<?= $personne->image ?>" /> </td>
            <!--<td><a class="nav-link" name="modif" href="">Modifier</a></td>
            <td><a class="nav-link"  name="supp"  href="">Supprimer</a></td>-->
            <td><button type="submit" onclick="getCIN(<?=$personne->cin?>)">Modifier</button></td>
        <?php
            }
        ?>
        </tr>

    </table>
    <a href="ajoutpage.php" class="btn btn-primary">Ajouter</a>
</form>
</body>
</html>
