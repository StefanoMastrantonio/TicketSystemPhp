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
    <link rel="stylesheet" href="../css/accesso_operatore.css">
    <title>Accesso Operatore</title>
</head>
<div class="container">
    <h1>Operatore</h1>
    <br>
    <div class="form">
        <form action="../login.php" method="post">
            <label for="name" style="display:none">Numero Operatore</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="email" style="display:none">Email</label>
            <input type="email" id="email" name="email"><br><br>

            <label for="password" style="display:none">Password</label>
            <input type="password" id="password" name="password"><br><br>

            <button type="submit" style="display:none">Accedi</button>
            <input type="hidden" name="goto" value="0">
        </form>
    </div>
</div>