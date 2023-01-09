<?php
session_start();
require_once('config.php');
if(!isset($_SESSION['id'])) {
    header('location: accesso_operatore.php');
} else {
    /** @var PDO $dbh */
    $sql = "SELECT * FROM tickets";
    $result= $dbh->query($sql);
}

//try {
    //
    //$stmt = $dbh->prepare("INSERT INTO operators (name, email, password) VALUES (:name, :email, :password)");
    //$stmt->bindParam(':name', $_POST['name']);
    //$stmt->bindParam(':email', $_POST['email']);
    //$stmt->bindParam(':password', $_POST['password']);
    //$stmt->execute();
//    echo "Inserimento ok";
//}
//catch (PDOException $e)
//{
    //print $e->getMessage();
//};


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Ticket</title>

</head>
<body>
<form action="logout.php" method="post"><button type="submit" >Log out</button></form>
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
        <th><a href='messaggio.php?ticket_id={$row["id"]}'>dettaglio messaggio</a></th>
    </tr>";
    }
    ?>
    </tbody>
</table>
</body>
