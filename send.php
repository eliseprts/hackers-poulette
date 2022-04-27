<?php

// RETRIEVE SEND DATA

$lastname = $_POST['lastname'];
$name = $_POST['name'];
$email = $_POST['email'];
$country = $_POST['country'];
$message = $_POST['message'];

switch($_POST['gender']) {
    case 'F':
        $gender = 'Féminin';
        break;
    case 'M':
        $gender = 'Masculin';
        break;
    case 'X':
        $gender = 'Non précisé';
        break;
}

switch ($_POST['subject']) {
    case 'technicalIssue':
        $subject = 'Problème technique';
        break;
    case 'customerCare' :
        $subject = 'Service après vente';
        break;
    case 'other' :
        $subject = 'Autre';
        break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Nom</th>
            <td><?php echo $lastname;?></td>
        </tr>
        <tr>
            <th>Prénom</th>
            <td><?php echo $name;?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email;?></td>
        </tr>
        <tr>
            <th>Pays</th>
            <td><?php echo $country;?></td>
        </tr>
        <tr>
            <th>Genre</th>
            <td><?php echo $gender;?></td>
        </tr>
        <tr>
            <th>Objet</th>
            <td><?php echo $subject;?></td>
        </tr>
        <tr>
            <th>Message</th>
            <td><?php echo $message;?></td>
        </tr>
    </table>
</body>
</html>