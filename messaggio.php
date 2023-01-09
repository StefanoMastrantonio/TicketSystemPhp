<?php
session_start();
require_once('config.php');
echo "<br><br>";


if (isset($_POST['text'])) {
    $ticket_id = $_GET['ticket_id'];
    $text = $_POST['text'];
    if ($_SESSION['role'] == 'utente') {
        $operator_id = null;
        $user_id = $_SESSION['id'];
    } elseif ($_SESSION['role'] == 'operatore') {
        $operator_id = $_SESSION['id'];
        $user_id = null;
    }

    try {
        /** @var PDO $dbh */
        $sql = $dbh->prepare("INSERT INTO messages (text, ticket_id, operator_id, user_id ) VALUES (:text, :ticket_id,:operator_id, :user_id)");
        $sql->bindParam(':text', $_POST['text']);
        $sql->bindParam(':ticket_id', $_GET['ticket_id']);
        $sql->bindParam(':operator_id', $operator_id);
        $sql->bindParam(':user_id', $user_id);
        $sql->execute();
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }

    try {
        if ($_SESSION['role'] == 'operatore') {
            $sql = $dbh->prepare("SELECT * FROM tickets WHERE id=:id");
            $sql->bindParam(':id', $_GET['ticket_id']);
            $sql->execute();

            $result = $sql->fetch();
            if (empty($result['operator_id'])) {
                $sql = $dbh->prepare("UPDATE tickets SET operator_id=:operator_id WHERE id=:id");
                $sql->bindParam(':operator_id', $_SESSION['id']);
                $sql->bindParam(':id', $_GET['ticket_id']);
                $sql->execute();
            }
        }
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }

}
//elseif (isset($_POST['text'])){
//    $ticket_id = $_GET['ticket_id'];
//    $text = $_POST['text'];
//    $user_id = $_SESSION['id'];
//
//    $sql = "INSERT INTO messages (text, ticket_id, user_id) VALUES ('$text', '$ticket_id', '$user_id')";
//}

/** @var PDO $dbh */
$sql = "SELECT messages.id, messages.date, messages.text, messages.ticket_id, messages.operator_id, messages.user_id FROM messages  WHERE ticket_id=" . $_GET['ticket_id'];

$result = $dbh->query($sql);
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

<h1>Rispondi al ticket</h1>

<form method="post">
    <textarea name="text"></textarea>
    <input type="submit" value="Invia">
</form>

</body>
