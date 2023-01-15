<?php
session_start();
require_once('config.php');
//require_once ('vendor/autoload.php');

//$_SESSION['id'];

/** @var PDO $dbh */
$sql= "SELECT * FROM operators";
$result = $dbh->query($sql);

?>


<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/admin.css">
    <title>Login Admin</title>
</head>


<body>
<div class="container">
    <h1>Amministratore</h1>
    <br>
    <div class="form">
        <form action="login.php" method="post">
            <label for="name" style="display:none;">nome</label>
            <input type="text" id="name" name="name" placeholder="inserisci nome"><br><br>

            <label for="email" style="display:none;">Email</label>
            <input type="email" id="email" name="email" placeholder="inserisci email"><br><br>

            <label for="password" style="display:none;">Password</label>
            <input type="password" id="password" name="password" placeholder="inserisci password" ><br><br>

            <button type="submit" " style="display:none">Accedi</button>
            <input type="hidden" name="goto" value="2">
        </form>
    </div>
</div>

</body>
</html>
