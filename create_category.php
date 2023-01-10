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