<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'TLE1';

// Create the connection
$database = mysqli_connect($host, $user, $pass, $db) or die("Connection failed: " . mysqli_connect_error());

// Check the connection
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}

