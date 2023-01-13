<?php
session_start();
require_once('config.php');
if (!isset($_SESSION['id'])) {
    print_r($_SESSION['id']);
    header ("location: admin.php");
} else {

    /** @var PDO $dbh */
    $sql = "SELECT * FROM operators";
    $result = $dbh->query($sql);

}
?>

<div class="operatori">
    <h3>Tutti gli operatori</h3>
    <table>
        <thead>
        <tr>
            <th style ='display: none'>Id Operatore</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Password</th>
            <th>Cancella</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $row) {
            echo "
            <tr>
            <td style ='display: none'>{$row["id"]}</td>
            <td>{$row["name"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["password"]}</td>
            <th><a href='delete_operatore.php?operator_id={$row['id']}'><i class='fa-sharp fa-solid fa-trash'></i></a></th>
        </tr>";
        }
        ?>

        </tbody>
    </table>
    </div>