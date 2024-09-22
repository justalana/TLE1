<?php
require "connection.php";
session_start();

//zet dit later naar de ID van de ingelogte gebruiker wanneer sessions werkend zijn.
//$name = $_SESSION['name'];
//
//$userDataQuery = "SELECT * FROM `users` WHERE id = $sessionUserID";
//$userDataResult = mysqli_query($conn, $userDataQuery);


$loadAppointmentsQuery = "SELECT `date` FROM `appointments`";
$loadAppointmentsResult = mysqli_query($conn, $loadAppointmentsQuery);

while ($row = mysqli_fetch_assoc($loadAppointmentsResult)) {
    $appointments[] = $row; // Voeg elke afspraak toe
}

if (!empty($appointments)) {
    $response = json_encode([
        'posts' => $appointments,
    ], JSON_PRETTY_PRINT);

    $filePath = 'js/filleddates.json';
    file_put_contents($filePath, $response);
} else {
    $response = json_encode([
        'posts' => null,
    ], JSON_PRETTY_PRINT);
    $filePath = 'js/filleddates.json';
    file_put_contents($filePath, $response);
}


if (!empty($_POST['selectedDate'])) {
    $date = mysqli_escape_string($conn, $_POST['selectedDate']);
}

if (isset($_POST['submit'])) {
    if (isset($date)) {
        $checkQuery = "SELECT * FROM `appointments` WHERE `date` = '$date'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "Er is al een afspraak voor deze datum.";
        } else {
            $postQuery = "INSERT INTO `appointments`(`user_ID`, `date`) VALUES ('3','$date')";
            $postResult = mysqli_query($conn, $postQuery);
            if ($postResult) {
                echo "Afspraak succesvol ingepland."; // Success message
            } else {
                echo "Er is een fout opgetreden bij het inplannen van de afspraak."; // Error message
            }
        } header("refresh:0");
    }
    header("refresh:0");
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
        <div class="left">
                <label for="firstName">Voornaam</label>
                <input type="text" id="firstName" name="firstName" value="">

                <input type="hidden" id="selectedDate" name="selectedDate" value="">
                <input type="submit" id="submit" name="submit">
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
