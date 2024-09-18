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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<nav>
    <p>navbar</p>
</nav>
<body>
<div>
    <h2><?= htmlentities($user_info['name'])?></h2>
    <section>
        <ul>
            <li>Email: <?= htmlentities($user_info['email'])?></li>
            <li>Phone number: 0<?= htmlentities($user_info['phone_number'])?></li>
            <li>Date of birth: <?= htmlentities($user_info['date_of_birth'])?></li>
            <li>Height: <?= htmlentities($user_info['height'])?></li>
            <li>Weight: <?= htmlentities($user_info['weight'])?></li>
            <li>BMI: <?= htmlentities($user_info['bmi'])?></li>
            <li>Blood Type: <?= htmlentities($user_info['blood_type'])?></li>
        </ul>
    </section>
</div>
</body>
</html>
