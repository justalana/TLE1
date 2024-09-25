<?php
require_once 'connection.php';
/** @var mysqli $conn */


$query = "SELECT * FROM experiments";
$result = mysqli_query($conn, $query);


$onderzoeken = [];
while ($row = mysqli_fetch_assoc($result)) {
    $onderzoeken[] = $row;
}



// this allows the whole table will be converted to a JSON string
$encoded_data = json_encode($onderzoeken,JSON_FORCE_OBJECT);
// put the JSON stringefied data into a JSON FILE
$location ='js/alldata.json';
file_put_contents($location, $encoded_data);




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
                    <p><?= $onderzoek['explanation'] ?></p>
                </div>
                <a href="onderzoek.php?id=<?=$onderzoek['id']?>">Aanmelden</a>
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


