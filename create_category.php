<?php
session_start();
require_once('config.php');
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    /** @var PDO $dbh */
    $sql = $dbh->prepare("INSERT IGNORE INTO categories (name) VALUES (:name)");
    $sql->bindParam(':name', $_POST['name']);
    try {
        $sql->execute();
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }
}

header("location: pagina_admin.php");
?>

<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/create.css">
    <title>Creazione Utente</title>
</head>

<body>
<div class="container">
    <br>
    <h1>Categoria Creata!</h1>
    <br><br><br><br>
    <a href="pagina_admin.php"><div class="span">Torna alla Pagina Principale</div></a>
</div>
</body>
