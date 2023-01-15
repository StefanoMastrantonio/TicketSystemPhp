<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require_once('config.php');
//includo file di struttura della mail
require_once('body.php');

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}
if (isset($_POST['name']) && (isset($_POST['email'])) && (isset($_POST['password']))) {
//    $name = $_POST['name'];
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//    print_r($_POST);

    /** @var PDO $dbh */
    $stmt = $dbh->prepare("INSERT IGNORE INTO operators (name, password, email) VALUES(:name, :password, :email)");

    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->execute();

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

            //array associativo che ho definito qui e che richiamo dalla funzione presente in body.php. Serve a richiamare i parametri che voglio far vedere nella mail della creazione dell'operatore
            $data =['nome' => $_POST['name'], 'email'=> $_POST['email'], 'password' => $_POST['password']];

            //ho creato una variabile con all'interno la funzione che contiene l'array data
            $body= body($data);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'NoReply - Creazione Operatore';
            $mail->Body    = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
} else {
    header('location: operatore/form_creazione_operatore.php');
}

$sql= "SELECT * FROM operators";
$result = $dbh->query($sql);

?>

<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/create.css">
    <title>Creazione Operatore</title>
</head>

<body>
<div class="container">
    <br>
    <h1>Mail Inviata!</h1>
    <br><br><br><br>
    <a href="pagina_admin.php"><div class="span">Torna alla Pagina Principale</div></a>
</div>
</body>

