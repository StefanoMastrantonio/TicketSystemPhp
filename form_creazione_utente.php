<?php
require_once('config.php');
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}

?>
<h1>pagina di creazione di nuovo utente</h1>

<form action="create_utente.php" method="POST">
    <label for="email">Email</label>
    <input type="email" id="email" name="email">
    <label for="password" id="password">Password</label>
    <input type="password" id="password" name="password">
    <button type="submit">Crea</button>
</form>