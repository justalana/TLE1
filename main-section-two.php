<?php
/** @var mysqli $conn */

require_once "connection.php";

$query = "SELECT * FROM `reviews` WHERE id = 1";
$result1 = mysqli_query($conn, $query) or die('error: ' . mysqli_error($conn));
$review1 = mysqli_fetch_assoc($result1);

$query = "SELECT * FROM `reviews` WHERE id = 2";
$result2 = mysqli_query($conn, $query) or die('error: ' . mysqli_error($conn));
$review2 = mysqli_fetch_assoc($result2);

$query = "SELECT * FROM `reviews` WHERE id = 3";
$result3 = mysqli_query($conn, $query) or die('error: ' . mysqli_error($conn));
$review3 = mysqli_fetch_assoc($result3);

?>
<h1>ONDERZOEK DEELNEMERS</h1>
<div id="deelnemers-cards">
    <div class="deelnemer-card">
        <img src="img/student1.png" alt="">
        <h2><?= htmlentities($review1['first_name'])?> <?=htmlentities($review1['last_name'] ) ?></h2>
        <img src="img/stars-5-1.png" alt="" class="review_stars">
        <p><?= htmlentities($review1['review'])?></p>
    </div>

    <div class="deelnemer-card">
        <img src="img/student2.png" alt="">
        <h2><?= htmlentities($review2['first_name'])?> <?=htmlentities($review2['last_name'] ) ?></h2>
        <img src="img/stars-5-1.png" alt="" class="review_stars">
        <p><?= htmlentities($review2['review'])?></p>
    </div>

    <div class="deelnemer-card">
        <img src="img/student3.png" alt="">
        <h2><?= htmlentities($review3['first_name'])?> <?=htmlentities($review3['last_name'] ) ?></h2>
        <img src="img/stars-5-1.png" alt="" class="review_stars">
        <p><?= htmlentities($review3['review'])?></p>
    </div>
</div>
<div class="bar"></div>