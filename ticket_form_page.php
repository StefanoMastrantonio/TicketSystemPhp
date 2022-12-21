<?php
session_start();
require_once('config.php');
if (isset($_POST['title']) && isset($_POST['category_id']) && isset($_POST['priority']) && isset($_POST['text'])) {
    try {
        /** @var PDO $dbh */
        $stmt = $dbh->prepare("INSERT INTO tickets (title, category_id, priority) VALUES (:title, :category_id, :priority)");
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':category_id', $_POST['category_id']);
        $stmt->bindParam(':priority', $_POST['priority']);
        $stmt->execute();
        $stmt = $dbh->prepare("SELECT * FROM `viewtickets`");
        //    $stmt = $dbh->prepare("INSERT INTO messages (text) VALUES (:text)");
        //   $stmt->bindParam(':text', $_POST['text']);
        //   $stmt->execute();
        //  $stmt = $dbh->prepare("INSERT INTO categories (name) VALUES (:name)");
        //    $stmt->bindParam(':name', $_POST['name']);
        //    $stmt = $dbh->prepare( "SELECT id FROM categories");
        //   $stmt = $dbh->prepare("INSERT INTO tickets (category_id) SELECT categories.id FROM categories");
        //   $stmt->execute();
        //   $stmt = $dbh->prepare("SELECT operators.id, users.id FROM operators, users");
        //    $stmt = $dbh->prepare("INSERT INTO tickets (operator_id, user_id) SELECT operators.id, users.id FROM operators, users");
        //    $stmt->execute();
        //  $stmt = $dbh->prepare("INSERT INTO categories (name) VALUES (:name)");
        //   $stmt->bindParam(':name', $_POST['name']);
        //  $stmt->execute();

        $id = $dbh->lastInsertId();
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }
    header("Location: messaggio.php?ticket_id=$id");
} else {
    echo "il ticket non è stato compilato correttamente";
};
// ?ticket_id=$id

/*
 *
CREATE OR REPLACE VIEW viewTickets AS
SELECT `tickets`.*,
`operators`.`name` AS operator,
`users`.`email` AS userEmail,
`categories`.`name` AS category
FROM `tickets`
JOIN `operators` ON `operators`.`id` = `tickets`.`operator_id`
JOIN `users` ON `users`.`id` = `tickets`.`user_id`
JOIN `categories` ON `categories`.`id` = `tickets`.`category_id`
 *
 *
 */
?>

