<?php
session_start();
if ($_SERVER['REQUEST_METHOD']=="POST") {
    session_destroy();
    header("Location: form.php");
}

require_once('config.php');
print_r ($_POST);
echo "<br><br>";
?>

<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sessione distrutta</title>
</head>

<body>
</body>

</html>
