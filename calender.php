<?php
require "connection.php";
session_start();
/** @var mysqli $conn */

$loggedUser = $_SESSION['user'] ?? "";

if ($loggedUser != "") {
    $loadedUserID = $loggedUser['id'];
    $name = $loggedUser['first_name'];
    $lastName = $loggedUser['last_name'];
    $email = $loggedUser['email'];
    $phone = $loggedUser['phone_number'];
//    $loadedGender = $loggedUser['gender'];
}


$loadAppointmentsQuery = "SELECT `date` FROM `appointments`";
$loadAppointmentsResult = mysqli_query($conn, $loadAppointmentsQuery);

while ($row = mysqli_fetch_assoc($loadAppointmentsResult)) {
    $appointments[] = $row; // Voeg elke afspraak toe
}

if (!empty($appointments)) {
    $response = json_encode([
        'posts' => $appointments
    ], JSON_PRETTY_PRINT);

    $filePath = 'js/filleddates.json';
    file_put_contents($filePath, $response);
} else {
    $response = json_encode([
        'posts' => null
    ], JSON_PRETTY_PRINT);
    $filePath = 'js/filleddates.json';
    file_put_contents($filePath, $response);
}

if (!empty($_POST['submit'])) {
    unset($_POST['submit']);
    $date = mysqli_escape_string($conn, $_POST['selectedDate']);
    $name = mysqli_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_escape_string($conn, $_POST['lastName']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $phone = mysqli_escape_string($conn, $_POST['phoneNumber']);
    $gender = mysqli_escape_string($conn, $_POST['gender']);
    $sideNotes = "TBD";


    require_once "afspraak-errors.php";

    if (empty($errors)) {
        $checkQuery = "SELECT * FROM `appointments` WHERE `date` = '$date'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) <= 0) {
            $postQuery = "INSERT INTO `appointments`(`user_ID`, `date`, `name`, `last_name`, `e-mail`, `phone`, `gender`, `side_notes`) VALUES ('1','$date','$name','$lastName','$email','$phone','$gender','$sideNotes')";
            $postResult = mysqli_query($conn, $postQuery);
            if ($postResult) {
                //succes
            }
        }
        header('Location: index.php');
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="css/afspraak.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
   </head>

<body>

<header>
    <?php
    require_once 'nav-bar.php';
    ?>
</header>

<main>
    <form method="post">
        <div class="left-majo">
            <div class="left">
                <div class="horizontal">
                    <div class="inputs">
                        <label for="firstName">Voornaam</label>
                        <input type="text" id="firstName" name="firstName" value="<?= $name ?? '' ?>" placeholder="Naam">
                    </div>

                    <div class="inputs">
                        <label for="lastName">Achternaam</label>
                        <input type="text" id="lastName" name="lastName" value="<?= $lastName ?? '' ?>" placeholder="Achternaam">
                    </div>
                </div>

                <div class="stretch inputs" >
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="<?= $email ?? '' ?>" placeholder="E-mail">
                </div>

                <div class="horizontal">
                    <div class="inputs">
                        <label for="phoneNumber">Telefoonnummer</label>
                        <input type="number" id="phoneNumber" name="phoneNumber" value="<?= $phone ?? '' ?>" placeholder="Telefoonnummer">
                    </div>

                    <div class="inputs">
                        <label for="gender">Geslacht</label>
                        <input type="text" id="gender" name="gender" value="<?= $gender ?? '' ?>" placeholder="Geslacht">
                    </div>
                </div>
                <input type="hidden" id="selectedDate" name="selectedDate" value="">
            </div>
            <?php if (!empty($errors)): ?>
                <ul class="errors">
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <div class="right">
            <div class="calendar-container">
                <div class="calendar-header">
                    <p id="left">◀</p>
                    <div id="date">
                        <h1 id="month"></h1>
                        <h1 id="year"></h1>
                    </div>
                    <p id="right">▶</p>
                </div>
                <table class="calendar-body">
                    <thead class="calendar-weekdays">
                        <tr class="r1">
                            <th>Ma</th>
                            <th>Di</th>
                            <th>Wo</th>
                            <th>Do</th>
                            <th>Vr</th>
                            <th>Za</th>
                            <th>Zo</th>
                        </tr>
                    </thead>
                    <tbody class="calendar-dates">
                    </tbody>
                </table>
            </div>
            <input type="submit" id="submit" name="submit" value="Bevestig afspraak">
        </div>

    </form>
    <script defer src="js/calender.js"></script>

</main>

<footer>
    <?php
    require_once 'footer.php';
    ?>
</footer>

</body>
</html>
