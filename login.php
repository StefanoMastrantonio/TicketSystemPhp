<?php
session_start();

require_once('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

/** @var PDO $dbh */
if ($_POST['goto'] == "0") {
    try {
        $query = $dbh->prepare("SELECT * FROM operators WHERE name = :name AND password = :password AND email = :email");

        $query->bindParam(':name', $name);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);

        $rows = $query->rowCount();

        if ($rows == 1) {
            while ($row = $query->fetch()) {
                if ($row['password'] === $password && $row['name'] === $name && $row['email'] === $email) {
                    $_SESSION['id'] = $row['id'];
                    header("location: lista_tickets.php");
                }
            }
        } else {
            header("location: registrer.php");
        }
    } catch (Exception $e) {
        $_SESSION['msg'] = $e->getMessage();
    }

} elseif ($_POST['goto'] == "1") {
    $query = $dbh->prepare("SELECT * FROM users WHERE  password = :password AND email = :email");
    $query->bindParam(':email', $_POST['email']);
    $query->bindParam(':password', $_POST['password']);
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);

    $rows = $query->rowCount();

    if ($rows == 1) {
        while ($row = $query->fetch()) {
            if ($row['password'] === $password && $row['email'] === $email) {
                $_SESSION['id'] = $row['id'];
                header("location: users_page.php");
            }
        }
    }  else {
    header("location: registrer_user.php");
    }
}
?>
