<?php

// RETRIEVE DATA FROM CONTACT FORM

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
        $clientSubject = 'Objet : Problème technique';
        break;
    case 'customerCare' :
        $clientSubject = 'Objet : Service après vente';
        break;
    case 'other' :
        $clientSubject = 'Objet : Autre';
        break;
}

// SEND EMAIL

// Variables
$recipient = 'elisepourtois.pro@gmail.com';
$mailHeaders = 'From : ' . $clientEmail;

mail($recipient, $clientSubject, $clientMessage, $mailHeaders) or die('Erreur');
echo 'Votre message a bien été envoyé !';