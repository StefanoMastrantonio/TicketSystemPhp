<?php
$url="localhost";
$username="root";
$password="root";
$db="ticketsystemphp_db";
try {
    $dbh = new PDO("mysql:host=$url;dbname=$db", $username, $password);
    $dbh->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    print $e->getMessage();
    die();
}
?>
