<?php
session_start();
require_once('config.php');
if(!isset($_SESSION['id'])) {
    header('location: operatore/accesso_operatore.php');
} else {
    /** @var PDO $dbh */
    $sql = "SELECT * FROM tickets";
    try {
        $result = $dbh->query($sql);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/lista_tickets.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lista Ticket</title>

</head>
<body>
<div class="container">
    <div class="header">
        <div class="title">
            <h2>Benvenuto Operatore</h2>
        </div>
        <div class="logout">

            <form action="logout.php" method="post">
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </form>
        </div>
    </div>
    <br><br>
<div class="container-main">
    <div class="actions">
        <div class="avatar">
            <i class="fa-solid fa-user-gear"></i>
        </div>
    </div>
    <div class="container-table">
        <h3>Lista ticket</h3>
        <div class='row'>
            <div class='row-cel hd'>Id Ticket</div>
            <div class='row-cel'>Categ.</div>
            <div class='row-cel hd'>Utente</div>
            <div class='row-cel hd'>Operat.</div>
            <div class='row-cel hd'>Titolo</div>
            <div style="display:none;">Numero</div>
            <div class='row-cel hd'>Inizio</div>
            <div class='row-cel hd'>Fine</div>
            <div class='row-cel hd'>Priorità</div>
            <div style="display:none;">Status</div>
            <div style="display:none;">feedback Cliente</div>
            <div class='row-cel hd'></div>
        </div>
        <?php
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
        </div>
        <hr>
    
        ";
    }

    ?>
    </div>
</div>
</div>
</body>
