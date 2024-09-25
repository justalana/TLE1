<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <title>User Table</title>
</head>
<body>
<header>
    <!-- Header content here -->
</header>
<main>
    <?php
    require_once "connection.php"; // Include connection.php first
    require_once "main.php";  // Include main.php where ClassLoadTest is defined

    // Instantiate the ClassLoadTest class and pass the connection
    /** @var TYPE_NAME $conn */
    $classLoadTest = new ClassLoadTest($conn);

    // Call the getUsers method to fetch all users
    $users = $classLoadTest->getUsers();

    // Check if there are users in the database
    if (!empty($users)) {
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>"; // Add table headers
        echo "</thead>";
        echo "<tbody>";
        // Loop through each user and display their data in the table
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user['ID'] . "</td>";        // Display user ID
            echo "<td>" . $user['name'] . "</td>";  // Display username
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No users found."; // If no users are found, display this message
    }
    ?>
</main>
<footer>
    <!-- Footer content here -->
</footer>
</body>
</html>
