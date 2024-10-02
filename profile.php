<?php
/** @var mysqli $conn */
// required when working with sessions
if (!session_id()) {
    session_start();
}

require_once "connection.php";
//May I visit this page? Check the SESSION
//check if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: register.php');
    exit;
}
$user_info = $_SESSION['user'];

$query = "SELECT * FROM insurance_users WHERE email = '{$user_info['email']}'";
$result = mysqli_query($conn, $query);

$getCompletedExp = "SELECT *
                    FROM Experiments
                    JOIN Completed_Experiments
                    ON experiments.id = completed_experiments.experiment_ID
                    WHERE completed_experiments.user_ID = {$user_info['id']};";
$resultCompletedExp = mysqli_query($conn, $getCompletedExp);


while ($row = mysqli_fetch_assoc($resultCompletedExp)) {
    $completedResults[] = $row;
}



$insuranceData = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<header>
    <?php
    require_once 'nav-bar.php';
    ?>
</header>
<body>
<div class="user-container">
    <div class="user-box">
        <h1 id="user_name"><?= htmlentities($user_info['first_name'])?> <?=htmlentities($user_info['last_name'] ) ?></h1>
        <div>
            <p class="category">Email</p><p><?= htmlentities($user_info['email'])?></p>
            <p class="category">Telefoonnummer</p><p>0<?= htmlentities($user_info['phone_number'])?></p>
            <p class="category">Geboortedatum</p><p><?= htmlentities($user_info['date_of_birth'])?></p>
            <p class="category">Lengte</p><p><?= htmlentities($user_info['height'])?> cm</p>
            <p class="category">Gewicht</p><p><?= htmlentities($user_info['weight'])?> kg</p>
            <p class="category">BMI</p><p><?= htmlentities($user_info['bmi'])?></p>
            <p class="category">Bloedtype</p><p><?= htmlentities($user_info['blood_type'])?></p>
        </div>
    </div>
    <div class="user-box" id="image_box">
        <img id="user_profile" src="img/user_prof.png" alt="profile image">
        <h2>Beginnende Tester</h2>
        <img src="img/medal.png" alt="medal image">
        <p id="debt">€<?= htmlentities($insuranceData['dept'])?>,- Verdiend</p>
        <button id="edit_prof" ><a href="logout.php">Uitloggen</a></button>
    </div>
</div>
<div>
    <h1>Voltooide onderzoeken</h1>
    <div class="exp-container">
        <?php foreach ($completedResults ?? "" as $completedResult) { ?>
            <div class="exp-box">
                <h2><?= $completedResult['experiment']?></h2>
                <p><?= $completedResult['explanation']?></p>
                <a class="view-exp" href="onderzoek.php?id=<?=$completedResult['id']?>">Bekijk Onderzoek</a>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
