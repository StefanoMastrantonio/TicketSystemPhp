<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require_once('config.php');
echo "<br><br>";


if (isset($_POST['text'])) {
$ticket_id = $_GET['ticket_id'];
$text = $_POST['text'];
if ($_SESSION['role'] == 'utente') {
    $operator_id = null;
    $user_id = $_SESSION['id'];
} elseif ($_SESSION['role'] == 'operatore') {
    $operator_id = $_SESSION['id'];
    $user_id = null;
}

try {
    /** @var PDO $dbh */
    $sql = $dbh->prepare("INSERT INTO messages (text, ticket_id, operator_id, user_id ) VALUES (:text, :ticket_id,:operator_id, :user_id)");
    $sql->bindParam(':text', $_POST['text']);
    $sql->bindParam(':ticket_id', $_GET['ticket_id']);
    $sql->bindParam(':operator_id', $operator_id);
    $sql->bindParam(':user_id', $user_id);
    $sql->execute();
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

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'Nuovo messaggio inviato a operatore!';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'hai inviato un messaggio a operatore!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }

try {
        if ($_SESSION['role'] == 'operatore') {
            $sql = $dbh->prepare("SELECT * FROM tickets WHERE id=:id");
            $sql->bindParam(':id', $_GET['ticket_id']);
            $sql->execute();

            $result = $sql->fetch();
            if (empty($result['operator_id'])) {
                $sql = $dbh->prepare("UPDATE tickets SET operator_id=:operator_id WHERE id=:id");
                $sql->bindParam(':operator_id', $_SESSION['id']);
                $sql->bindParam(':id', $_GET['ticket_id']);
                $sql->execute();

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

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = 'Nuovo messaggio inviato a utente!<b>in bold!</b>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                }
            }
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    }
}

/** @var PDO $dbh */
$sql = "SELECT messages.id, messages.date, messages.text, messages.ticket_id, messages.operator_id, messages.user_id FROM messages  WHERE ticket_id=" . $_GET['ticket_id'];

$result = $dbh->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/messaggio.css">
    <title>Messaggio</title>

</head>
<body>
<div class="container">
    <h1>Chat Utente Operatore</h1>
    <br><br>
    <?php
    foreach ($result as $row) {
        echo "
        <div class='chat'>
            <div class='details'>
                <h3 style='display: none;'>Numero Identificativo: {$row["id"]}</h3>
                <h3 style='display:none;'>data del messaggio</h3>
                <p style='display:none;'>{$row["date"]}</p>
                <h3>identificativo del ticket: {$row["ticket_id"]}</h3>
                <h3>identificativo operatore: {$row["operator_id"]}</h3>
                <h3>identificativo dell'utente: {$row["user_id"]}</h3>
            </div>
            <h4 style='display:none;'>Mesaggio</h4>
            <p>{$row["text"]}</p>
        </div>
        <br>
        <br>
        ";
    }
    ?>
    <div style="display: flex; flex-direction: column; justify-content: center;">
        <h2 style="text-align: center;">Rispondi </h2>
        <br>
        <br>
        <div class="answer">


        </div>
        <div class="button">
            <form method="post">
                <textarea name="text" placeholder="rispondi qui..." ></textarea>
                <br>
                <br>
                <input type="submit" value="Invia">
            </form>
        </div>
    </div>
</div>
</body>
