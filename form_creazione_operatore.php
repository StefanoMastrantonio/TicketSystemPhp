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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Form Accesso</title>
</head>

<body>
<div class="container">
    <h1>Nuovo operatore</h1>
    <br>
    <form action="create_operatore.php" method="POST">
        <label for="name">Nome</label><br>
        <input type="text" id="name" value="" name="name" placeholder="Nome">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email">
        <label for="password" id="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password">
        <button type="submit">Crea</button>
    </form>

    <a href="pagina_admin.php"><i class="fa-solid fa-arrow-left"></i></a>
</div>
</body>

