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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/accesso_operatore.css">
    <title>Accesso Operatore</title>
</head>

<div class="container">
    <div class="help">
        <a href="home.php"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <h1>Operatore</h1>
    <br>
    <div class="form">
        <form action="login.php" method="post">
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
    <div class="mini-footer">
        <div class="company">
            <a href="https://www.tecnasoft.it/"><img src="img/logo-tecnasoft.png" alt=""></a>
        </div>
        <div class="help">
            <a href="https://assistenza.tecnasoft.it/"><i class="fa-solid fa-circle-info"></i></a>
        </div>
    </div>
</div>