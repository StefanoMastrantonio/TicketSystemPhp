<?php
require_once('config.php');
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}

?>
<h1>pagina di creazione di nuovo operatore</h1>

<form action="create_operatore.php" method="POST">
    <label for="name">Nome</label><br>
    <input type="text" id="name" value="" name="name">
    <label for="email">Email</label>
    <input type="email" id="email" name="email">
    <label for="password" id="password">Password</label>
    <input type="password" id="password" name="password">
    <button type="submit">Crea</button>
</form>

