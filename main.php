<?php
require_once "connection.php"; // Ensure the connection is included here or in the calling file

class ClassLoadTest {
    private $conn;

    // Constructor to initialize the connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to fetch all users
    public function getUsers() {
        $query = "SELECT * FROM `users`"; // Query to fetch all users
        $result = mysqli_query($this->conn, $query) or die('Error: ' . mysqli_error($this->conn));

        // Fetch all users as an associative array
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $users; // Return the array of users
    }
}
