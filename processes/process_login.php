<?php
session_start();

function redirectBecauseError($msg, $type = 'error') {
    $_SESSION['message'] = $msg;
    $_SESSION['msg_type'] = $type;
    header("location: ../login_page.php");
    exit();
}
function redirectOnSuccess($msg, $type='error') {
    header("location: ../index.php");
    exit();
}

require_once "../includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $user = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username=:user";
    $hash = "SELECT password FROM users WHERE username =:user";

    if($pass_hash = password_verify($pass, $hash)){
        $stmt = $pdo ->prepare($sql);

        $stmt -> execute([
            ":user" => $user
        ]);
        redirectOnSuccess('You have been successfully loged in.');
    }/*else{
        redirectBecauseError("This is the wrong password please re enter your details");
    }*/

    
}

?>