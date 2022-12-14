<?php
session_start();
require_once('config.php');
if (isset($_POST['title']) && isset($_POST['category_id']) && isset($_POST['priority']) && isset($_POST['text'])) {
    try {
        /** @var PDO $dbh */
        $stmt = $dbh->prepare("INSERT INTO tickets (title, category_id, priority) VALUES (:title, :priority)");
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':priority', $_POST['priority']);
        $stmt->execute();
        $stmt = $dbh->prepare("INSERT INTO messages (text) VALUES (:text)");
        $stmt->bindParam(':text', $_POST['text']);
        $stmt->execute();

        $stmt = $dbh->prepare("SELECT id FROM users");
        $stmt->execute();
        $stmt = $dbh->prepare("INSERT INTO tickets (operator_id) SELECT id FROM operators");
        $stmt->execute();

        $stmt = $dbh->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();

        $id = $dbh->lastInsertId();
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }
    header("Location: messaggio.php?ticket_id=$id");
} else {
    echo "il ticket non è stato compilato correttamente";
};

?>