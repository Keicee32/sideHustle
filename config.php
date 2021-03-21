<?php session_start();

$servername = "remotemysql.com";
$db_name = "Izb9Cb3AEl";
$username = "Izb9Cb3AEl";
$password = "BxgMxaKm8v";

try{
    $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $db_name, $username, $password);
}catch(PDOException $e){
    echo "Connection Error: " . $e->getMessage();
}
