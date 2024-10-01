<?php
/** @var mysqli $conn */
session_start();
require_once "connection.php";

$dataList = ['voornaam', 'achternaam', 'email', 'telefoonnummer', 'wachtwoord', 'postcode', 'huisnummer',
    'tussenvoegsels', 'straat', 'stad', 'land', 'bloedgroep', 'lengte', 'gewicht', 'bmi'];

$BMI_value = ''; // initialize $BMI_value to an empty string
if (isset($_POST['bmi'])) {
    $BMI_value = $_POST['bmi'];
    // Update the database or perform other actions here
}

if (isset($_POST['submit'])) {
    $errors = array();

    // Get form data
    foreach ($dataList as $singularData) {
        $$singularData = mysqli_escape_string($conn, $_POST[$singularData]);
    }

    // Server-side validation
    $fields = [
        'email' => 'Vul een e-mailadres in.',
        'voornaam' => 'Vul een voornaam in.',
        'achternaam' => 'Vul een achternaam in.',
        'wachtwoord' => 'Vul een wachtwoord in.',
        'land' => 'Vul een land in.',
        'stad' => 'Vul een stad in.',
        'straat' => 'Vul een straat in',
        'huisnummer' => 'Vul een huisnummer in',
        'postcode' => 'Vul een postcode in.',
        'telefoonnummer' => 'Vul een telefoonnummer in',
        'lengte' => 'Vul een lengte in',
        'gewicht' => 'Vul een gewicht in',
        'bloedgroep' => 'Vul een bloedgroep in',

    ];

    $errors = [];

    foreach ($fields as $key => $message) {
        if (empty($$key)) {
            $errors[$key] = $message;
        }
    }
    // If data valid
    // Check if the email is already in use
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    // Check if weight and height are filled in
    if (!empty($_POST['gewicht']) && !empty($_POST['lengte'])) {
        $weight = $_POST['gewicht'];
        $height = $_POST['lengte'];
        $BMI = round($weight / pow($height / 100, 2), 2);
        $BMI_value = $BMI; // assign the calculated BMI to $BMI_value
    }


    if (mysqli_num_rows($checkResult) > 0) {
        // email is already in use
        $errors['email'] = "Dit e-mailadres is al geregistreerd.";
    } else
        if (empty($errors)) {
            // create a secure password, with the PHP function password_hash()
            $hashedPassword = password_hash($wachtwoord, PASSWORD_DEFAULT);
            // store the new user in the database.

            $insertQuery = "INSERT INTO `users` (`id`, `email`, `phone_number`, `password`, `first_name`, `last_name`, `country`, `city`, `street`, `prefixes`, `zip_code`, `house_number`, `height`, `weight`, `BMI`, `blood_type`)
                            VALUES (NULL, '$email', '$telefoonnummer', '$hashedPassword', '$voornaam', '$achternaam', '$land', '$stad', '$straat', '$tussenvoegsels', '$postcode', '$huisnummer', '$lengte', '$gewicht', '$BMI', '$bloedgroep')";

            // Generate a random number for the dept column
            $randomDept = rand(1000, 1000000); // adjust the range as needed

            $secondInsertQuery = "INSERT INTO `insurance_users` (`email`, `first_name`, `last_name`, `dept`)
                                    VALUES ('$email', '$voornaam', '$achternaam', '$randomDept')";

            if (mysqli_query($conn, $insertQuery) && mysqli_query($conn, $secondInsertQuery)) {
                // Redirect to login page
                header('location: index.php');
                // Exit the code
                exit;
            } else {
                echo "Error: " . mysqli_error($conn); // Display SQL error for debugging
            }

        }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="bmi_calculator.js"></script>
    <title>registreren</title>
</head>
<body>

<header>
    <?php require_once 'nav-bar.php'?>
    <div class="register-header">
        <h1>Meld u nu aan</h1>
    </div>
</header>

<form class="register-form" action="" method="post">

    <h2>Persoonlijke Gegevens</h2>

    <div class="gender-buttons-container">
        <label for="genderMen">man</label>
        <input class="gender-buttons" id="genderMen" type="radio" name="gender" value="man">

        <label for="genderWoman">vrouw</label>
        <input class="gender-buttons" id="genderWoman" type="radio" name="gender" value="woman">
    </div>

    <div class="flex-container">
        <?php foreach ($dataList as $data) { ?>
            <div class="<?php echo in_array($data, ['telefoonnummer', 'email', 'wachtwoord', 'bloedgroep', 'straat']) ? 'flex-item full-width' : (in_array($data, ['gewicht', 'lengte', 'huisnummer', 'tussenvoegsels']) ? 'flex-item quarter-width' : 'flex-item half-width'); ?>">
                <?php if (in_array($data, ['telefoonnummer', 'lengte', 'gewicht', 'huisnummer'])) { ?>

                    <input class="input" id="<?= $data ?>" type="number" name="<?= $data ?>" value="<?= $$data ?? '' ?>" placeholder="<?= $data ?>"/>

                <?php } else if ($data == 'BMI') { ?>

                    <input class="input" id="bmi" type="text" name="bmi" value="<?= $BMI_value ?>" placeholder="BMI" readonly>

                <?php } else if ($data == 'wachtwoord') { ?>

                    <input class="input" id="<?= $data ?>" type="password" name="<?= $data ?>" placeholder="<?= $data ?>">

                <?php } else { ?>

                    <input class="input" id="<?= $data ?>" type="text" name="<?= $data ?>" value="<?= $$data ?? '' ?>" placeholder="<?= $data ?>"/>

                <?php } ?>

                <p class="help">
                    <?= $errors[$data] ?? '' ?>
                </p>
            </div>
        <?php } ?>
    </div>
    <div class="button-container">
        <button class="register-button" type="submit" name="submit">Registreer</button>
    </div>
</form>
</body>
</html>