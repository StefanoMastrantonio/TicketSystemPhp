<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}


?>

<h2>Accesso Operatore</h2>
<form action="login.php" method="post">
    <label for="name">Numero Operatore</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br><br>

    <button type="submit">Accedi</button>
    <input type="hidden" name="goto" value="0">
</form>