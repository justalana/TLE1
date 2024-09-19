<?php
require_once 'connection.php';
$query = "SELECT * FROM experiments";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

$onderzoeken = [];
while ($row = mysqli_fetch_assoc($result)) {
    $onderzoeken[] = $row;
}

?>


<h1>MEEST GEKOZEN ONDERZOEKEN</h1>
<div id="gekozen-onderzoeken">

    <?php for ($i = 0; $i < 4; $i++) { ?>
        <div class="gekozen-onderzoek-card">
            <h2><?= $onderzoeken[$i]['experiment']?></h2>
            <h2>€<?=  $onderzoeken[$i]['money']?></h2>
            <div class="gekozen-onderzoek-card-middle">
                <p>datum <?php echo ($i * 4) - 1 ?>/09 </p>
                <p><?= $onderzoeken[$i]['explenation']?></p>
            </div>
            <a href="">Aanmelden</a>
        </div>
    <?php } ?>

</div>
<a class="alle-onderzoeken" href="alle-onderzoeken.php">Bekijk Alle onderzoeken</a>
