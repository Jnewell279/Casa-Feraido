<?php
require_once "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(preg_match("/^[\p{L}\s'-]{1,255}$/u", $first_name)){
        if(preg_match("/^[\p{L}\s'-]{1,255}$/u", $last_name)){
            if(preg_match("/^[\p{L}\s'-]{6,255}$/u", $username)){
                if(preg_match("/^[\p{L}\s'-]{6,255}$/u", $password)){

                    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users(first_name, last_name, username, password) VALUES (:first_name ,:last_name ,:user ,:password)";

                    $stmt = $pdo->prepare($sql);

                    $stmt->execute([
                        ":first_name" => $first_name,
                        ":last_name" => $last_name,
                        ":user" => $username,
                        ":password" => $password
                    ]);
    }else{
        echo "This is not an allowed password";
    }
    }else{
        echo "This is not an allowed username";
    }
    }else{
        echo "Your name cannot contain numbers";
    }
    }else{
        echo "Your name cannot contain numbers";
    }

        
    }
?>