<?php
session_start();
require_once('config.php');
if (!isset($_SESSION['id'])) {
    header ("location: accesso_utente.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>

</head>
<body>
<!--Form di invio Ticket a Lista Tickets-->

<h1>Compila i dati per il ticket</h1>
<div>
    <h2>Inserire dati ticket</h2>
    <form method="post" action="create_ticket.php">
        <h3>Titolo</h3>
        <input type="text" name="title">
        <h3>Messaggio</h3>
        <input type="textarea" name="text">
        <h3>Categoria</h3>
        <select name="category_id">
            <option value="0"></option>
            <option value="1">Assistenza Commerciale</option>
            <option value="2">Assistenza Tecnica</option>
        </select>
        <h3>Priorità</h3>
        <select name="priority">
            <option value="0"></option>
            <option value="1">Bassa</option>
            <option value="2">Media</option>
            <option value="3">Alta</option>
        </select>
        <button type="submit">Submit to another page</button>
    </form>
    <form action="logout.php" method="post"><button type="submit">Log out</button></form>

</div>

<h2>Lista Ticket inviati</h2>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
    <tr>
        <th>Id Ticket</th>
        <th>Categoria</th>
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
    $sql = "SELECT * FROM tickets";
    $result= $dbh->query($sql);
    foreach ($result as $row) {
        echo "
        <tr>
        <td>{$row["id"]}</td>
        <td>{$row["category_id"]}</td>
        <td>{$row["user_id"]}</td>
        <td>{$row["operator_id"]}</td>
        <td>{$row["title"]}</td>
        <td>{$row["number"]}</td>
        <td>{$row["start_date"]}</td>
        <td>{$row["end_date"]}</td>
        <td>{$row["priority"]}</td>
        <td>{$row["status"]}</td>
        <td>{$row["user_feedback"]}</td>
        <th><a href='messaggio.php?ticket_id={$row["id"]}' > dettaglio messaggio</a></th>
    </tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>