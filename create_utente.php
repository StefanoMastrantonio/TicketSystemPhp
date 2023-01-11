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
if ((isset($_POST['email'])) && (isset($_POST['password']))) {
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//    print_r($_POST);

    /** @var PDO $dbh */
    $stmt = $dbh->prepare("INSERT IGNORE INTO users (password, email) VALUES(:password, :email)");
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->execute();

    $mail = new PHPMailer(true);

    try {
        //Server settings
//        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
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
        $data =['email'=> $_POST['email'], 'password' => $_POST['password']];

        //ho creato una variabile con all'interno la funzione che contiene l'array data
        $body= body($data);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'NoReply - Creazione Utente';
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Mail Inviata!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    header('location: form_creazione_utente.php');
}

$sql= "SELECT * FROM users";
$result = $dbh->query($sql);

?>