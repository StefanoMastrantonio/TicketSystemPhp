<?php
session_start();
require_once('config.php');

if (isset($_GET['ticket_id'])) {
    $sql = "DELETE FROM tickets WHERE user_id=" . $_GET['user_id'];
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