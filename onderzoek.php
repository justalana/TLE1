<?php
/** @var mysqli $conn */

// Haal de id op uit de url met een GET verzoek
$id = $_GET['id'];

require_once 'connection.php';
// Haal de informatie op uit de database met een query

$query = "SELECT * FROM experiments WHERE id = '$id'";
$result = mysqli_query($conn, $query);

$onderzoek = [];
while ($row = mysqli_fetch_assoc($result)) {
    $onderzoek[] = $row;
}

$queryAllInfo = "SELECT * FROM experiments ";
$resultAllInfo = mysqli_query($conn, $queryAllInfo);

$onderzoeken = [];
while ($row = mysqli_fetch_assoc($resultAllInfo)) {
    $onderzoeken[] = $row;
}
// pick 3 random experiments
shuffle($onderzoeken)
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
    <script src="js/onderzoek.js" defer></script>
    <title>Vitalis System Homepage</title>
</head>
<body>
<header>
    <?php
    require_once 'nav-bar.php';
    ?>
    <div id="header-geselecteerderde-onderzoek">
        <div>
            <?php foreach ($onderzoek

            as $index) { ?>
            <h1><?= $index['experiment'] ?></h1>
            <h2><?= $index['gender'] ?></h2>
            <h3>18 - 65 jaar</h3>
        </div>
        <div>
            <h3><?= $index['research_days'] ?></h3>
            <?php if ($index['comeback_days'] == 0) { ?>
                <h3>Geen terug kom dagen</h3>
            <?php } else { ?>
                <h3><?= $index['comeback_days'] ?></h3>
            <?php } ?>
            <a href="">Meld aan</a>
        </div>
        <?php } ?>
    </div>
</header>

<main>

    <section id="alle-onderzoeken">
        <?php for ($i = 0; $i < count($onderzoeken) - 7 ; $i++) { ?>

                <div class="gekozen-onderzoek-card">
                    <h2><?= $onderzoeken[$i]['experiment'] ?></h2>
                    <h2>€<?= $onderzoeken[$i]['money'] ?></h2>
                    <div class="gekozen-onderzoek-card-middle">
                        <p>datum 14/09 </p>
                        <p><?= $onderzoeken[$i]['explenation'] ?></p>
                    </div>
                    <a href="onderzoek.php?id=<?=$onderzoeken[$i]['id']?>">Aanmelden</a>
                </div>
        <?php } ?>
    </section>
</main>

<footer>
    <?php
    require_once 'footer.php';
    ?>
</footer>
</body>
</html>