<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'TLE1';

// Create the connection
$conn = mysqli_connect($host, $user, $pass, $db) or die("Connection failed: " . mysqli_connect_error());
