<?php
$onzeSpecialisten = ['Dr.Jan', 'Dr.de Vries', 'Dr.Martina'];
$drJan = ['Cardioloog', 'Longarts', 'Neuroloog'];
$drVries = ['Nefroloog', 'Patholoog', ' Dermatoloog'];
$drMartina = ['Psycholoog', 'Longarts', 'Patholoog'];


$specialisten = [
    'Dr.Jan' => $drJan,
    'Dr.de Vries' => $drVries,
    'Dr.Martina' => $drMartina
];


?>
<div class="bar"></div>
<h1>ONZE SPECIALISTEN</h1>
<div id="onze-specialisten-cards">
    <?php foreach ($onzeSpecialisten as $specialist) { ?>
        <div class="specialisten-card">
        <img src="img/<?=$specialist?>.png" alt="">

        <h2><?= $specialist ?></h2>
        <?php if(isset($specialisten[$specialist])) { ?>
            <ul>
                <?php foreach ($specialisten[$specialist] as $specialty) { ?>
                <li><?php echo $specialty?> </li>
                <?php } ?>
            </ul>
        <?php } ?>
            </div>
    <?php } ?>
</div>
<div class="bar"></div>
