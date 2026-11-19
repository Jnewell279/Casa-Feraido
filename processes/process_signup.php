<?php
require_once "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password", PASSWORD_DEFAULT]);/*might need to be moved */

    if(preg_match("/^[a-zA-Z0-9]{0-255}$/", $first_name)){

    }

        $sql = "INSERT INTO users(firstname, lastname, username, password) VALUES (:first_name ,:last_name ,:user ,:password)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":first_name" => $first_name,
            ":last_name" => $last_name,
            ":user" => $username,
            ":password" => $password
        ]);
    }
?>