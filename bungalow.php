<?php
session_start();
if(isset($_SESSION["email"]) == "jeandro@email.com"){
    echo '
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home - Vakantiepark Verwoerd</title>
        <link rel="icon" type="image/png" href="Vlogo.png">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    
    <body>
        <div class="navbar-img navbar-container navbar-top navbar">
            <div class="nav-item"><a href="bungalow.php">
                    <p class="navbar-text">Bungalow aanmaken</p>
                </a></div>
            <div class="nav-item"><a href="index.php">
                    <p class="navbar-text">Reserveren</p>
                </a></div>
            <div class="nav-item"><a href="account.php">
                    <p class="navbar-text">Account</p>
                </a></div>
            <div class="nav-item"><a href="login.php">
                    <p class="navbar-text">Uitloggen</p>
            </a></div>
        </div>
    
        <!-- ----------------------------------------------------------------------------------------------------------- -->
    
        <br>';
        echo "Maak bungalow aan";
        echo '
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
    
    <script src="script.js"></script>
    ';
}
else{
    header("location:login.php");
}
?>