<?php
session_start();
require_once "../includes/db.php";


$sql = "SELECT is_admin FROM users where username => :user";

$stmt = $pdo->prepare($sql):

$stmt->execute([":user"=>$_SESSION["username"]]);

$admin = $pdo->fetch(PDO::FETCH_ASSOC);
?>