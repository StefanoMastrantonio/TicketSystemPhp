<?php
session_start();
require_once('config.php');
if (!isset($_SESSION['id'])) {
    print_r($_SESSION['id']);
    header ("location: admin.php");
} else {

    /** @var PDO $dbh */
    $sql = "SELECT * FROM operators";
    $result = $dbh->query($sql);

    $query = "SELECT * FROM users";
    $risultato = $dbh->query($query);

    $quer = "SELECT * FROM categories";
    $results = $dbh->query($quer);
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="pagina_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/pagina_admin.js" defer></script>
    <title>Pagina Admin</title>

</head>
<body style="background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(65,65,129,1) 35%, rgba(0,212,255,1) 100%); height: 100vh; color:white;">

<div class="container">
<div class="container-title">
    <div class="title">
        <h1>Benvenuto Admin!</h1>

        <p>che cosa vuoi fare?</p>
    </div>
    <div class="logout">
        <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
    <div class="menu">
        <a href="form_creazione_operatore.php" ><i class="fa-sharp fa-solid fa-user-plus" id="operator" ></i></a>
        <a href="form_creazione_utente.php"><i class="fa-sharp fa-solid fa-person-circle-plus" id="user"></i></a>
        <a href="form_creazione_categoria.php"><i class="fa-solid fa-square-plus" id="category"></i></a>
    </div>
</div>
<div class="container-main">


<div class="container-table">
    <body background="img/logo-tecnasoft.png">

    <h3>Tutti gli operatori</h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
        <tr>
            <th style ='display: none'>Id Operatore</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $row) {
            echo "
            <tr>
            <td style ='display: none'>{$row["id"]}</td>
            <td>{$row["name"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["password"]}</td>
            <th><a href='delete_operatore.php?operator_id={$row['id']}'>Cancella operatore</a></th>
        </tr>";
        }
        ?>

        </tbody>
    </table>
    <br>
    <br>

    <h3>Tutti gli utenti</h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
        <tr>
            <th style = "display: none">Id utente</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($risultato as $row) {
            echo "
            <tr>
            <td style ='display: none'>{$row["id"]}</td>
            <td>{$row["email"]}</td>
            <td>{$row["password"]}</td>
            <th><a href='delete_utente.php?user_id={$row['id']}'>Cancella Utente</a></th>
        </tr>";
        }
        ?>

        </tbody>
    </table>
    <h3>Tutte le categorie</h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
        <tr>
            <th style ='display: none'>Id categoria</th>
            <th>Nome</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $row) {
            echo "
            <tr>
            <td style ='display: none'>{$row["id"]}</td>
            <td>{$row["name"]}</td>
            <th><a href='delete_category.php?category_id={$row['id']}'>Cancella Categoria</a></th>
        </tr>";
        }
        ?>

        </tbody>
    </table>
</div>
</div>
</div>
</body>
