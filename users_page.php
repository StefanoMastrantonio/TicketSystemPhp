<?php
session_start();
require_once('config.php');
if (!isset($_SESSION['id'])) {
    header ("location: accesso_utente.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/users_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

    <title>Ticket</title>

</head>
<body>
<!--Form di invio Ticket a Lista Tickets-->
<div class="container">
    <div class="container-main">
        <div class="container-ticket">
            <div class="avatar">
                <i class="fa-solid fa-user"></i>
                <h4>Benvenuto Utente!</h4>
            </div>
            <div class="ticket-form">
                <button id="myBtn" onclick="addCategory()">Inserisci ticket</button>

                <!--Modale Categoria-->
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-form">
                            <span class="close">&times;</span>
                                <form method="post" action="create_ticket.php">
                                    <input type="text" name="title" id="title" placeholder="Titolo">
                                    <input type="textarea" name="text" id="text" placeholder="Scrivi qui un messaggio">
                                    <select name="category_id" id="category">
                                        <option value="0">Scegli la categoria</option>
                                        <option value="1">Assistenza Commerciale</option>
                                        <option value="2">Assistenza Tecnica</option>
                                    </select>
                                    <select name="priority" id="priority">
                                        <option value="0">scegli la priorità</option>
                                        <option value="1">Bassa</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>
                                    </select>
                                    <button type="button" onclick="addTicket()">Crea Nuovo Ticket</button>
                                </form>
                        </div>
                    </div>
                </div>
                <div  class="form">


                </div>
            </div>
        </div>

        <div class="container-table">
        <h3>Lista Ticket inviati</h3>
            <div class='row'>
                <div class='row-cel hd'>Id Ticket</div>
                <div class='row-cel hd'>Categ.</div>
                <div class='row-cel hd'>Utente</div>
                <div class='row-cel hd'>Operat.</div>
                <div class='row-cel hd'>Titolo</div>
                <div style='display:none;'>Numero</div>
                <div class='row-cel hd'>Inizio</div>
                <div class='row-cel hd'>Fine</div>
                <div class='row-cel hd'>Priorità</div>
                <div style='display:none;'>Status</div>
                <div style='display:none;'>feedback Cliente</div>
                <div class='row-cel hd'></div>
            </div>
        <?php
        $sql = "SELECT * FROM tickets WHERE user_id= ".$_SESSION['id'];
        $result= $dbh->query($sql);
        foreach ($result as $row) {
            echo "
            <div class='row'>
                <div class='row-cel'>{$row["id"]}</div>
                <div class='row-cel'>{$row["category_id"]}</div>
                <div class='row-cel'>{$row["user_id"]}</div>
                <div class='row-cel'>{$row["operator_id"]}</div>
                <div class='row-cel'>{$row["title"]}</div>
                <div style='display:none;'>{$row["number"]}</div>
                <div class='row-cel'>{$row["start_date"]}</div>
                <div class='row-cel'>{$row["end_date"]}</div>
                <div class='row-cel'>{$row["priority"]}</div>
                <div style='display:none;'>{$row["status"]}</div>
                <div style='display:none;'>{$row["user_feedback"]}</div>
                <div class='row-cel'><a href='messaggio.php?ticket_id={$row["id"]}'><span><i class='fa-solid fa-magnifying-glass'></i></span></a></div>
            </div>";
        }
        ?>

        </div>

        <div class="logout">
            <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>
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

</div>

<script src="js/script.js"></script>
</body>
</html>
