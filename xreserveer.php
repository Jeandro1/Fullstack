<?php
session_start();
$user = "agatat_user";
$pass = "d@t@b@se123";
$hostname = "agatat-schooldatabse.db.transip.me";
$dbname = "agatat_schooldatabse";

try{
    $conn = new PDO("mysql:host={$hostname};dbname={$dbname};port=3306", $user, $pass);
    if(isset($_POST["submit"])){
            $datumboeking = date();
            $bungalow = $_POST["bungalow"];
            $aankomst = $_POST["aankomst"];
            $vertrek = $_POST["vertrek"];
            $aantalgasten = $_POST["aantalgasten"];
            $gastenid = 5;
            $sql = "INSERT INTO Reserveringen (datum, bungalow, aankomst, vertrek, Gasten_idGast)
                    VALUES ('$datumboeking', '$bungalow', '$aankomst', '$vertrek', '$aantalgasten', '$gastenid')";
            $conn->exec($sql);
            echo "Reservering succesfol geplaatst!";
    }
}
catch(PDOExeption $e) {
    echo "Connection failed!";
}
