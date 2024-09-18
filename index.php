<?php
require_once "connection.php"; // Include connection.php first
require_once "main.php";  // Include main.php where ClassLoadTest is defined

// Instantiate the ClassLoadTest class and pass the connection
/** @var TYPE_NAME $conn */
$classLoadTest = new ClassLoadTest($conn);

// Call the getUsers method to fetch all users
$users = $classLoadTest->getUsers();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/index.js" defer></script>
    <title>Vitalis System Homepage</title>
</head>
<body>

<header>
    <?php
    require_once 'nav-bar.php';
    ?>
</header>
<main>
<section id="onze-specialisten">
    <?php
    require_once 'main-section-one.php';
    ?>
</section>
    <section id="onderzoek-deelnemers">
        <?php
        require_once 'main-section-two.php';
        ?>
    </section>
    <section id="meest-gekozen-onderzoeken">
        <?php
        require_once 'main-section-three.php';
        ?>
    </section>
</main>


</body>
</html>
