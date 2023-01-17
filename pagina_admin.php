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
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>Pagina Admin</title>

</head>
<body>

<div class="container">
    <!--Benvenuto e logout-->
    <div class="menu">
        <div class="avatar">
            <i class="fa-solid fa-user-gear"></i>
            <h3>Benvenuto Admin!</h3>
        </div>
        <div class="actions">

            <!--Bottone Modale Utente-->
            <button id="myBtn1" onclick="addUser()">Crea Nuovo Utente</button>
            <!-- Modale Utente -->
            <div id="myModal1" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-form">
                        <span class="close">&times;</span>
                        <form action="create_utente.php" method="POST">
                            <label for="email" style="display:none">Email</label>
                            <input type="email" id="email1" name="email" placeholder="Crea Email Nuovo Utente">
                            <label for="password" style="display:none">Password</label>
                            <input type="password" id="password1" name="password" placeholder="Password">
                            <button type="button" onclick="addUser()">Crea</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Bottone Modale Operatore -->

            <button id="myBtn" onclick="addOperator()">Crea Nuovo Operatore</button>
             <!-- Modale Operatore -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-form">
                    <span class="close">&times;</span>

                            <form action="create_operatore.php" method="POST">
                                <label for="name" style="display:none;">Nome</label><br>
                                <input type="text" id="name" value="" name="name" placeholder="Crea Nome Nuovo Operatore">
                                <label for="email"style="display:none;">Email</label>
                                <input type="email" id="email" name="email" placeholder="Crea Email Nuovo Operatore">
                                <label for="password"style="display:none;">Password</label>
                                <input type="password" id="password" name="password" placeholder="Password">
                                <button type="button" onclick="addOperator()">Crea</button>
                            </form>
                    </div>
                </div>

            </div>

            <!--Bottone Modale Categoria-->
            <button id="myBtn2" onclick="addCategory()">Crea Nuova Categoria</button>

            <!--Modale Categoria-->
            <div id="myModal2" class="modal">
            <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-form">
                        <span class="close">&times;</span>
                            <form action="create_category.php" method="POST">
                                 <label for="name" style="display:none;">Nome</label><br>
                                 <input type="text" id="name2" value="" name="name" placeholder="Crea Nuova Categoria">
                                  <button type="button" onclick="addCategory()">Crea</button>
                            </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer-menu">
        <div class="contacts">
            <div class="social">
                <a href="https://it-it.facebook.com/TECNASOFT/"><i class="fa-brands fa-facebook" style="padding: 0 1rem; font-size: 20px;"></i></a>
                <a href="https://twitter.com/tecnasoft"><i class="fa-brands fa-square-twitter" style="padding: 0 1rem; font-size: 20px;"></i></a>
                <a href="https://it.linkedin.com/company/tecnasoft?original_referer=https%3A%2F%2Fwww.google.com%2F"><i class="fa-brands fa-linkedin" style="padding: 0 1rem; font-size: 20px;"></i></a>
            </div>
            <a href="https://assistenza.tecnasoft.it/"><i class="fa-solid fa-circle-info"></i></a>
        </div>
        <div class="image">
            <a href="https://www.tecnasoft.it/"><img src="img/logo-tecnasoft.png" alt=""></a>
        </div>
    </div>
    </div>



    <!--barra di navigazione per vedere tabelle operatori, utenti e categorie-->


    <!--sezione principale, con possibilità di creazione operatore, utente e categorie e mostra tabelle categorie-->
    <div class="container-main">







        <!--container delle tabelle di operatori, utenti e categorie-->
        <div class="container-table">
            <nav class="navbar">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li>
                            <div class="link"><a href="#" class="glioperatori">Operatori</a></div>

                        </li>
                        <li>
                            <div class="link"><a href="#" class="gliutenti">Utenti</a></div>

                        </li>
                        <li>
                            <div class="link"><a href="#" class="lecategorie">Categorie</a></div>

                        </li>
                        <li>
                            <div class="link"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></div>

                        </li>
                    </ul>
                </div>
                <div class="logout">

                </div>
            </nav>

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

    </footer>
</div>
<script src="js/admin.js"></script>
</body>
