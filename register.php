<?php
include('db.php');
session_start();

if(isset($_SESSION["loggedin"])){
  header("location:account.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registreren - Vakantiepark Verwoerd</title>
  <link rel="icon" type="image/png" href="images/Vlogo.png">
  <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
  <div class="navbar-img navbar-container navbar-top navbar">
  <div class="nav-item"><a href="index.php">
            <p class="navbar-text">Home</p>
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

  <div class="formsborderacc">
    <form action="register.php" method="post">
    <?php
if(isset($_POST["registreer"])){
  if(empty($_POST["voornaam"]) || empty($_POST["achternaam"]) || empty($_POST["straat"]) || empty($_POST["huisnummer"]) || empty($_POST["plaats"]) || empty($_POST["email"]) || empty($_POST["telefoonnummer"]) || empty($_POST["wachtwoord"]) || empty($_POST["herhaalWachtwoord"])){
      echo "Alle velden moeten worden ingevuld!";
  }
  else{
    $statement = $conn->prepare("SELECT * FROM Users WHERE email = :email");
        $statement->execute(array('email' => $_POST["email"]));
        $count = $statement->rowCount();
        if($count > 0){
          echo "Email-adres is al in gebruik!";
        }
        else{
          if($_POST["herhaalWachtwoord"] === $_POST["wachtwoord"]){
            $voornaam = $_REQUEST["voornaam"];
            $tussenvoegels = $_REQUEST["tussenvoegels"];
            $achternaam = $_REQUEST["achternaam"];
            $straat = $_REQUEST["straat"];
            $huisnummer = $_REQUEST["huisnummer"];
            $toevoeging = $_REQUEST["toevoeging"];
            $plaats = $_REQUEST["plaats"];
            $email = $_REQUEST["email"];
            $telefoonnummer = $_REQUEST["telefoonnummer"];
            $wachtwoord = $_REQUEST["wachtwoord"];
            $sqlregister = $conn->prepare("INSERT INTO Users (voornaam, tussenvoegsels, achternaam, straat, huisnummer, toevoeging, plaats, email, telefoonnummer, wachtwoord)
                    VALUES ('$voornaam', '$tussenvoegsels', '$achternaam', '$straat', '$huisnummer', '$toevoeging', '$plaats', '$email', '$telefoonnummer', '$wachtwoord')");
            $sqlregister->execute();
            echo "New account created successfully";
            sleep(1);
            header("location:login.php");
  
        }
        else{
            echo "Wachtwoorden komen niet overeen!";
        }
        } 
  }
}
?><br><br>
      Voornaam* <br><input type="text" name="voornaam" value=""><br>
      Tussenvoegsel(s) <br><input type="text" name="tussenvoegsels" value=""><br>
      Achternaam* <br><input type="text" name="achternaam" value=""><br>
      Straat* <br><input type="text" name="straat" value=""><br>
      Huisnummer* <br><input type="text" name="huisnummer" value=""><br>
      Toevoeging <br><input type="text" name="toevoeging" value=""><br>
      Plaats* <br><input type="text" name="plaats" value=""><br>
      Email-adres* <br><input type="text" name="email" value=""><br>
      Telefoonnummer* <br><input type="text" name="telefoonnummer" value=""><br>
      Wachtwoord* <br><input type="password" name="wachtwoord" value=""><br>
      Herhaal wachtwoord* <br><input type="password" name="herhaalWachtwoord" value=""><br>
      <input class="formsbutton" type="submit" name="registreer" value="Registreer">
    </form>

    <a href="login.php">
      <p class="blacktext">Heb je al een account? Log hier in!</p>
    </a>
  </div>

  <br>

  <!-- ----------------------------------------------------------------------------------------------------------- -->

  <footer>
  <div class="nav-item"><a href="index.php">
                <p class="navbar-text">Home</p>
            </a></div>
    <div class="nav-item">
      <p class="navbar-text">Locatie: Domberg</p>
    </div>
  </footer>
</body>';
?>