<?php
require_once('config.php');
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}
if (isset($_POST['name']) && (isset($_POST['email'])) && (isset($_POST['emailpassword']))) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
//    print_r($_POST);

    /** @var PDO $dbh */
    $stmt = $dbh->prepare("INSERT IGNORE INTO operators (name, password, email) VALUES(:name, :password, :email)");

    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->execute();
} else {
    header('location: form_creazione_operatore.php');
}

$sql= "SELECT * FROM operators";
$result = $dbh->query($sql);

?>

