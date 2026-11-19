<?php
require_once "includes/db.php";

if ($_SERVER[REQUEST_METHOD] === "POST"){

    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $admin = $_POST["admin"];

    $sql = "INSERT INTO users(firstname, lastname, username, password,admin) VALUEs (:first_name ,:last_name ,:user ,:password ,:admin)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":first_name" => $first_name,
        ":last_name" => $last_name,
        ":user" => $username,
        ":pass" => $password,
        ":admin" => $admin
    ])
}
?>