<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require_once('config.php');
//includo file di struttura della mail
require_once('body.php');
if (isset($_POST['title']) && isset($_POST['category_id']) && isset($_POST['priority']) && isset($_POST['text'])) {

    $utente = $_SESSION['id'];

    try {
        /** @var PDO $dbh */
        $stmt = $dbh->prepare("INSERT INTO tickets (title, category_id, priority, user_id) VALUES (:title, :category_id, :priority, :user_id)");
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':category_id', $_POST['category_id']);
        $stmt->bindParam(':priority', $_POST['priority']);
        $stmt->bindParam(':user_id', $utente);
        $stmt->execute();
        $id = $dbh->lastInsertId();
        $stmt = $dbh->prepare("INSERT INTO messages (text, ticket_id, user_id) VALUES (:text, :ticket_id,:user_id)");
        $stmt->bindParam(':text', $_POST['text']);
        $stmt->bindParam(':user_id', $utente);
        $stmt->bindParam(':ticket_id', $id);
        $stmt->execute();

        //codice di php mailer che va messo sul codice php che fa l'azione
        $mail = new PHPMailer(true);

        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '0870cc66cba737';                     //SMTP username
            $mail->Password   = 'c8f42f7dc36756';                               //SMTP password
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
            $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');

            //Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //array associativo che ho definito qui e che richiamo dalla funzione presente in body.php. Serve a richiamare i parametri che voglio far vedere nella mail della creazione del ticket
            $data =['titolo' => $_POST['title'], 'categoria'=> $_POST['category_id'], 'priorità' => $_POST['priority'], 'testo' => $_POST['text'] ];

            //ho creato una variabile con all'interno la funzione che contiene l'array data
            $body= body($data);
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'NoReply - Invio Ticket';
            //ho richiamato la variabile con all'interno la funzione
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        header("Location: messaggio.php?ticket_id=$id");

        //        $stmt = $dbh->prepare("SELECT * FROM `viewtickets`");
//            $stmt = $dbh->prepare("INSERT INTO messages (text) VALUES (:text)");
//           $stmt->bindParam(':text', $_POST['text']);
//           $stmt->execute();
//          $stmt = $dbh->prepare("INSERT INTO categories (name) VALUES (:name)");
//            $stmt->bindParam(':name', $_POST['name']);
//           $stmt = $dbh->prepare( "SELECT id FROM categories");
//           $stmt = $dbh->prepare("INSERT INTO tickets (category_id) SELECT categories.id FROM categories");
//          $stmt->execute();
//           $stmt = $dbh->prepare("SELECT operators.id, users.id FROM operators, users");
//            $stmt = $dbh->prepare("INSERT INTO tickets (operator_id, user_id) SELECT operators.id, users.id FROM operators, users");
//            $stmt->execute();
//          $stmt = $dbh->prepare("INSERT INTO categories (name) VALUES (:name)");
//           $stmt->bindParam(':name', $_POST['name']);
//          $stmt->execute();
//

    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }


} else {
    echo "il ticket non è stato compilato correttamente";
};
// ?ticket_id=$id

/*
 *
CREATE OR REPLACE VIEW viewTickets AS
SELECT `tickets`.*,
`operators`.`name` AS operator,
`users`.`email` AS userEmail,
`categories`.`name` AS category
FROM `tickets`
JOIN `operators` ON `operators`.`id` = `tickets`.`operator_id`
JOIN `users` ON `users`.`id` = `tickets`.`user_id`
JOIN `categories` ON `categories`.`id` = `tickets`.`category_id`
 *
 *
 */
?>

<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/create.css">
    <title>Creazione Ticket</title>
</head>

<body>
<div class="container">
    <br>
    <h1>Mail Inviata!</h1>
    <br><br><br><br>
    <a href="pagina_admin.php"><div class="span">Torna alla Pagina Principale</div></a>
</div>
</body>

