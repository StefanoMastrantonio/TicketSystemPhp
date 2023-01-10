<?php
require_once('config.php');
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}

?>
<h1>pagina di creazione di nuova categoria </h1>

<form action="create_category.php" method="POST">
    <label for="name">Nome</label><br>
    <input type="text" id="name" value="" name="name">
    <button type="submit">Crea</button>
</form>