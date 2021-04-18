<?php
include_once 'autoload.php';
$personneRepository = new PersonneRepository();
$personnes = $personneRepository->findAll();
$pageTitle = 'afficher';
include_once 'fragments/header.php';
?>
<div class="container">
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
            <td> FIX IMAGE THING</td>
            <td><a class="nav-link" href="">Modifier</a></td>
            <td><a class="nav-link" href="">Supprimer</a></td>

        <?php
            }
        ?>
        </tr>

    </table>

    <form class="container" action="ajouter.php" method="post">
        <div class="form-group">
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
