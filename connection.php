<?php
// connection.php
$host = 'localhost';
$dbname = 'tle1';
$user = 'root';
$pass = '';

// Create the connection
$db = mysqli_connect($host, $user, $pass, $dbname);

// Check the connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
