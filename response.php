<?php
$user = "agatat_user";
$pass = "d@t@b@se123";
$hostname = "agatat-schooldatabse.db.transip.me";
$dbname = "agatat_schooldatabse";


try{
    $conn = new PDO("mysql:host={$hostname};dbname={$dbname};port=3306", $user, $pass);
    echo "Connection succesfully!";
    include("index.html");
}
catch(PDOExeption $e) {
    echo "Connection failed!: ";
}
 
