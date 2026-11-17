<?php
$host="localhost";
$db_name="casa_feraido";
$db_pass="";
$db_user="root";

$dsn = "mysql:host=$host; db_name=$db_name; charset=utf8mb4";

try{
    $pdo= new PDO( $host, $db_name, $db_pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}catch(PDOException $e){
    echo "Connection Failed <br> <br>";
}
?>