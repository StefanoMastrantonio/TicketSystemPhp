<?php
session_start();
require_once('config.php');
//require_once ('vendor/autoload.php');

//$_SESSION['id'];

/** @var PDO $dbh */
$sql= "SELECT * FROM operators";
$result = $dbh->query($sql);

?>

<h1>Admin</h1>
<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Registrazione</title>
</head>
<body>
<form action="login.php" method="post">
    <label for="name">nome</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br><br>

    <button type="submit">Accedi</button>
    <input type="hidden" name="goto" value="2">
</form>
</body>
</html>
