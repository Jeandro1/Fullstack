<?php
include('db.php');
session_start();

if(isset($_SESSION["loggedin"])){
    header("location:account.php");
  }  

if(isset($_POST["login"])){
    if(empty($_POST["email"]) || empty($_POST["wachtwoord"])){
        echo "Alle velden moeten worden ingevuld!";
        sleep(2);
        header("location:login.php");
    }
    else{
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email AND wachtwoord = :wachtwoord");
        $statement->execute(array('email' => $_POST["email"], 'wachtwoord' => $_POST["wachtwoord"]));
        $count = $statement->rowCount();
        if($count > 0){
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $_POST["email"];
            header("location:account.php");
        }
        else{
            echo "Verkeerde email of wachtwoord ingevuld!";
            sleep(2);
            header("location:login.php");
        }
    }
}

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
    <form action="login.php" method="post">
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
