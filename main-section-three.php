<?php
?>



<h1>MEEST GEKOZEN ONDERZOEKEN</h1>
<div id="gekozen-onderzoeken">

    <?php for ($i = 1; $i < 8; $i++) { ?>
    <div class="gekozen-onderzoek-card">
        <h2>€<?php echo $i * 717 ?></h2>
        <div class="gekozen-onderzoek-card-middle">
            <p>datum <?php echo ($i * 4) - 1 ?>/09 </p>
            <p>info,info,info</p>
            <!-- bedrag,info-->
        </div>
        <a href="">Aanmelden</a>
    </div>
    <?php }?>

</div>
<a class="alle-onderzoeken" href="alle-onderzoeken.php">Bekijk Alle onderzoeken</a>
