<?php
if (isset($_POST['submit'])) {
    /** @var mysqli $conn */
    require_once "connection.php";
    $errors = array();

    // Get form data
    $email = mysqli_escape_string($conn, $_POST['email']);
    $firstName = mysqli_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_escape_string($conn, $_POST['lastName']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    // Server-side validation
    $fields = [
        'email' => 'Please enter an email.',
        'firstName' => 'Please enter a firstname.',
        'lastName' => 'Please enter a lastname.',
        'password' => 'Please enter a password.'
    ];

    $errors = [];

    foreach ($fields as $key => $message) {
        if (empty($$key)) {
            $errors[$key] = $message;
        }
    }
    // If data valid
    // Check if the email is already in use
    $checkQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // email is already in use
        $errors['email'] = "This email is already registered.";
    } else
        if (empty($errors)) {
            // create a secure password, with the PHP function password_hash()
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // store the new user in the database.

            $insertQuery = "INSERT INTO `users`(`id`, `email`, `password`, `first_name`, `last_name`) 
                        VALUES ('','$email','$hashedPassword','$firstName','$lastName')";

            if (mysqli_query($conn, $insertQuery)) {
                // Redirect to login page
                header('location: index.php');
                // Exit the code
                exit;
            } else {
                echo "Error: " . mysqli_error($conn); // Display SQL error for debugging
            }

        }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registreren</title>
</head>
<body>
<form action="" method="post">

    <label class="label" for="firstName">First name</label>
    <input class="input" id="firstName" type="text" name="firstName" value="<?= $firstName ?? '' ?>"/>

    <label class="label" for="lastName">Last name</label>
    <input class="input" id="lastName" type="text" name="lastName" value="<?= $lastName ?? '' ?>"/>

    <label class="label" for="email">Email</label>
    <input class="input" id="email" type="text" name="email" value="<?= $email ?? '' ?>"/>

    <label class="label" for="password">password</label>
    <input class="input" id="password" type="text" name="password" value="<?= $password ?? '' ?>"/>

    <button class="button" type="submit" name="submit">Register</button>

</form>
</body>
</html>