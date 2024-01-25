<?php
include('db.php');
session_start();
<<<<<<< Updated upstream

if(!isset($_SESSION["loggedin"])){
    header("location:login.php");
}  

?>

<!DOCTYPE html>
<html lang="en">
=======
$u = "agatat_user";
$p = "d@t@b@se123";
$hostname = "agatat-schooldatabse.db.transip.me";
$dbname = "agatat_schooldatabse";

try{
    $conn = new PDO("mysql:host={$hostname};dbname={$dbname};port=3306", $u, $p);

    $Sth = $conn->prepare("SELECT * FROM bungalows");
    $Sth->execute();
    $Count = $Sth->rowCount();

if(isset($_SESSION["email"])){
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
        for ($i = 0; $i <= $Count; $i++) {
        foreach($conn->query("SELECT * FROM bungalows WHERE prijs IS NOT NULL AND idBungalow = '$i'") as $row){
        echo $row['naam'] . '<br>';
        echo $row['bungalowtype'] . '<br>';
        echo $row['prijs'] . '<br>' . '<br>';
          foreach($conn->query("SELECT * FROM voorzieningen WHERE idBungalow_voorzieningen = '$i'") as $row2){
            echo $row2['voorziening'] . '<br>';
            }
            echo '<br>' . '<br>' . '<br>' . '<br>';
        }
        }

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
    if(isset($_SESSION["email"])){
        echo '
        <!DOCTYPE html>
        <html lang="en">
>>>>>>> Stashed changes
        
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
        if($_SESSION["email"] == "jeandro@email.com"){
            echo '<div class="nav-item"><a href="bungalow.php">
                      <p class="navbar-text">Bungalow aanmaken</p>
                  </a></div>';
        }
        ?>
        <div class="nav-item"><a href="index.php">
                <p class="navbar-text">Reserveren</p>
            </a></div>
        <div class="nav-item"><a href="account.php">
                <p class="navbar-text">Account</p>
            </a></div>
    </div>
        
<!-- ----------------------------------------------------------------------------------------------------------- -->
        
<<<<<<< Updated upstream
    <br>
    <br>
=======
            <br>';

            for ($i = 0; $i <= $Count; $i++) {
            foreach($conn->query("SELECT * FROM bungalows WHERE prijs IS NOT NULL AND idBungalow = '$i'") as $row){
            echo $row['naam'] . '<br>';
            echo $row['bungalowtype'] . '<br>';
            echo $row['prijs'] . '<br>' . '<br>';
              foreach($conn->query("SELECT * FROM voorzieningen WHERE idBungalow_voorzieningen = '$i'") as $row2){
                echo $row2['voorziening'] . '<br>';
                }
                echo '<br>' . '<br>' . '<br>' . '<br>';
            }
            }
    
            echo '
            <br>
>>>>>>> Stashed changes
        
<!-- ----------------------------------------------------------------------------------------------------------- -->
        
    <footer>
                
<<<<<<< Updated upstream
        <div class="nav-item"><a href="index.php">
                <p class="navbar-text">Reserveren</p>
            </a></div>
        <div class="nav-item">
            <p class="navbar-text">Locatie: Domberg</p>
        </div>
    </footer>
</body>

=======
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
        echo '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reserveren - Vakantiepark Verwoerd</title>
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

    <br>';
    
        for ($i = 0; $i <= $Count; $i++) {
        foreach($conn->query("SELECT * FROM bungalows WHERE prijs IS NOT NULL AND idBungalow = '$i'") as $row){
        echo $row['naam'] . '<br>';
        echo $row['bungalowtype'] . '<br>';
        echo $row['prijs'] . '<br>' . '<br>';
          foreach($conn->query("SELECT * FROM voorzieningen WHERE idBungalow_voorzieningen = '$i'") as $row2){
            echo $row2['voorziening'] . '<br>';
            }
            echo '<br>' . '<br>' . '<br>' . '<br>';
        }
        }

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

        <script src="script.js"></script>';
    }
}
}
catch(PDOExeption $e) {
    echo "Connection failed!";
}
?>
>>>>>>> Stashed changes
