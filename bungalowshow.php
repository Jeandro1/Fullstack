<?php
include('db.php');
session_start();

if(!isset($_SESSION["loggedin"])){
    header("location:login.php");
}  

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
        if($_SESSION["email"] == "admin@admin.com"){
            echo '<div class="nav-item"><a href="bungalowtypecreate.php">
                      <p class="navbar-text">Bungalow type aanmaken</p>
                  </a></div>';
        }
        if($_SESSION["email"] == "admin@admin.com"){
            echo '<div class="nav-item"><a href="bungalowvoorzieningcreate.php">
                      <p class="navbar-text">Bungalow voorziening aanmaken</p>
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
<?php
    $result = $conn->query("SELECT * FROM Bungalows");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
         //   echo $row['foto'] . '<br>';
            echo $row['naam'] . '<br>';
            echo $row['prijs'] . '<br>';
            $resulttype = $conn->query("SELECT Type.type FROM Type INNER JOIN Bungalows ON Bungalows.idBungalow=idType;");
                while ($row = $resulttype->fetch(PDO::FETCH_ASSOC)) {
                   echo $row['type'] . '<br>';
                }
            $resultvoorzieningen = $conn->query("SELECT Voorzieningen.voorzieningen FROM Voorzieningen INNER JOIN BungalowsVoorzieningen ON idBungalow=idVoorzieningen;");
                while ($row = $resultvoorzieningen->fetch(PDO::FETCH_ASSOC)) {
                   echo $row['voorzieningen'] . '<br>';
                }
        }
?>
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