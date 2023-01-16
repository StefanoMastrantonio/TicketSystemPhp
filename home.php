<?php
require_once('config.php');
?>
<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/home.css">
    <title>Form Accesso</title>
</head>

<body>

<div class="container">
    <h1>Benvenuto</h1>
    <br>
    <br>
    <div class="form">
        <form id="scelta" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
            <select name="opzioni" onchange="redirect()">
                <option value="">Scegli come accedere</option>
                <option value="operatore">Operatore</option>
                <option value="utente">Utente</option>
                <option value="admin">Admin</option>
            </select>
        </form>
    </div>
<?php

if (isset($_POST['opzioni'])) {
    $opzioni = $_POST['opzioni'];
        switch ($opzioni) {
        case 'operatore':
            header ("location: accesso_operatore.php");
            break;
        case 'utente':
            header ("location: accesso_utente.php");
            break;
        case 'admin':
            header ("location: admin.php");
            break;
   }
}
?>

    <div class="mini-footer">
        <div class="company">
            <a href="https://www.tecnasoft.it/"><img src="img/logo-tecnasoft.png" alt=""></a>
        </div>
        <div class="help">
            <a href="https://assistenza.tecnasoft.it/"><i class="fa-solid fa-circle-info"></i></a>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    function redirect() {
        document.getElementById('scelta').submit();
    }
</script>
</html>