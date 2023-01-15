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
        <h1>Nuova categoria </h1>
        <br><br>
        <form action="create_category.php" method="POST">
            <label for="name">Nome</label><br>
            <input type="text" id="name" value="" name="name" placeholder="Nuova Categoria">
            <button type="submit">Crea</button>
        </form>
    </div>
</body>