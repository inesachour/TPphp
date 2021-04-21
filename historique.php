<?php
include_once 'autoload.php';
$historiqueRepository = new HistoriqueRepository();
$historiques = $historiqueRepository->findAll();
$pageTitle = 'Historique';
include_once 'fragments/header.php';

?>
<form class="container" >
    <table class="table table-hover">
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Operation</th>
            <th scope="col">CIN</th>
            <td scope="col">Details</td>
        </tr>

        <?php
        foreach($historiques as $historique){
        ?>
        <tr class="table-active">
            <form method="post" action="modifierOnClick.php">
                <td ><?= $historique->email ?></td>
                <td><?= $historique->date ?></td>
                <td><?= $historique->operation ?></td>
                <td><?= $historique->cin ?>
                <td><?= $historique->details ?></td>
            </form>
            <?php
            }
            ?>
        </tr>
    </table>
</form>
</body>
</html>


