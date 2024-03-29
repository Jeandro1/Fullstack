<?php
include('db.php');
session_start();

if(!isset($_SESSION["loggedin"])){
    header("location:login.php");
}  

$result = $conn->query("SELECT Bungalows.naam, Bungalows.prijs, Bungalows.foto, Type.type, GROUP_CONCAT(Voorzieningen.voorzieningen) as voorzieningen
FROM Bungalows
INNER JOIN Type ON Bungalows.idType = Type.idType
LEFT JOIN BungalowVoorzieningen ON Bungalows.idBungalow = BungalowVoorzieningen.idBungalow
LEFT JOIN Voorzieningen ON BungalowVoorzieningen.idVoorzieningen = Voorzieningen.idVoorzieningen
GROUP BY Bungalows.idBungalow
");

?>

<!DOCTYPE html>
<html lang="en">
        
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Vakantiepark Verwoerd</title>
    <link rel="icon" type="image/png" href="images/Vlogo.png">
    <link rel="stylesheet" href="stylesheet.css">
</head>
        
<body>
    <div class="navbar-img navbar-container navbar-top navbar">
        <?php
        if($_SESSION["email"] == "admin@admin.com"){
            echo '<div class="nav-item"><a href="bungalowcreate.php">
                      <p class="navbar-text">Bungalow aanmaken</p>
                  </a></div>';
        }
        ?>
        <div class="nav-item"><a href="bungalowshow.php">
                <p class="navbar-text">Bungalows</p>
            </a></div>
        <div class="nav-item"><a href="account.php">
                <p class="navbar-text">Account</p>
            </a></div>
    </div>
        
<!-- ----------------------------------------------------------------------------------------------------------- -->
        
    <br>
    <div class="outlinepage">
    <?php if (isset($result) && $result->rowCount() > 0): ?>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
              <table>
                <th>
                    <img src="data:image/jpeg;base64,<?= base64_encode($row['foto']); ?>" width="600" height="300" class="fotobungalow">
                    <p class="showtextprijs"><?= $row['prijs']; ?></p>
                    <p class="showtextbent">Inclusief belasting en toeslagen</p>
                    <p class="showtextnaam"><?= $row['naam']; ?></p>
                    <p class="showtexttenv"><?= $row['type']; ?></p>
                    <p class="showtexttenv"><?= $row['voorzieningen']; ?></p>
                    <button class="reserveerknop">Reserveer</button>
                </th>    
              </table>
                  
        <?php endwhile; ?>
    <?php else: ?>
        <p>Geen bungalows gevonden.</p>
    <?php endif; ?>
    </div>  
    <br>
        
<!-- ----------------------------------------------------------------------------------------------------------- -->
        
    <footer>
                
        <div class="nav-item"><a href="bungalowshow.php">
                <p class="navbar-text">Bungalows</p>
            </a></div>
        <div class="nav-item">
            <p class="navbar-text">Locatie: Domberg</p>
        </div>
    </footer>
</body>