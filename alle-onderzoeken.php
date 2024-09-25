<?php
require_once 'connection.php';
$query = "SELECT * FROM experiments";
$result = mysqli_query($database, $query) or die(mysqli_error($database));

$onderzoeken = [];
while ($row = mysqli_fetch_assoc($result)) {
    $onderzoeken[] = $row;
}

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
    <script src="js/alle-onderzoeken.js" defer></script>
    <title>Vitalis System Homepage</title>
</head>
<body>

<header>
    <?php
    require_once 'nav-bar.php';
    ?>

</header>
<main>
    <section id="alle-onderzoeken">
        <?php foreach ($onderzoeken as $onderzoek) { ?>
            <div class="gekozen-onderzoek-card">
                <h2><?= $onderzoek['experiment'] ?></h2>
                <h2>€<?= $onderzoek['money'] ?></h2>
                <div class="gekozen-onderzoek-card-middle">
                    <p>datum 14/09 </p>
                    <p><?= $onderzoek['explenation'] ?></p>
                </div>
                <a href="onderzoek.php?id=<?=$onderzoek['id']?>">Aanmelden</a>
            </div>
        <?php } ?>
    </section>
</main>
<!--
Moet nog naar gekeken worden waarom de php eerder laad dan de rest
-->


<footer>
    <?php
    require_once 'footer.php';
    ?>
</footer>
</body>
</html>


