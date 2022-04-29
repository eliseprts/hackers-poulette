<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contacter Hackers Poulette. Une question, une remarque ? Envoyez-la nous et nous vous répondrons dès que possible">
    <title>Hackers Poulette • Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>

    <div id="contactFormContainer" class="container bg-white shadow-lg w-100 d-flex justify-content-center align-items-center">
        <div class="row gx-5">
            <!-- Block 1 -->
            <div class="col-md-12 col-lg-6">
                <h1>Contactez-nous !</h1>
                <p class="fw-lighter fs-5">Une question, une remarque ? Envoyez-la nous et nous vous répondrons dès que possible.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <img class="img-fluid w-50" src="./assets/img/hackers-poulette-logo.png" alt="Logo de Hackers Poulette">
                </div>
            </div>
            <!-- Block 2 / Form -->
            <div class="col-md-12 col-lg-6">
                <form class="row g-3" action="mail.php" method="post">
                    <!-- Lastname -->
                    <div class="col-md-12 col-lg-6">
                        <input class="form-control fw-light" type="text" name="lastname" placeholder="Nom" aria-required="true" aria-label="Nom" autocomplete="family name">
                        <span class="text-danger">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    if(!empty($_POST['lastname'])){
                                        echo 'Merci d\'entrer votre nom';
                                        header('Location: index.php');
                                    }
                                }
                            ?>
                        </span>
                    </div>
                    <!-- Name -->
                    <div class="col-md-12 col-lg-6">
                        <input class="form-control fw-light" type="text" name="name" placeholder="Prénom"  aria-required="true" aria-label="Prénom" autocomplete="given name">
                        <span class="text-danger">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    if(empty($_POST['name'])){
                                        echo 'Merci d\'entrer votre prénom';
                                        header('Location: index.php');
                                    }
                                }
                            ?>
                        </span>
                    </div>
                    <!-- Email -->
                    <div class="col-12">
                        <input class="form-control fw-light" type="email" name="email" placeholder="Email" aria-required="true" aria-label="Email" autocomplete="email">
                        <span class="text-danger">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    if(empty($_POST['email'])){
                                        echo 'Merci d\'entrer votre adresse email';
                                        header('Location: index.php');
                                    }
                                }
                            ?>
                        </span>
                    </div>
                    <!-- Country -->
                    <div class="col-12">
                        <input class="form-control fw-light" type="text" name="country" placeholder="Pays" aria-required="true" aria-label="Pays" autocomplete="country-name">
                        <span class="text-danger">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    if(empty($_POST['country'])){
                                        echo 'Merci d\'entrer votre pays';
                                        header('Location: index.php');
                                    }
                                }
                            ?>
                        </span>
                    </div>
                    <!-- Gender -->
                    <div class="col-12" role="radiogroup" aria-label="Genre" aria-required="true">
                            <div>
                                <h3 class="form-label fw-light fs-6">Genre</h3>
                            </div>
                            <div class="form-check form-check-inline form-check">
                                <input class="form-check-input" type="radio" name="gender" id="genderRadioF" value="F" aria-labelledby="genderRadioF" aria-checked="false">
                                <label class="form-check-label fw-light fs-6" for="genderRadioF">F</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderRadioM" value="M" aria-labelledby="genderRadioM" aria-checked="false">
                                <label class="form-check-label fw-light fs-6" for="genderRadioM">M</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderRadioX" value="X" aria-labelledby="genderRadioX" aria-checked="false">
                                <label class="form-check-label fw-light fs-6"for="genderRadioX">Je ne veux pas répondre</label>
                            </div>
                            <span class="text-danger">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    if(empty($_POST['gender'])){
                                        echo 'Merci de cocher une réponse';
                                        header('Location: index.php');
                                    }
                                }
                            ?>
                            </span>
                    </div>
                    <!-- Subject -->
                    <div class="input-group">
                        <label class="input-group-text fw-light fs-6 bg-white" for="inputSubject">Objet</label>
                        <select class="form-select" name="subject" aria-required="true">
                            <option value="null" selected>Sélectionner un objet</option>
                            <option value="technicalIssue">Problème technique</option>
                            <option value="customerCare">Service après vente</option>
                            <option value="other">Autre</option>
                        </select>
                        <span class="text-danger">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    if(($_POST['subject']) == 'null'){
                                        echo 'Merci de sélectionner un objet';
                                        header('Location: index.php');
                                    }
                                }
                            ?>
                        </span>
                    </div>
                    <!-- Message -->
                    <div class="col-12">
                        <textarea class="form-control fw-light" name="message" placeholder="Message" aria-required="true" aria-label="Message"></textarea>
                        <span class="text-danger">
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    if(empty($_POST['message'])){
                                        echo 'Merci d\'entrer un message';
                                        header('Location: index.php');
                                    }
                                }
                            ?>
                        </span>
                    </div>
                    <!-- Submit btn -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn text-white text-uppercase" aria-label="Bouton d'envoi">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>