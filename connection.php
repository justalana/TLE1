<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'TLE1';

// Create the connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
