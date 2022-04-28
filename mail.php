<?php

// VARIABLE

$smtp = 'smtp.gmail.com';
$recipient = getenv('EMAIL');
$username = getenv('USERNAME');
$password = getenv('PASSWORD');

// RETRIEVE SEND DATA

$clientLastname = $_POST['lastname'];
$clientName = $_POST['name'];
$clientFullname = $clientName . $clientLastname;
$clientEmail = $_POST['email'];
$clientCountry = $_POST['country'];
$clientMessage = $_POST['message'];

switch($_POST['gender']) {
    case 'F':
        $clientGender = 'Féminin';
        break;
    case 'M':
        $clientGender = 'Masculin';
        break;
    case 'X':
        $clientGender = 'Non précisé';
        break;
}

switch ($_POST['subject']) {
    case 'technicalIssue':
        $clientSubject = 'Problème technique';
        break;
    case 'customerCare' :
        $clientSubject = 'Service après vente';
        break;
    case 'other' :
        $clientSubject = 'Autre';
        break;
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = $smtp;
    $mail->SMTPAuth   = true;
    $mail->Username   = $recipient;
    $mail->Password   = $password;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom($clientEmail, $clientFullname);
    $mail->addAddress($recipient, 'Elise Pourtois');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $clientSubject;
    $mail->Body    = $clientMessage;
    $mail->AltBody = $clientMessage;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
