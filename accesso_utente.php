<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/accesso_utente.css">
    <title>Accesso Utente</title>
</head>
<div class="container">
    <h1>Utente</h1>
        <br>
        <br>
        <div class="form">
            <form action="login.php" method="post">
                <label for="email" style="display:none">Email</label>
                <input type="email" id="email" name="email" placeholder="Email"><br><br>
                <label for="password" style="display:none">Password</label>
                <input type="password" id="password" name="password" placeholder="Password"><br><br>
                <button type="submit" style="display:none">Accedi</button>
                <input type="hidden" name="goto" value="1">
            </form>
        </div>
</div>

