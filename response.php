<?php
include('db.php');
session_start();

try{

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



 