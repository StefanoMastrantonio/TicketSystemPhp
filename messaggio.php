<?php

require_once('config.php');
print_r ($_POST);
echo "<br><br>";
//
//try {
//    /** @var PDO $dbh */
//    $stmt = $dbh->prepare("INSERT INTO operators (name, email, password) VALUES (:name, :email, :password)");
//    $stmt->bindParam(':name', $_POST['name']);
//    $stmt->bindParam(':email', $_POST['email']);
//    $stmt->bindParam(':password', $_POST['password']);
//    $stmt->execute();
//    echo "Inserimento ok";
//}
//catch (PDOException $e)
//{
//    print $e->getMessage();
//    die();
//};
/** @var PDO $dbh */
$sql = "SELECT messages.id, messages.date, messages.text, messages.ticket_id, messages.operator_id, messages.user_id FROM messages JOIN tickets ON tickets.id=messages.id WHERE tickets.id=1";


$result= $dbh->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messaggio</title>

</head>
<body>
<?php
foreach ($result as $row) {
    echo "
    <h2>Id</h2>
    <h2>{$row["id"]}</h2>
    <h4>data del messaggio</h4>
    <p>{$row["date"]}</p>
    <h4>Mesaggio</h4>
    <p>{$row["text"]}</p>
    <h4>identificativo del ticket</h4>
    <p>{$row["ticket_id"]}</p>
    <h4>identificativo operatore</h4>
    <p>{$row["operator_id"]}</p>
    <h4>identificativo dell'utente</h4>
    <p>{$row["user_id"]}</p>
    ";
}
?>

</body>
