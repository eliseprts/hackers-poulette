<?php

include ('functions.php');

// RETRIEVE SEND DATA

$clientLastname = test_input($_POST['lastname']);
$clientName = test_input($_POST['name']);
$clientFullname = $clientName . $clientLastname;
$clientEmail = test_input($_POST['email']);
$clientCountry = test_input($_POST['country']);
$clientMessage = test_input($_POST['message']);

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

// EMAIL CONTENT

$emailContent = 
    $clientMessage .
    '<h4>Données du client</h4>
    <table>
        <tr>
            <th>Nom<th>
            <td>' . $clientFullname . '</td>
        </tr>
        <tr>
            <th>Email<th>
            <td>' . $clientEmail . '</td>
        </tr>
        <tr>
            <th>Pays<th>
            <td>' . $clientCountry . '</td>
        </tr>
        <tr>
            <th>Genre<th>
            <td>' . $clientGender . '</td>
        </tr>
    </table>';

// SEND EMAIL WITH PHPMAILER

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings (using mailtrap)
    $mail->isSMTP();
    $mail->Host       = 'smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'fdc154f707f69b';
    $mail->Password   = 'ae85a177918dca';
    $mail->Port       = 2525;
    $mail->CharSet = 'UTF-8';

    //Recipients
    $mail->setFrom($clientEmail, $clientFullname);
    $mail->addAddress('test@gmail.com'); // Fake email address
    $mail->addReplyTo($clientEmail, $clientName, $clientLastname);

    //Content
    $mail->isHTML(true);
    $mail->Subject = $clientSubject;
    $mail->Body    = $emailContent;

    $mail->send();
    echo 'Message has been sent';
    // header('Location: index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}