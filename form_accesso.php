<?php
session_start();

if (isset($_SESSION['id'])) {
    header("Location:lista_tickets.php");
}
require_once('config.php');
?>
<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Registrazione</title>
</head>

<body>
<h1>Benvenuto</h1>
<form id="scelta" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
    <select name="opzioni" onchange="redirect()">
        <option value="">Scegli come loggarti</option>
        <option value="operatore">Operatore</option>
        <option value="utente">Utente</option>
        <option value="admin">Admin</option>
    </select>
</form>

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
</body>
<script type="text/javascript">
    function redirect() {
        document.getElementById('scelta').submit();
    }
</script>
</html>