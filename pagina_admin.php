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
    <link rel="stylesheet" href="css/pagina_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/pagina_admin.js" defer></script>
    <title>Pagina Admin</title>

</head>
<body>

<div class="container">
    <div class="container-title">
        <div class="title">
            <h1>Benvenuto Admin!</h1>

            <p>che cosa vuoi fare?</p>
        </div>
        <div class="logout">
            <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>

    </div>
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="read_operators.php">Vedi tutti gli operatori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="read_users.php">Vedi tutti gli utenti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="read_categories.php">Vedi tutte le categorie</a>
                    </li>
                </ul>
        </div>
    </nav>
    <div class="container-main">
        <div class="menu">
            <div class="operator">
                <a href="form_creazione_operatore.php" alt="crea operatore"><i class="fa-sharp fa-solid fa-user-plus" id="operator"><span style="display: none;">Crea Nuovo Operatore</span></i></a>
            </div>
            <div class="user">
                <a href="form_creazione_utente.php"><i class="fa-sharp fa-solid fa-person-circle-plus" id="user"><span style="display: none;">Crea Nuovo Utente</i></a>
            </div>
            <div class="category">
                <a href="form_creazione_categoria.php"><i class="fa-solid fa-square-plus" id="category"><span style="display: none;">Crea Nuova Categoria</i></a>
            </div>
        </div>

    <div class="container-table">
    <!--    <img src="img/social-removebg-preview.png" alt="">-->

        <br>
        <br>



    </div>
    </div>
    <footer>
        <div class="ftone">
            <div class="image">
                <img src="img/logo-tecnasoft.png" alt="">
                <br>
                <br>
                <h3>About Tecnasoft</h3>
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, aperiam architecto assumenda blanditiis dicta dolorem dolores enim eos et eum fugit impedit ipsam maiores molestiae nulla quod sint voluptatibus voluptatum.</p>
            </div>
        </div>
        <div class="fttwo">
            <div class="mails">
                <h3>servizi</h3>
            </div>
            <div class="contacts">
                <h4>ciao</h4>
                <h4>ciao</h4>
                <h4>ciao</h4>
                <h4>ciao</h4>
                <h4>ciao</h4>
                <h4>ciao</h4>
            </div>
            <div class="social">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-square-twitter"></i>
                <i class="fa-brands fa-linkedin"></i>
            </div>

        </div>

    </footer>
</div>
</body>
