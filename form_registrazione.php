<?php
session_start();

if (isset($_SESSION['id'])) {
header("Location:lista_tickets.php");
}
require_once('config.php');
?>
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

<!--Form di Accesso per L'operatore che indirizza a Lista Tickets-->

    <div>
        <h2>Accesso Operatore</h2>
        <form action="login.php" method="post">

            <label for="name">Nome</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email"><br><br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password"><br><br>

            <button type="submit">Submit to another page</button>
            <input type="hidden" name="goto" value="0">
        </form>
    </div>

    <div>
        <h2>Accesso Utente</h2>
        <form action="login.php" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"><br><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password"><br><br>
            <button type="submit">Submit to another page</button>
            <input type="hidden" name="goto" value="1">
        </form>
    </div>
</body>

</html>