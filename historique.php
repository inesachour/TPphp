<?php
include_once 'autoload.php';
$historiqueRepository = new HistoriqueRepository();
$historiques = $historiqueRepository->findAll();
$pageTitle = 'Historique';
include_once 'fragments/header.php';

if(!isset($_SESSION['user'])) header('location:login.php');

?>
<form class="container" >
    <table class="table">
        <tr>
            <th scope="col">Email</th>
            <th scope="col">Date</th>
            <th scope="col">Operation</th>
            <th scope="col">CIN</th>
            <th scope="col">Details</th>
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


