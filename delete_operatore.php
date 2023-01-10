<?php
session_start();
require_once('config.php');

if (isset($_GET['operator_id'])) {
    $sql = "DELETE FROM operators WHERE id=" . $_GET['operator_id'];
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