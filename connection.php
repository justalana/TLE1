<?php
//// connection.php
//$host = 'localhost';
//$dbname = 'tle1_database';
//$user = 'root';
//$pass = '';
//
//// Create the connection
//$conn = mysqli_connect($host, $user, $pass, $dbname);
//
//// Check the connection
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}

$host = "localhost";
$user = "root";
$password = "";
$database = "tle1_database";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;

//?>


