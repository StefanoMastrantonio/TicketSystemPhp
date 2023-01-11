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
    <link rel="stylesheet" href="form_accesso.css">
    <title>Form Registrazione</title>
</head>

<body style="background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(65,65,129,1) 35%, rgba(0,212,255,1) 100%); height: 100vh;">
<div class="container" style="text-align: center; d-flex line-height: center;">
    <h1 style="color:white">Benvenuto</h1>
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
</div>
</body>
<script type="text/javascript">
    function redirect() {
        document.getElementById('scelta').submit();
    }
</script>
</html>