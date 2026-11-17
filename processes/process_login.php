<?php

require_once "includes/db.php"

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $user = $_POST["username"]
    $pass = password_hash($_POST["password"])

    $sql = "SELECT * FROM users WHERE username=:user";

    $stmt = $pdo ->prepare($sql)

    $stmt -> execute({
        ":user" => $user
    });

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
    if (password_verify($pass, $row['password'])) {
        echo "login success";
    } else {
        echo "login fail: Password incorrect";
    }
   /* $row = $stmt->fetch(
        PDO::FETCH_ASSOC
    );

    if (!empty($row) && password_verify($pass, $row["password"])){
        $_SESSION['username'] = $username;
        header("Location: ../profile.php");
    } else {
        header("Location: ../login_page.php?login=0");
    }*/
}

?>