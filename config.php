<?php

// visualizzare gli errori
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
