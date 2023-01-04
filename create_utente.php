<?php
require_once('config.php');
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}
if ((isset($_POST['email'])) && (isset($_POST['password']))) {
    $email = $_POST['email'];
    $password = $_POST['password'];
//    print_r($_POST);

    /** @var PDO $dbh */
    $stmt = $dbh->prepare("INSERT IGNORE INTO operators (password, email) VALUES(:password, :email)");
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->execute();
} else {
    header('location: form_creazione_operatore.php');
}

$sql= "SELECT * FROM users";
$result = $dbh->query($sql);

?>