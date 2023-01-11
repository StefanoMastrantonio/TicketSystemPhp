<?php
//file che contiene funzione che serve a creare un corpo unico nella mail di conferma di avvenuta creazione sia del ticket, sia dell'utente sia dell'operatore.
function body(array $data) : string {
    $html= '<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ticket</title>

</head>
<body style="font-family: Arial;">
<div class="container">
    <header style="background: #101445; ">
        <img src="https://www.tecnasoft.it/media/img/logo_negativo_verde.png" alt="" style="padding: 2rem; width: 25%;">
    </header>
<main style="text-align: center; width: 50%; margin: 5rem auto;">
    <h2>Ciao!</h2>
    <p >Abbiamo attivato un nuovo profilo</p>
    <p>le tue credenziali sono:</p>';
    foreach ($data as $key=>$value){
        //nel foreach ho fatto una variabile html in cui ho inserito i parametri key e value presenti in data
        $html.= '<p>'.$key. ' '. $value. '</p>';
    }
    $html .='
    
    
    <p>per assistenza invia una mail a <a href="">assistenza@mail.it</a></p>
</main>
<footer style="text-align: end; width: 50%; margin: auto;">
    <i class="fa-brands fa-facebook"></i>
    <i class="fa-brands fa-square-twitter"></i>
    <i class="fa-brands fa-linkedin"></i>
</footer>
</div>

</body>';
    return $html;
    //ho fatto il return della variabile
}
?>
