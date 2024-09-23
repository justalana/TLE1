<?php
/** @var mysqli $db */
require_once 'connection.php';

// Retrieve user information based on the user ID stored in the session
$query = 'SELECT * FROM users WHERE ID = 1';
$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query);

//save book details in array
$user_info = mysqli_fetch_assoc($result);

mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<nav>
    <p>navbar</p>
</nav>
<body>
<div class="flex-container">
    <div class="flex-box">
        <h2 id="user_name"><?= htmlentities($user_info['name'])?></h2>
        <div>
            <p class="category">Email</p><p><?= htmlentities($user_info['email'])?></p>
            <p class="category">Telefoonnummer</p><p>0<?= htmlentities($user_info['phone_number'])?></p>
            <p class="category">Geboortedatum</p><p><?= htmlentities($user_info['date_of_birth'])?></p>
            <p class="category">Lengte</p><p><?= htmlentities($user_info['height'])?></p>
            <p class="category">Gewicht</p><p><?= htmlentities($user_info['weight'])?></p>
            <p class="category">BMI</p><p><?= htmlentities($user_info['bmi'])?></p>
            <p class="category">Bloedtype</p><p><?= htmlentities($user_info['blood_type'])?></p>
        </div>
    </div>
    <div class="flex-box" id="image_box">
        <img id="user_profile" src="img/user_prof.png" alt="profile image">
        <h2>Beginnende Tester</h2>
        <img src="img/medal.png" alt="medal image">
        <p id="debt">-€100.000,-</p>
        <button id="edit_prof">Profiel Bewerken</button>
    </div>
</div>
</body>
</html>
