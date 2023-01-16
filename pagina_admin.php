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
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

    <title>Pagina Admin</title>

</head>
<body>

<div class="container">
    <!--Benvenuto e logout-->
    <div class="container-title">
        <!--titolo-->
        <div class="title">
            <h1>Benvenuto Admin!</h1>
            <br>
            <p>che cosa vuoi fare?</p>
        </div>
        <!--logout-->
        <div class="logout">
            <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>

    <!--barra di navigazione per vedere tabelle operatori, utenti e categorie-->
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li>
                    <a href="#" class="glioperatori">Vedi tutti gli operatori</a>
                </li>
                <li>
                    <a href="#" class="gliutenti">Vedi tutti gli utenti</a>
                </li>
                <li>
                    <a href="#" class="lecategorie">Vedi tutte le categorie</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--sezione principale, con possibilità di creazione operatore, utente e categorie e mostra tabelle categorie-->
    <div class="container-main">

        <!--crezione operatore, utente e categorie-->
        <div class="menu">
            <div class="avatar">
                <i class="fa-solid fa-user-gear"></i>
            </div>
            <div class="actions">
                <div class="operator">
                    <a href="form_creazione_operatore.php" alt="crea operatore"><span>Crea Nuovo Operatore</span></a>
                </div>
                <div class="user">
                    <a href="form_creazione_utente.php"><span">Crea Nuovo Utente</a>
                </div>
                <div class="category">
                    <a href="form_creazione_categoria.php"><span >Crea Nuova Categoria</a>
                </div>
            </div>
        </div>


        <!--container delle tabelle di operatori, utenti e categorie-->
        <div class="container-table">

            <!--tabella operatori con toggle-->
            <div class="operatori">
                <h3>Tutti gli operatori</h3>
                    <div class="container-table one">
                        <div class="row">
                            <div style ='display: none'>Id Operatore</div>
                            <div class="row-cel">Nome</div>
                            <div class="row-cel">Email</div>
                            <div class="row-cel">Password</div>
                            <div class="row-cel">Cancella</div>
                        </div>
                    <?php
                        foreach ($result as $row) {
                            echo "
                                <div class='row'>
                                    <div style ='display: none'>{$row["id"]}</div>
                                    <div class='row-cel'>{$row["name"]}</div>
                                    <div class='row-cel'>{$row["email"]}</div>
                                    <div class='row-cel'>{$row["password"]}</div>
                                    <div class='row-cel first'><a href='delete_operatore.php?operator_id={$row['id']}'><i class='fa-sharp fa-solid fa-trash'></i></a></div>
                                </div> ";
                        }
                    ?>
                    </div>
            </div>

            <!--tabella utenti con toggle-->
            <div class="utenti">
                <h3>Tutti gli utenti</h3>
                    <div class="container-table one">
                        <div class="row">
                            <div style = "display: none">Id utente</div>
                            <div class='row-cel ut'>Email</div>
                            <div class='row-cel ut'>Password</div>
                            <div class="row-cel ut">Cancella</div>
                       </div>
                    <?php
                        foreach ($risultato as $row) {
                            echo "
                                <div class='row'>
                                    <div style ='display: none'>{$row["id"]}</div>
                                    <div class='row-cel ut'>{$row["email"]}</div>
                                    <div class='row-cel ut'>{$row["password"]}</div>
                                    <div class='row-cel ut'><a href='delete_utente.php?user_id={$row['id']}'><i class='fa-sharp fa-solid fa-trash'></i></a></div>
                                </div>";
                        }
                    ?>
                    </div>
            </div>

            <!--tabella categorie con toggle-->
            <div class="categorie">
                <h3>Tutte le categorie</h3>
                    <div class="container-table one">
                        <div class="row">
                            <div style ='display: none'>Id categoria</div>
                            <div class='row-cel ct'>Nome</div>
                            <div class='row-cel ct'>Cancella</div>
                        </div>
                    <?php
                        foreach ($results as $row) {
                            echo "
                               <div class='row'>
                                   <div style ='display: none'>{$row["id"]}</div>
                                   <div class='row-cel ct'>{$row["name"]}</div>
                                   <div class='row-cel ct'><a href='delete_category.php?category_id={$row['id']}'><i class='fa-sharp fa-solid fa-trash'></i></a></div>
                               </div>";
                        }
                    ?>
                    </div>
            </div>

        </div>

    </div>


    <!--footer con logo e info-->
    <footer>
        <div class="ftone">
            <div class="image">
                <img src="img/logo-tecnasoft.png" alt="">
            </div>
        </div>
        <div class="fttwo">
            <div class="mails">
            </div>
            <div class="contacts">
                <h4>staff@tecnasoft.it</h4>
            </div>
            <div class="social">
                <a href="https://it-it.facebook.com/TECNASOFT/"><i class="fa-brands fa-facebook" style="padding: 0 1rem; font-size: 20px;"></i></a>
                <a href="https://twitter.com/tecnasoft"><i class="fa-brands fa-square-twitter" style="padding: 0 1rem; font-size: 20px;"></i></a>
                <a href="https://it.linkedin.com/company/tecnasoft?original_referer=https%3A%2F%2Fwww.google.com%2F"><i class="fa-brands fa-linkedin" style="padding: 0 1rem; font-size: 20px;"></i></a>
            </div>
        </div>
    </footer>
</div>
<script src="js/admin.js"></script>
</body>
