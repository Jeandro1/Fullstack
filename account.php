<?php
include('db.php');
session_start();

if(!isset($_SESSION["loggedin"])){
    header("location:login.php");
}  

if(isset($_POST["logout"])){
    session_destroy();
    header("location:login.php");
}       

?>


<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - Vakantiepark Verwoerd</title>
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

    <div class="formsborderacc">

        <?php echo $_SESSION['email'];?>

        <br><br>

        <form action="account.php" method="post">
            <input class="formsbutton" type="submit" name="logout" value="Uitloggen">
        </form>

        <br>

        <form action="account.php" method="post">
            <input class="formsbutton" type="submit" name="delete" value="Delete account">
        </form>

        <?php

if(isset($_POST["delete"])){
    $emaildelete = $_SESSION["email"];
    $accountdelete = $conn->prepere("DELETE FROM Users WHERE email = '$emaildelete'");      
    $accountdelete->execute();
    echo "Account deleted successfully";
    echo '<br>' . '<a href="register.php">Naar de inlogpagina</a>';
    sleep(2);
    header("location:login.php");
}
        ?>
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