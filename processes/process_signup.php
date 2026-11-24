<?php
session_start();
require_once "../includes/db.php";

function redirectWithMessage($msg, $type = 'error') {
    $_SESSION['message'] = $msg;
    $_SESSION['msg_type'] = $type;
    header("Location: ../signup_page.php");
    exit();
}

function redirectFromSuccess(){
    header("location: ../profile_page.php");
    exit();
}
/*come back to make it keep information and label the errors */
if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(preg_match("/^[\p{L}\s'-]{1,255}$/u", $first_name)){
        if(preg_match("/^[\p{L}\s'-]{1,255}$/u", $last_name)){
            if(preg_match("/^[\p{L}\s'-0-9]{6,255}$/u", $username)){
                if(preg_match("/^[\p{L}\s'-0-9]{6,255}$/u", $password)){

                    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users(first_name, last_name, username, password) VALUES (:first_name ,:last_name ,:user ,:password)";

                    $stmt = $pdo->prepare($sql);

                    $stmt->execute([
                        ":first_name" => $first_name,
                        ":last_name" => $last_name,
                        ":user" => $username,
                        ":password" => $pass_hash
                    ]);
                    /*redirectFromSuccess("You have been successfully signed up"); /*needs to be redirected to a profiles page */
    }else{
        redirectWithMessage("Your password does not meet the required number of characters.");
    }
    }else{
        redirectWithMessage("Your username does not meet the required number of characters.");
    }
    }else{
        redirectWithMessage("Your last name contains invalid characters.");
    }
    }else{
        redirectWithMessage("Your first name contains invalid characters.");
    }

        
    }
    
echo $string = implode(', ', $_SESSION['user_data']);
?>
