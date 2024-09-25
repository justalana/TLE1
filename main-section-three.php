<?php
/** @var mysqli $conn */
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

    <?php for ($i = 0; $i < count($onderzoeken) - 6 ; $i++) { ?>
        <div class="gekozen-onderzoek-card">
            <h2><?= $onderzoeken[$i]['experiment']?></h2>
            <h2>€<?=  $onderzoeken[$i]['money']?></h2>
            <div class="gekozen-onderzoek-card-middle">
                <p>datum <?php echo ($i * 4) - 1 ?>/09 </p>
                <p><?= $onderzoeken[$i]['explenation']?></p>
            </div>
            <a href="onderzoek.php?id=<?= $onderzoeken[$i]['id']?>">Aanmelden</a>
        </div>
    <?php } ?>

</div>
<a class="alle-onderzoeken" href="alle-onderzoeken.php">Bekijk Alle onderzoeken</a>
