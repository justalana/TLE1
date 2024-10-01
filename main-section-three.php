<?php
require_once 'connection.php';
$query = "SELECT * FROM experiments";
$result = mysqli_query($conn, $query);

$onderzoeken = [];
while ($row = mysqli_fetch_assoc($result)) {
    $onderzoeken[] = $row;
}

shuffle($onderzoeken)
?>


<h1>MEEST GEKOZEN ONDERZOEKEN</h1>
<div id="gekozen-onderzoeken">

    <?php for ($i = 0; $i < count($onderzoeken) - 4; $i++) { ?>
        <div class="gekozen-onderzoek-card">
            <h2><?= $onderzoeken[$i]['experiment'] ?></h2>
            <h2>€<?= $onderzoeken[$i]['money'] ?></h2>
            <div class="gender-age">
                <h3><?= $onderzoeken[$i]['gender'] ?></h3>
                <h3>18 - 55 jaar</h3>
            </div>
            <div class="gekozen-onderzoek-card-middle">
                <p><?= $onderzoeken[$i]['explanation'] ?></p>
            </div>
            <a href="onderzoek.php?id=<?= $onderzoeken[$i]['id'] ?>">Aanmelden</a>
        </div>
    <?php } ?>

</div>
<div class="alle-onderzoeken-button-container">
    <a class="alle-onderzoeken" href="alle-onderzoeken.php">Bekijk alle onderzoeken</a>
</div>