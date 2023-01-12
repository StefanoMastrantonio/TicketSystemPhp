<?php
session_start();
require_once('config.php');
if (!isset($_SESSION['id'])) {
    print_r($_SESSION['id']);
    header ("location: admin.php");
} else {

    $query = "SELECT * FROM users";
    $risultato = $dbh->query($query);

}
?>
<div class="utenti">
    <h3>Tutti gli utenti</h3>
    <table >
        <thead>
        <tr>
            <th style = "display: none">Id utente</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($risultato as $row) {
            echo "
            <tr>
            <td style ='display: none'>{$row["id"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["password"]}</td>
            <th><a href='delete_utente.php?user_id={$row['id']}'><i class='fa-sharp fa-solid fa-trash'></i></a></th>
        </tr>";
        }
        ?>

        </tbody>
    </table>
</div>