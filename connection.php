<?php
// connection.php
$host = 'localhost';
$dbname = 'TLE1';
$user = 'root';
$pass = '';

// Create the connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
