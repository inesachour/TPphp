<?php
include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personnes = $personneRepository->findAll();
$pageTitle = 'afficher';
include_once 'fragments/header.php';
?>

<table class="table table-hover">
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Age</th>
        <th scope="col">Section</th>
        <th scope="col">CIN</th>
        <th scope="col">Image</th>
    </tr>

    <?php
        foreach($personnes as $personne){
     ?>
    <tr class="table-active">
        <td><?= $personne->nom ?></td>
        <td><?= $personne->prenom ?></td>
        <td><?= $personne->age ?></td>
        <td><?= $personne->section ?>
        <td><?= $personne->cin ?></td>
        <td> FIX IMAGE THING</td>

    <?php
        }
    ?>
    </tr>

</table>
</body>
</html>
