<?php
session_start();
?>
<html>
<body>
<form action="login.php" method="post">
    <ul>
        <li>Nome Utente</li>
        <li><input type="text" name="username" /></li>
        <li>Password</li>
        <li><input type="password" name="password" /></li>
        <li><input type="submit" value="Invia" /></li>
        <li>Se non sei giá iscritto, <a href="form_registrazione.php">registrati</a></li>
    </ul>
</form>
</body>
</html>