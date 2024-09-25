<?php
$errors = [];

//Datum check(s)
if (empty($_POST['selectedDate'])) {
    $errors['selectedDate'] = "Er is geen datum geselecteerd";
}

//Voornaam check(s)
if (empty($_POST['firstName'])) {
    $errors['firstName'] = "Vul een naam in.";
} else if (preg_match('/\d/', $_POST['firstName'])) {
    $errors['firstName'] = "Naam mag geen nummers bevatten.";
}

//Achternaam check(s)
if (empty($_POST['lastName'])) {
    $errors['lastName'] = "Vul een achternaam in.";
} else if (preg_match('/\d/', $_POST['lastName'])) {
    $errors['lastName'] = "Achternaam mag geen nummers bevatten.";
}

//Email check(s)
if (empty($_POST['email'])) {
    $errors['email'] = "Ongeldig E-mail adres ingevuld.";
}

//Telefoonnummer check(s)
if (empty($_POST['phoneNumber'])) {
    $errors['phoneNumber'] = "Ongeldig telefoonnummer ingevuld.";
}

//Geslacht check(s)
if (empty($_POST['gender'])) {
    $errors['gender'] = "Ongeldig geslacht ingevuld.";
} else if (preg_match('/\d/', $_POST['gender'])) {
    $errors['gender'] = "Geslacht mag geen nummers bevatten.";
}