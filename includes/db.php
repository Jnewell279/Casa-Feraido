<?php
$host="localhost";
$db_name="casa_feraido";
$db_pass="";
$db_user="root";

$dsn = "mysql:host=$host; dbname=$db_name; charset=utf8mb4";

try{
    $pdo= new PDO( $dsn, $db_user, $db_pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}catch(PDOException $e){
    echo "Connection Failed <br> <br>";
}
?>