<?php
//session_start();
//
//if($_SERVER['REQUEST_METHOD']=="POST") {
//    $_SESSION['id'] = "Pippo";
//    if ($_POST['goto']=="0") {
//        header("Location: lista_tickets.php");
//    } elseif ($_POST['goto']=="1") {
//        header("Location: user_page.php");
//    }
//}

require_once('config.php');
$url = "localhost";
$username = "root";
$password = "root";
$db = "ticketsystemphp_db";
//print_r($url); die();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
/** @var PDO $dbh */
if ($_POST['goto'] == "0") {
    $query = $dbh->prepare("SELECT * FROM operators WHERE name = :name AND password = :password AND email = :email");

    $query->bindParam(':name', $_POST['name']);
    $query->bindParam(':email', $_POST['email']);
    $query->bindParam(':password', $_POST['password']);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);

    $rows = $query->rowCount();

    if ($rows > 0) {
        while ($row = $query->fetch()) {
            if ($row['password'] === $password && $row['name'] === $name && $row['email'] === $email) {
                session_start();
                $_SESSION['id'] = $row['id'];
                header("location: lista_tickets.php");
            } else {
                header("location: registrer.php");
            }
        }
    }
} elseif ($_POST['goto'] == "1") {
    $query = $dbh->prepare("SELECT * FROM users WHERE  password = :password AND email = :email");
    $query->bindParam(':email', $_POST['email']);
    $query->bindParam(':password', $_POST['password']);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);

    $rows = $query->rowCount();

    if ($rows > 0) {
        while ($row = $query->fetch()) {
            if ($row['password'] === $password && $row['email'] === $email) {
                session_start();
                $_SESSION['id'] = $row['id'];
                header("location: users_page.php");
            } else {
                header("location: registrer_user.php");
            }
        }
    }
}
?>
