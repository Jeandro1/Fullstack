<?php
include('db.php');
session_start();

if(isset($_SESSION["loggedin"])){
    header("location:account.php");
  }  

  $statement = $conn->prepare("SELECT * FROM Users WHERE email = :email AND wachtwoord = :wachtwoord");
  $statement->execute(array('email' => $_POST["email"], 'wachtwoord' => $_POST["wachtwoord"]));
  $count = $statement->rowCount();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Vakantiepark Verwoerd</title>
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
        <form action="" method="post">
        <?php
        if(isset($_POST["login"])){

    if(empty($_POST["email"]) || empty($_POST["wachtwoord"])){
        echo "Alle velden moeten worden ingevuld!";
    }
    
    else{
        
        if($count > 0){
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $_POST["email"];
            echo "Succesvol!";
            header("location:account.php");
        }
        else{
            echo "Verkeerde email of wachtwoord ingevuld!";
        }
    }
}
?><br><br>
            Email-adres <br><input type="text" name="email" value=""><br>
            Wachtwoord <br><input type="password" name="wachtwoord" value=""><br>
            <input class="formsbutton" type="submit" name="login" value="Log in">
        </form>
        <a href="register.php">
            <p class="blacktext">Heb je nog geen account? Registreer je hier!</p>
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
</body>
