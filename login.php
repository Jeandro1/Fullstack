<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
echo '
<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login - Vakantiepark Verwoerd</title>
            <link rel="icon" type="image/png" href="Vlogo.png">
            <link rel="stylesheet" href="stylesheet.css">
        </head>

        <body>
            <div class="navbar-img navbar-container navbar-top navbar">
                <div class="nav-item"><a href="index.php">
                    <p class="navbar-text">Reserveren</p>
                </a></div>
                <div class="nav-item"><a href="login.php">
                    <p class="navbar-text">Inloggen</p>
                </a></div>
                <div class="nav-item"><a href="register.php">
                    <p class="navbar-text">Registreren</p>
                </a></div>
            </div>

    <!-- ----------------------------------------------------------------------------------------------------------- -->

    <br>
    <form action="response.php" method="post">
    Email-adres <br><input type="text" name="email" value=""><br>
    Wachtwoord <br><input type="password" name="wachtwoord" value=""><br>
    <input type="submit" name="login" value="Log in">
    </form>

    <a href="register.php">
    <p class="blacktext">Heb je nog geen account? Registreer je hier!</p>
    </a>
    <br>

    <!-- ----------------------------------------------------------------------------------------------------------- -->

            <footer>
                <div class="nav-item"><a href="index.php">
                    <p class="navbar-text">Reserveren</p>
                </a></div>
                <div class="nav-item">
                    <p class="navbar-text">Locatie: Domberg</p>
                </div>
            </footer>
        </body>

        <script src="script.js"></script>';
?>