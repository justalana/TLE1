<?php 
/** @var mysqli $db */

require_once 'connection.php';

$query = 'SELECT * FROM experiments';

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

$experiments = [];

while($row = mysqli_fetch_assoc($result)) {
    $experiments[] = $row;
}

mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/onderzoeken.css">
    <title>Vitalis Systems</title>
</head>

<body>
    <header>
        <div id="header-flex">
            <div id="tophalf">
                <div id="arrow-left">
                    <img src="images/arrow-left.jpg" alt="" loading="lazy">
                </div>
                <div id="header-content">
                    <H1>Titel product</H1>
                    <H2>Header 1</H2>
                    <p>Product informatie</p>
                </div>
                <div>
                    <img src="images/arrow-right.jpg" alt="" loading="lazy">
                </div>
            </div>
            <div id="header-center">
                <div id="button">
                    <button>Meer informatie</button>
                </div>
                <div id="circles">
                    <div>
                        <img src="images/circle-white.png" alt="">
                    </div>
                    <div>
                        <img src="images/circle-black.png" alt="">
                    </div>
                    <div>
                        <img src="images/circle-white.png" alt="">
                    </div>
                    <div>
                        <img src="images/circle-white.png" alt="">
                    </div>
                    <div>
                        <img src="images/circle-white.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <?php foreach ($experiments as $index=> $experiment) ?>
        <div>
            <?= $index + 1 ?>
        </div>
        <div>
            <?= $experiment['experiment'] ?>
            <?= $experiment['explenation'] ?>
            <?= $experiment['money'] ?>
        </div>
        <div>
            <?=  ?>
        </div>
    </main>
</body>

</html>