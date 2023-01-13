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
    <div class="container-title">
        <div class="title">
            <h2>Benvenuto Admin!</h2>
        </div>
        <div class="logout">
            <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>

    </div>
    <br><br>
    <a href="#" class="ticket">Inserisci ticket</a>
    <div  class="form">

    <form method="post" action="create_ticket.php">
        <h3>Titolo</h3>
        <input type="text" name="title">
        <h3>Messaggio</h3>
        <input type="textarea" name="text">
        <h3>Categoria</h3>
        <select name="category_id">
            <option value="0"></option>
            <option value="1">Assistenza Commerciale</option>
            <option value="2">Assistenza Tecnica</option>
        </select>
        <h3>Priorità</h3>
        <select name="priority">
            <option value="0"></option>
            <option value="1">Bassa</option>
            <option value="2">Media</option>
            <option value="3">Alta</option>
        </select>
        <button type="submit">Submit to another page</button>
    </form>

</div>

<h2>Lista Ticket inviati</h2>
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
    <tr>
        <th>Id Ticket</th>
        <th>Categoria</th>
        <th>Utente</th>
        <th>Operatore</th>
        <th>Titolo</th>
        <th>Numero</th>
        <th>data di inizio</th>
        <th>data di fine</th>
        <th>priorità</th>
        <th>Status</th>
        <th>feedback Cliente</th>
        <th>Descrizione</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM tickets WHERE user_id= ".$_SESSION['id'];
    $result= $dbh->query($sql);
    foreach ($result as $row) {
        echo "
        <tr>
        <td>{$row["id"]}</td>
        <td>{$row["category_id"]}</td>
        <td>{$row["user_id"]}</td>
        <td>{$row["operator_id"]}</td>
        <td>{$row["title"]}</td>
        <td>{$row["number"]}</td>
        <td>{$row["start_date"]}</td>
        <td>{$row["end_date"]}</td>
        <td>{$row["priority"]}</td>
        <td>{$row["status"]}</td>
        <td>{$row["user_feedback"]}</td>
        <th><a href='messaggio.php?ticket_id={$row["id"]}' > dettaglio messaggio</a></th>
    </tr>";
    }
    ?>
    </tbody>
</table>
</div>
<script src="js/script.js"></script>
</body>
</html>