<?php


?>
<nav>
    <div class="nav-bar-middle">
        <a href="index.php">Home</a>
        <a href="alle-onderzoeken.php">Soorten Onderzoek</a>
        <div class="nav-bar-left">
            <img src="img/vitalislogo.png" alt="Logo">
        </div>
        <a href="#">Over ons</a>
        <?php if (!isset($_SESSION['user'])) { ?>
        <a href="login.php" class="button">Aanmelden</a>
        <?php }else {?>
        <a href="profile.php" class="button">Profiel</a>
        <?php }?>
    </div>
</nav>
