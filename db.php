<?php
session_start();
$u = "agatat_user";
$p = "d@t@b@se123";
$hostname = "agatat-schooldatabse.db.transip.me";
$dbname = "agatat_schooldatabse";

$conn = new PDO("mysql:host={$hostname};dbname={$dbname};port=3306", $u, $p);

?>