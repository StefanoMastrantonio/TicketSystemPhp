<?php
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$_SESSION = array();
header("Location: form_login.php");
if ($_SERVER['REQUEST_METHOD']=="POST") {
    session_destroy();
    header("Location: form_accesso.php");
}

require_once('config.php');
print_r ($_POST);
echo "<br><br>";
?>

<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sessione distrutta</title>
</head>

<body>
</body>
