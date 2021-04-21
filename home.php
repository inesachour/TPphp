<?php
include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personnes = $personneRepository->findAll();
$pageTitle = 'Home';
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
            <form method="post" action="modifierOnClick.php">
                <td name="nom"><?= $personne->nom ?></td>
                <td><?= $personne->prenom ?></td>
                <td><?= $personne->age ?></td>
                <td><?= $personne->section ?>
                <td><?= $personne->cin ?></td>
                <td> <img id="photo" src="<?= $personne->image ?>" /> </td>
                <td>
                    <button type="submit"  name="modif" class="button" value=<?=$personne->cin?> >Modifier</button>
                </td>
            </form>
            <form method="post" action="supprimer.php">
                <td>
                    <button type="submit"  name="supp" class="button" value=<?=$personne->cin?>>Supprimer</button>
                </td>
            </form>


            <?php
            }
        ?>
        </tr>

    </table>
    <a href="ajoutpage.php" class="btn btn-primary">Ajouter</a>
</form>
</body>
</html>


