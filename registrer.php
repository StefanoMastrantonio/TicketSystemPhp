<?php
session_start();
require_once('config.php');
if ($_POST['goto'] == "0") {
    try {
        /** @var PDO $dbh */
        $stmt = $dbh->prepare("INSERT INTO tickets (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->execute();
    } catch (PDOException $e) {
        print $e->getMessage();
    };
}?>
<html>
<head>
    <meta charset="UTF - 8">
    <meta name="viewport"
          content="width = device - width, user - scalable = no, initial - scale = 1.0, maximum - scale = 1.0, minimum - scale = 1.0">
    <meta http-equiv="X - UA - Compatible" content="ie = edge">
    <title>Registrazione operatore</title>
</head>
<body>
    <h2>Registrati</h2>
    <form action="lista_tickets.php" method="post">

    <label for="name">Nome</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br><br>

    <button type="submit">Submit to another page</button>
    <input type="hidden" name="goto" value="0">
</form>


</body>
</html>
