<?php
session_start();
require_once('config.php');
if (!isset($_SESSION['id'])) {
    print_r($_SESSION['id']);
    header ("location: admin.php");
} else {

    $quer = "SELECT * FROM categories";
    $results = $dbh->query($quer);
}
?>

<div class="categorie">
    <h3>Tutte le categorie</h3>
    <table>
        <thead>
        <tr>
            <th style ='display: none'>Id categoria</th>
            <th>Nome</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $row) {
            echo "
            <tr>
            <td style ='display: none'>{$row["id"]}</td>
            <td>{$row["name"]}</td>
            <th><a href='delete_category.php?category_id={$row['id']}'><i class='fa-sharp fa-solid fa-trash'></i></a></th>
        </tr>";
        }
        ?>

        </tbody>
    </table>
</div>
