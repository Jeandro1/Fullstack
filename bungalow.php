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
        echo "Maak bungalow aan:";
        echo '<br><br><form action="response.php" method="post">
                Naam: <br><input type="text" name="naamBungalow" value=""><br>
                <select id="typeBungalow" name="typeBungalow">
                    <option value="garnaal">Garnaal</option>
                    <option value="krab">Krab</option>
                    <option value="kreeft">Kreeft</option>
                    <option value="kreeftDeluxe">Kreeft deluxe</option>
                </select><br>
                <input type="submit" name="createBungalow" value="Maak bungalow">
              </form><br>';

        echo "Maak voorziening aan:";
        echo '<br><br><form action="response.php" method="post">
                Voorziening: <br><input type="text" name="naamVoorziening" value=""><br>
                <input type="submit" name="createVoorziening" value="Maak voorziening">
              </form><br><br><br><br>';

        echo "Voeg bungalow toe aan reserveer pagina:";
        echo '<br><br><form action="response.php" method="post">
                Naam: <br>
                <select id="naamBungalow" name="naamBungalow">
                    <option value="garnaal">Garnaal</option>
                    <option value="krab">Krab</option>
                    <option value="kreeft">Kreeft</option>
                    <option value="kreeftDeluxe">Kreeft deluxe</option>
                </select><br><br>
                Prijs: <br>
                <input type="text" name="prijsBungalow" value=""><br><br>
                Voorzieningen: <br>
                <select id="typeBungalow" name="typeBungalow">
                    <option value="garnaal">Garnaal</option>
                    <option value="krab">Krab</option>
                    <option value="kreeft">Kreeft</option>
                    <option value="kreeftDeluxe">Kreeft deluxe</option>
                </select><br><br>
                Foto: <br>
                <input type="file" name="fotoBungalow">
                <br><br>
                <input type="submit" name="addBungalow" value="Voeg bungalow toe">
              </form>';
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