<?php
session_start();
require_once('config.php');
if ($_POST['goto'] == "1") {

    try {
        /** @var PDO $dbh */
        $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->execute();

    } catch (PDOException $e) {
        print $e->getMessage();
    };
    header ("location: home.php");
}?>
<html>
<head>
    <meta charset="UTF - 8">
    <meta name="viewport"
          content="width = device - width, user - scalable = no, initial - scale = 1.0, maximum - scale = 1.0, minimum - scale = 1.0">
    <meta http-equiv="X - UA - Compatible" content="ie = edge">
    <title>Registrazione utente</title>
</head>
<body>
<h2>Registrati</h2>
<form action="users_page.php" method="post">

    <label for="email">Email</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br><br>

    <button type="submit">Submit to another page</button>
    <input type="hidden" name="goto" value="0">
</form>
</body>
</html>