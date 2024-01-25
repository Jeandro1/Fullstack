<?php
include('db.php');
session_start();

try{
<<<<<<< Updated upstream

//bungalows, voorzieningen en online toevoegen---------------------------------------------------------------------------------------    

//bungalows
if(isset($_POST["createBungalow"])){
    $naamBungalow = $_REQUEST["naamBungalow"];
    $typeBungalow = $_REQUEST["typeBungalow"];
    $sqlbungalow = $conn->prepare("INSERT INTO bungalows (naam, bungalowtype)
            VALUES ('$naamBungalow', '$typeBungalow')");
    $autoincrement = $conn->prepare("ALTER TABLE bungalows AUTO_INCREMENT =1;");        
    $autoincrement->execute();
    $sqlbungalow->execute();
    echo "Added new bungalow successfully";
    echo '<br>' . '<a href="index.php">Naar de aanmaak pagina</a>';
    sleep(2);
    header("location:bungalow.php");
}

//voorzieningen
if(isset($_POST["createVoorziening"])){
    $naamVoorziening = $_REQUEST["naamVoorziening"];
    $sqlvoorziening = $conn->prepare("INSERT INTO voorzieningen (voorziening, idBungalow_voorzieningen)
            VALUES ('$naamVoorziening', '0')");
    $autoincrement = $conn->prepare("ALTER TABLE voorzieningen AUTO_INCREMENT =1;");
    $autoincrement->execute();
    $sqlvoorziening->execute();
    echo "Added new voorziening successfully";
    echo '<br>' . '<a href="index.php">Naar de aanmaak pagina</a>';
    sleep(2);
    header("location:bungalow.php");

}

//online zetten
if(isset($_POST["addBungalow"])){
    $prijsBungalow = $_REQUEST["prijsBungalow"];
    $naamOnline = $_REQUEST["naamOnline"];
    $sqlonlineb = $conn->prepare("UPDATE bungalows SET prijs='$prijsBungalow' WHERE naam = '$naamOnline'");
    $sqlonlineb->execute();

//---------------------------------------------------------------------

    $vSth = $conn->prepare("SELECT * FROM voorzieningen");
    $vSth->execute();
    $vCount = $vSth->rowCount();

    $idSth = $conn->prepare("SELECT idBungalow FROM bungalows WHERE naam = '$naamOnline'");
    $idSth->execute();
    $xidSth = $idSth->fetch();
    $idBungalow = $xidSth["idBungalow"];

    for ($i = 0; $i <= $vCount; $i++) {
        $xvSth = $conn->prepare("SELECT * FROM voorzieningen WHERE idVoorziening = '$i'");
        $xvSth->execute();
        $xxvSth = $xvSth->fetch();
        $voorzieningnaam = $_REQUEST["voorzieningenBungalow$i"];

        if(isset($_POST["voorzieningenBungalow$i"])){
            $sqlonlinev = $conn->prepare("INSERT INTO voorzieningen (voorziening, idBungalow_voorzieningen)
            SELECT voorziening, '$idBungalow' FROM voorzieningen WHERE voorziening = '$voorzieningnaam'");
            $autoincrement = $conn->prepare("ALTER TABLE voorzieningen AUTO_INCREMENT =1;");
            $autoincrement->execute();
            $sqlonlinev->execute();
        }
=======
    $conn = new PDO("mysql:host={$hostname};dbname={$dbname};port=3306", $u, $p);

//login----------------------------------------------------------------------------------------

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

//registratie---------------------------------------------------------------------------------------

    if(isset($_POST["registreer"])){
        if(empty($_POST["voornaam"]) || empty($_POST["achternaam"]) || empty($_POST["straat"]) || empty($_POST["huisnummer"]) || empty($_POST["plaats"]) || empty($_POST["email"]) || empty($_POST["telefoonnummer"]) || empty($_POST["wachtwoord"]) || empty($_POST["herhaalWachtwoord"])){
            echo "Alle velden moeten worden ingevuld!";
            echo '<br>' . '<a href="register.php">Terug naar het formulier</a>';
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
                $sql = $conn->prepare("INSERT INTO users (voornaam, tussenvoegsels, achternaam, straat, huisnummer, toevoeging, plaats, email, telefoonnummer, wachtwoord)
                        VALUES ('$voornaam', '$tussenvoegsels', '$achternaam', '$straat', '$huisnummer', '$toevoeging', '$plaats', '$email', '$telefoonnummer', '$wachtwoord')");
                $sql->execute();
                echo "New account created successfully";
                echo '<br>' . '<a href="login.php">Naar de inlogpagina</a>';
                sleep(2);
                header("location:account.php");

            }
            else{
                echo "Wachtwoorden komen niet overeen!";
                echo '<br>' . '<a href="register.php">Terug naar het formulier</a>';

            }
        }
    }

//account verwijderen--------------------------------------------------------------------------------------

    if(isset($_POST["delete"])){
        $emaildelete = $_SESSION["email"];
        $sqldelete = $conn->prepere("DELETE FROM users WHERE email = '$emaildelete'");      
        $sqldelete->execute();
        echo "Account deleted successfully";
        echo '<br>' . '<a href="register.php">Naar de inlogpagina</a>';
        sleep(2);
        header("location:login.php");
    }    

//bungalows, voorzieningen en online toevoegen---------------------------------------------------------------------------------------    

//bungalows
if(isset($_POST["createBungalow"])){
    $naamBungalow = $_REQUEST["naamBungalow"];
    $typeBungalow = $_REQUEST["typeBungalow"];
    $sqlbungalow = $conn->prepare("INSERT INTO bungalows (naam, bungalowtype)
            VALUES ('$naamBungalow', '$typeBungalow')");
    $autoincrement = $conn->prepare("ALTER TABLE bungalows AUTO_INCREMENT =1;");        
    $autoincrement->execute();
    $sqlbungalow->execute();
    echo "Added new bungalow successfully";
    echo '<br>' . '<a href="index.php">Naar de aanmaak pagina</a>';
    sleep(2);
    header("location:bungalow.php");
}

//voorzieningen
if(isset($_POST["createVoorziening"])){
    $naamVoorziening = $_REQUEST["naamVoorziening"];
    $sqlvoorziening = $conn->prepare("INSERT INTO voorzieningen (voorziening, idBungalow_voorzieningen)
            VALUES ('$naamVoorziening', '0')");
    $autoincrement = $conn->prepare("ALTER TABLE voorzieningen AUTO_INCREMENT =1;");
    $autoincrement->execute();
    $sqlvoorziening->execute();
    echo "Added new voorziening successfully";
    echo '<br>' . '<a href="index.php">Naar de aanmaak pagina</a>';
    sleep(2);
    header("location:bungalow.php");

}

//online zetten
if(isset($_POST["addBungalow"])){
    $prijsBungalow = $_REQUEST["prijsBungalow"];
    $naamOnline = $_REQUEST["naamOnline"];
    $sqlonlineb = $conn->prepare("UPDATE bungalows SET prijs='$prijsBungalow' WHERE naam = '$naamOnline'");
    $sqlonlineb->execute();

//---------------------------------------------------------------------

    $vSth = $conn->prepare("SELECT * FROM voorzieningen");
    $vSth->execute();
    $vCount = $vSth->rowCount();

    $idSth = $conn->prepare("SELECT idBungalow FROM bungalows WHERE naam = '$naamOnline'");
    $idSth->execute();
    $xidSth = $idSth->fetch();
    $idBungalow = $xidSth["idBungalow"];

    for ($i = 0; $i <= $vCount; $i++) {
        $xvSth = $conn->prepare("SELECT * FROM voorzieningen WHERE idVoorziening = '$i'");
        $xvSth->execute();
        $xxvSth = $xvSth->fetch();
        $voorzieningnaam = $_REQUEST["voorzieningenBungalow$i"];

        if(isset($_POST["voorzieningenBungalow$i"])){
            $sqlonlinev = $conn->prepare("INSERT INTO voorzieningen (voorziening, idBungalow_voorzieningen)
            SELECT voorziening, '$idBungalow' FROM voorzieningen WHERE voorziening = '$voorzieningnaam'");
            $autoincrement = $conn->prepare("ALTER TABLE voorzieningen AUTO_INCREMENT =1;");
            $autoincrement->execute();
            $sqlonlinev->execute();
        }
>>>>>>> Stashed changes
    } 
    
    $imageData = mysql_real_escape_string(file_get_contents($_FILES["fotoBungalow"]["tmp_name"]));
    echo $imageData;

//---------------------------------------------------------------------

    echo "Added new bungalow to online page successfully";
    echo '<br>' . '<a href="index.php">Naar de reserveer pagina</a>';
    sleep(2);
    header("location:bungalow.php");

}

}
catch(PDOExeption $e) {
    echo "Connection failed!";
}



 