<?php
include('db.php');
session_start();

if(!isset($_SESSION["loggedin"])){
    header("location:login.php");
}  

if($_SESSION["email"] !== "admin@admin.com"){
    header("location:account.php");
}

//online zetten

if (isset($_POST['submit'])) {
    $naam = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $typeID = $_POST['type'];
    $selectedVoorzieningen = isset($_POST['voorzieningen']) ? $_POST['voorzieningen'] : [];

    $foto = "";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $fotoTmpName = $_FILES['foto']['tmp_name'];
        $fotoName = $_FILES['foto']['name'];
        $fotoExtension = pathinfo($fotoName, PATHINFO_EXTENSION);
        $foto = file_get_contents($fotoTmpName);
    }

    $stmt = $conn->prepare("INSERT INTO Bungalows (naam, prijs, foto, idType) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $naam);
    $stmt->bindParam(2, $prijs);
    $stmt->bindParam(3, $foto, PDO::PARAM_LOB);
    $stmt->bindParam(4, $typeID);
    
    $autoincrement = $conn->prepare("ALTER TABLE Bungalows AUTO_INCREMENT =1;");
    $autoincrement->execute();

    $stmt->execute();

    $bungalowID = $conn->lastInsertId();

    foreach ($selectedVoorzieningen as $voorzieningID) {
        $stmt = $conn->prepare("INSERT INTO BungalowVoorzieningen (idBungalow, idVoorzieningen) VALUES ('$bungalowID', '$voorzieningID')");
        $stmt->execute();
    }
}

//new type

if (isset($_POST['addType'])) {
    $newType = $_POST['newType'];
    $stmt = $conn->prepare("INSERT INTO Type (type) VALUES ('$newType')");
    $autoincrement = $conn->prepare("ALTER TABLE Type AUTO_INCREMENT =1;");
    $autoincrement->execute();
    $stmt->execute();
}

//new voorziening

if (isset($_POST['addVoorziening'])) {
    $newVoorziening = $_POST['newVoorziening'];
    $stmt = $conn->prepare("INSERT INTO Voorzieningen (voorzieningen) VALUES ('$newVoorziening')");
    $autoincrement = $conn->prepare("ALTER TABLE Voorzieningen AUTO_INCREMENT =1;");
    $autoincrement->execute();
    $stmt->execute();
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

<div class="aanmaakpagina">

<form class="formsborder" method="post" action="" enctype="multipart/form-data">
    Naam: <br><input type="text" name="naam" required><br>
    Prijs: <br><input type="text" name="prijs" required><br><br>
    Foto: (Let op verhouding is 2:1)<br><input type="file" name="foto" accept="image/*" required><br><br>

    Type:
    <br><select name="type">
        <?php
        $result = $conn->query("SELECT * FROM Type");
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['idType'] . "'>" . $row['type'] . "</option>";
        }
        ?>
    </select><br><br>

    Voorzieningen:
    <br>
    <?php
    $result = $conn->query("SELECT * FROM Voorzieningen");
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<input type='checkbox' name='voorzieningen[]' value='" . $row['idVoorzieningen'] . "'>" . $row['voorzieningen'] . "<br>";
    }
    ?>

    <br><input class="formsbutton" type="submit" name="submit" value="Toevoegen">
    <?php if (isset($_POST['submit'])) {echo "Bungalow toegevoegd!";} sleep(1); header("location:bungalowcreate.php")?> 
</form>

<form class="formsborder" method="post" action="">
    Nieuw Type: <input type="text" name="newType" required>
    <input class="formsbutton" type="submit" name="addType" value="Toevoegen">
    <?php if (isset($_POST['addType'])) {echo "Type toegevoegd!";} sleep(1); header("location:bungalowcreate.php")?>
</form>

<form class="formsborder" method="post" action="">
    Nieuwe Voorziening: <input type="text" name="newVoorziening" required>
    <input class="formsbutton" type="submit" name="addVoorziening" value="Toevoegen">
    <?php 
    if (isset($_POST['addVoorziening'])) {echo "Voorziening toegevoegd!";} sleep(1); header("location:bungalowcreate.php")?>
    </form>

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