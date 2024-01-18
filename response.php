<?php
session_start();
$u = "agatat_user";
$p = "d@t@b@se123";
$hostname = "agatat-schooldatabse.db.transip.me";
$dbname = "agatat_schooldatabse";

try{
    $conn = new PDO("mysql:host={$hostname};dbname={$dbname};port=3306", $u, $p);
    if(isset($_POST["login"])){
        if(empty($_POST["email"]) || empty($_POST["wachtwoord"])){
            echo "alle velden moeten worden ingevuld!";
        }
        else{
            $query = "SELECT * FROM users WHERE email = :email AND wachtwoord = :wachtwoord";
            $statement = $conn->prepare($query);
            $statement->execute(array(
                'email' => $_POST["email"], 
                'wachtwoord' => $_POST["wachtwoord"]
            ));
            $count = $statement->rowCount();
            if($count > 0){
                $_SESSION["email"] = $_POST["email"];
                header("location:account.php");
            }
            else{
                echo "fout ingevuld!";
            }
        }
    }
    if(isset($_POST["registreer"])){
        if(empty($_POST["voornaam"]) || empty($_POST["achternaam"]) || empty($_POST["straat"]) || empty($_POST["huisnummer"]) || empty($_POST["plaats"]) || empty($_POST["email"]) || empty($_POST["telefoonnummer"]) || empty($_POST["wachtwoord"]) || empty($_POST["herhaalWachtwoord"])){
            echo "alle velden moeten worden ingevuld!";
            echo '<br>' . '<a href="register.php">Terug naar het formulier</a>';
        }
        else{
            if($_POST["herhaalWachtwoord"] == $_POST["wachtwoord"]){
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
                $sql = "INSERT INTO users (voornaam, tussenvoegsels, achternaam, straat, huisnummer, toevoeging, plaats, email, telefoonnummer, wachtwoord)
                        VALUES ('$voornaam', '$tussenvoegsels', '$achternaam', '$straat', '$huisnummer', '$toevoeging', '$plaats', '$email', '$telefoonnummer', '$wachtwoord')";
                $conn->exec($sql);
                echo "New account created successfully";
                echo '<br>' . '<a href="login.php">Naar de inlogpagina</a>';

            }
            else{
                echo "Wachtwoorden komen niet overeen!";
                echo '<br>' . '<a href="register.php">Terug naar het formulier</a>';

            }
        }
    }
    if(isset($_POST["delete"])){
        $emaildelete = $_SESSION["email"];
        $sqldelete = "DELETE FROM users WHERE email = '$emaildelete'";      
        $conn->exec($sqldelete);
        echo "Account deleted successfully";
        echo '<br>' . '<a href="register.php">Naar de inlogpagina</a>';
    }    
    
}
catch(PDOExeption $e) {
    echo "Connection failed!";
}



 