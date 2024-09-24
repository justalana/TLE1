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
$user = $_SESSION['user'];

$query = "SELECT * FROM insurance_users WHERE email = '{$user['email']}'";
$result = mysqli_query($conn, $query) or die('error: ' . mysqli_error($conn));

$insuranceData = mysqli_fetch_assoc($result);
print_r($insuranceData);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>profiel</title>
</head>
<body>
    <p><?= $user['id']?></p>
    <p><?= $user['email']?></p>
    <p><?= $user['last_name']?></p>
    <p>- $<?= $insuranceData['dept'] ?? 0 ?></p>
</body>
</html>
