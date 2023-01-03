<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}
?>
<h2>Accesso Utente</h2>
<form action="login.php" method="post">
    <label for="email">Email</label>
    <input type="email" id="email" name="email"><br><br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br><br>
    <button type="submit">Accedi</button>
    <input type="hidden" name="goto" value="1">
</form>

