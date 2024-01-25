<?php
include('db.php');
session_start();
<<<<<<< Updated upstream

if(!isset($_SESSION["loggedin"])){
    header("location:login.php");
}  

if($_SESSION["email"] !== "jeandro@email.com"){
    header("location:account.php")
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

    $vSth = $conn->prepare("SELECT * FROM voorzieningen WHERE idBungalow_voorzieningen = '0'");
    $vSth->execute();
    $vCount = $vSth->rowCount();

    $bSth = $conn->prepare("SELECT * FROM bungalows");
    $bSth->execute();
    $bCount = $bSth->rowCount();

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
    Maak bungalow aan:
    <br><br><form action="response.php" method="post">
=======
        <br>
        Maak bungalow aan:
        <br><br><form action="response.php" method="post">
>>>>>>> Stashed changes
                Naam: <br><input type="text" name="naamBungalow" value=""><br>
                <select id="typeBungalow" name="typeBungalow">
                    <option value="garnaal">Garnaal</option>
                    <option value="krab">Krab</option>
                    <option value="kreeft">Kreeft</option>
                    <option value="kreeftDeluxe">Kreeft deluxe</option>
                </select><br>
                <input type="submit" name="createBungalow" value="Maak bungalow">
              </form><br>

<<<<<<< Updated upstream
                Maak voorziening aan:
                <br><br><form action="response.php" method="post">
=======
        Maak voorziening aan:
        <br><br><form action="response.php" method="post">
>>>>>>> Stashed changes
                Voorziening: <br><input type="text" name="naamVoorziening" value=""><br>
                <input type="submit" name="createVoorziening" value="Maak voorziening">
              </form><br><br><br><br>

<<<<<<< Updated upstream
                Voeg bungalow toe aan reserveer pagina:
            <br><br><form action="response.php" method="post">
                Naam: <br>
                <select id="naamOnline" name="naamOnline">
                <option value=""></option>
                
                </select><br><br>
                Prijs: <br>
                <input type="text" name="prijsBungalow" value=""><br><br>
                Voorzieningen: <br> 
                <input type="checkbox" id="voorzieningenBungalow" name="voorzieningenBungalow" value="">
                <label for="voorzieningenBungalow"></label><br>
             
=======
        Voeg bungalow toe aan reserveer pagina:
        <br><br><form action="response.php" method="post">
                Naam: <br>
                <select id="naamOnline" name="naamOnline">
                ';

                for ($i = 1; $i <= $bCount; $i++) {

                    $xbSth = $conn->prepare("SELECT * FROM bungalows WHERE idBungalow = '$i'");
                    $xbSth->execute();
                    $xxbSth = $xbSth->fetch();
                    
                    echo '<option value="' . $xxbSth['naam'] . '">' . $xxbSth['naam'] . '</option>';
                }

                echo '
                </select><br><br>
                Prijs: <br>
                <input type="text" name="prijsBungalow" value=""><br><br>
                Voorzieningen: <br>
                ';

                for ($i = 1; $i <= $vCount; $i++) {
                    
                    $xvSth = $conn->prepare("SELECT * FROM voorzieningen WHERE idBungalow_voorzieningen ='0'");
                    $xvSth->execute();
                    $xxvSth = $xvSth->fetch();
                    
                    echo '<input type="checkbox" id="voorzieningenBungalow'.$i.'" name="voorzieningenBungalow'.$i.'" value=' . $xxvSth['voorziening['.$i.']'] . '>
                          <label for="voorzieningenBungalow'.$i.'">' . $xxvSth['voorziening['.$i.']'] . '</label><br>';
                }

                echo '
>>>>>>> Stashed changes
                <br><br>
                Foto: <br>
                <input type="file" name="fotoBungalow">
                <br><br>
                <input type="submit" name="addBungalow" value="Voeg bungalow toe">
              </form>
        
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
<<<<<<< Updated upstream
    </body>
=======
    </body>
    
    <script src="script.js"></script>
    ';
}
else{
    header("location:login.php");
}
}
catch(PDOExeption $e) {
    echo "Connection failed!";
}
?>
>>>>>>> Stashed changes
