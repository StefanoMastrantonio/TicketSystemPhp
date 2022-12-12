<?php
session_start();

require_once('config.php');

try {
    /** @var PDO $dbh */
    $stmt = $dbh->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->execute();
}
catch (PDOException $e)
{
    print $e->getMessage();
};
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
<div>
    <h2>Inserire dati ticket</h2>
    <form method="post" action="ticket_form_page.php">
        <h3>Titolo</h3>
        <input type="text" name="title" id="">
        <h3>Messaggio</h3>
        <input type="textarea" name="text">
        <h3>Categoria</h3>
        <select name="category_id">
            <option value="0"></option>
            <option value="1">Categoria 1</option>
            <option value="2">Categoria 2</option>
            <option value="3">Categoria 3</option>
        </select>
        <h3>Priorità</h3>
        <select name="priority">
            <option value="0"></option>
            <option value="1">Bassa</option>
            <option value="2">Media</option>
            <option value="3">Alta</option>
        </select>
        <input type="submit" name="submit" value="Sent">
    </form>
    <form action="logout.php" method="post"><button type="submit" >Log out</button></form>

</div>
</body>
</html>