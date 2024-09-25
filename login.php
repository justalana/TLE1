<?php
/** @var mysqli $conn */
// required when working with sessions
session_start();

require_once "connection.php";

$login = false;
// Is user logged in?

if (isset($_POST['submit'])) {
    $errors = array();

    // Get form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Server-side validation
    if ($email === "") {
        $errors['email'] = "Enter an email";
    }
    if ($password === "") {
        $errors['loginFailed'] = "Enter a password";
    }

    // If data valid
// If data valid
    if (empty($errors)) {
        // SELECT the user from the database, based on the email address.
        $loginQuery = "SELECT * FROM users where email = '$email'";
        $result = mysqli_query($conn, $loginQuery) or die('error: ' . mysqli_error($conn));

        // check if the user exists
        if (mysqli_num_rows($result) != 1) {
            header('Location: register.php');
            exit;
        }

        // Get user data from result
        $user = mysqli_fetch_assoc($result);

        // Check if the provided password matches the stored password in the database
        if (password_verify($password, $user['password'])) {
            // Password is correct

            // Store the user in the session
            $_SESSION['user'] = $user; // Assuming user details are stored in session

            // Redirect to secure page
            header('Location: profile.php');
            exit;
        } else {
            // Password is incorrect

            //error incorrect log in
            $errors['loginFailed'] = "Incorrect login credentials";
        }
    }

// User doesn't exist

//error incorrect log in
    $errors['loginFailed'] = "User does not exist or incorrect login credentials";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <title>login</title>
</head>
<body>
<?php if ($login) { ?>
    <p><a href="logout.php">Uitloggen</a> / <a href="index.php">Naar home</a></p>
<?php } else { ?>
    <section class="login">

        <div class="login-logo">
            <img class="login-logo-image" src="IMG/vitalislogo.png">
            <h1>The Company Name</h1>
        </div>

        <div class="login-form-container">

            <form class="login-form" action="" method="post">

                <h1>Welkom terug</h1>
                <p>vul uw gegevens in</p>

                <div class="login-flex-container">
                    <input class="input" id="email" type="text" name="email" value="<?= $email ?? '' ?>"
                           placeholder="Email"/>
                    <p class="help">
                        <?= $errors['email'] ?? '' ?>
                    </p>

                    <input class="input" id="password" type="password" name="password" placeholder="wachtwoord"/>
                    <?php if (isset($errors['loginFailed'])) { ?>
                        <div class="notification">
                            <button class="delete"></button>
                            <?= $errors['loginFailed'] ?>
                        </div>
                    <?php } ?>

                    <p class="help">
                        <?= $errors['password'] ?? '' ?>
                    </p>
                    <button class="register-button" type="submit" name="submit">Inloggen</button>
                </div>

                <p>nog geen account? <a href="register.php">aanmelden</a></p>

            </form>
        </div>

        <div class="right-side-login">
        </div>
    </section>
<?php } ?>
</body>
</html>