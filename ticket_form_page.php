<?php


require_once('config.php');
print_r ($_POST);
echo "<br><br>";

try {
    /** @var PDO $dbh */
    $stmt = $dbh->prepare("INSERT INTO tickets (title, category_id, priority) VALUES (:title, :category_id, :priority)");
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':category_id', $_POST['category_id']);
    $stmt->bindParam(':priority', $_POST['priority']);
    $stmt->execute();
    $stmt = $dbh->prepare("INSERT INTO messages (text) VALUES (:text)");
    $stmt->bindParam(':text', $_POST['text']);
    $stmt->execute();
    echo "Inserimento ok";
}
catch (PDOException $e)
{
    print $e->getMessage();
    die();
};
?>