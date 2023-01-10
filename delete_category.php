<?php
session_start();
require_once('config.php');

if (isset($_GET['category_id'])) {
    $sql = "DELETE FROM categories WHERE id=" . $_GET['category_id'];
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