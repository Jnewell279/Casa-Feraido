<?php

function redirectBecauseError($msg, $type = 'error') {
    $_SESSION['message'] = $msg;
    $_SESSION['msg_type'] = $type;
    header("Location: ../login_page.php");
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
    }else{
        redirectBecauseError("This is the wrong password please re renter your details");
    }

    
}

?>