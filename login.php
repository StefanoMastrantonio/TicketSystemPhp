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
            header("location: accesso_operatore.php");
            echo "non puoi accedere a questa pagina";
        }
    } catch (Exception $e) {
        $_SESSION['msg'] = $e->getMessage();
    }

} elseif ($_POST['goto'] == "1") {
    try {
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
        } else {
            header("location: accesso_utente.php");
            echo "non puoi accedere a questa pagina";
        }
    } catch (Exception $e) {
        $_SESSION['msg'] = $e->getMessage();
    }
} elseif ($_POST['goto'] == "2") {
    try {
        $query = $dbh->prepare("SELECT * FROM admin WHERE name = :name AND password = :password AND email = :email");

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
                    header("location: pagina_admin.php");
                }
            }
        } else {
            header("location: pagina_errore_admin.php");
            echo "inserisci le credenziali corrette";
        }
    } catch (Exception $e) {
        $_SESSION['msg'] = $e->getMessage();
    }

}
?>
