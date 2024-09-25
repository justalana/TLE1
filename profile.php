<?php
/** @var mysqli $conn */
require_once 'connection.php';

// Retrieve user information based on the user ID stored in the session
$query = 'SELECT * FROM users WHERE ID = 1';
$result = mysqli_query($conn, $query);

//save book details in array
$user_info = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<header>
    <?php
    require_once 'nav-bar.php';
    ?>
</header>
<body>
<div class="user-container">
    <div class="user-box">
        <h1 id="user_name"><?= htmlentities($user_info['name'])?></h1>
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
        <p id="debt">-€100.000,-</p>
        <button id="edit_prof">Profiel Bewerken</button>
    </div>
</div>
<div>
    <h1>Voltooide onderzoeken</h1>
    <div class="exp-container">
        <div class="exp-box">
            <h2>Experiment1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <button class="view-exp">Bekijk Onderzoek</button>
        </div>
        <div class="exp-box">
            <h2>Experiment2</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <button class="view-exp">Bekijk Onderzoek</button>
        </div>
        <div class="exp-box">
            <h2>Experiment3</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <button class="view-exp">Bekijk Onderzoek</button>
        </div>
        <div class="exp-box">
            <h2>Experiment4</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <button class="view-exp">Bekijk Onderzoek</button>
        </div>

    </div>
</div>
</body>
</html>
