<?php
require_once('config.php');
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}

?>
<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/form_accesso.css">
    <title>Form Accesso</title>
</head>

<body>
    <div class="container">
        <br>
        <h1>Nuovo utente</h1>
        <br>
        <br>
        <form action="create_utente.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email">
            <label for="password" id="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <button type="submit">Crea</button>
        </form>
    </div>
</body>