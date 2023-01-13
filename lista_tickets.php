<?php
session_start();
require_once('config.php');
if(!isset($_SESSION['id'])) {
    header('location: accesso_operatore.php');
} else {
    /** @var PDO $dbh */
    $sql = "SELECT * FROM tickets";
    try {
        $result = $dbh->query($sql);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/lista_tickets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lista Ticket</title>

</head>
<body>
<div class="container">
    <div class="header">
        <div class="title">
            <h2>Tutti i ticket</h2>
        </div>
        <div class="logout">

            <form action="logout.php" method="post">
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </form>
        </div>
    </div>
    <br><br>

<table border="1" cellspacing="0" cellpadding="10">
    <thead>
    <tr>
        <th>Id Ticket</th>
        <th style="display:none;">Categoria</th>
        <th>Utente</th>
        <th>Operatore</th>
        <th>Titolo</th>
        <th>Numero</th>
        <th>data di inizio</th>
        <th>data di fine</th>
        <th>priorità</th>
        <th>Status</th>
        <th>feedback Cliente</th>
        <th>Descrizione</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($result as $row) {
        echo "
        <tr>
        <td>{$row["id"]}</td>
        <td style='display:none;'>{$row["category_id"]}</td>
        <td>{$row["user_id"]}</td>
        <td>{$row["operator_id"]}</td>
        <td>{$row["title"]}</td>
        <td>{$row["number"]}</td>
        <td>{$row["start_date"]}</td>
        <td>{$row["end_date"]}</td>
        <td>{$row["priority"]}</td>
        <td>{$row["status"]}</td>
        <td>{$row["user_feedback"]}</td>
        <th><a href='messaggio.php?ticket_id={$row["id"]}'>dettaglio messaggio</a></th>
    </tr>";
    }
    ?>
    </tbody>
</table>
</div>
</body>
