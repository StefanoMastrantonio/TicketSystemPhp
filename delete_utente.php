<?php
session_start();
require_once('config.php');

if (isset($_GET['user_id'])) {
    $sql = "DELETE FROM tickets WHERE user_id=" . $_GET['user_id'];
    try {
        /** @var PDO $dbh */
        $dbh->query($sql);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }

    $sql = "DELETE FROM users WHERE id=" . $_GET['user_id'];
    try {
        /** @var PDO $dbh */
        $dbh->query($sql);
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }

}
header ("location: pagina_admin.php");
?>