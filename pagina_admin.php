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

    $query = "SELECT * FROM users";
    $risultato = $dbh->query($query);
}
?>
<h1>ciao</h1>

<p>che cosa vuoi fare?</p>


<button><a href="form_creazione_operatore.php">Crea Nuovo Operatore</a></button>
<button><a href="form_creazione_utente.php">Crea Nuovo Utente</a></button>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Admin</title>

</head>
<body>
<br><br>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
    <tr>
        <th>Id Operatore</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($result as $row) {
        echo "
        <tr>
        <td>{$row["id"]}</td>
        <td>{$row["name"]}</td>
        <td>{$row["email"]}</td>
        <td>{$row["password"]}</td>
        <th><a>Cancella operatore</a></th>
    </tr>";
    }
    ?>

    </tbody>
</table>
<br>
<br>

<table border="1" cellspacing="0" cellpadding="10">
    <thead>
    <tr>
        <th>Id utente</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($risultato as $row) {
        echo "
        <tr>
        <td>{$row["id"]}</td>
        <td>{$row["email"]}</td>
        <td>{$row["password"]}</td>
        <th><a href='delete_utente.php'>Cancella Utente</a></th>
    </tr>";
    }
    ?>

    </tbody>
</table>
<form action="logout.php" method="post"><button type="submit" >Log out</button></form>
</body>
