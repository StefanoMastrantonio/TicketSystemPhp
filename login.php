<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST") {
    $_SESSION['id'] = "Pippo";
    if ($_POST['goto']=="0") {
        header("Location: lista_tickets.php");
    } elseif ($_POST['goto']=="1") {
        header("Location: user_page.php");
    }
}

require_once('config.php');
print_r ($_POST);
echo "<br><br>";
?>