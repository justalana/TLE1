<?php
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user'])) {?>
<nav>
    <div class="nav-bar-middle">
        <a href="index.php">Home</a>
        <a href="alle-onderzoeken.php">Soorten Onderzoek</a>
        <div class="nav-bar-left">
            <img src="img/vitalislogo.png" alt="Logo">
        </div>
        <a href="about_us.php">Over ons</a>
        <a href="profile.php" class="button">Profiel</a>
    </div>
</nav>
<?php }else {?>
<nav>
    <div class="nav-bar-middle">
        <a href="index.php">Home</a>
        <a href="alle-onderzoeken.php">Soorten Onderzoek</a>
        <div class="nav-bar-left">
            <img src="img/vitalislogo.png" alt="Logo">
        </div>
        <a href="about_us.php">Over ons</a>
        <a href="login.php" >Aanmelden</a>
    </div>
</nav>
<?php } ?>

