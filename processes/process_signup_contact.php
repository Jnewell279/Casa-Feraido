<?php
session_start();
require_once "../includes/db.php";

function redirectWithMessage($msg, $type = 'error') {
    $_SESSION['message'] = $msg;
    $_SESSION['msg_type'] = $type;
    header("Location: ../signup_page_contact.php");
    exit();
}

function redirectFromSuccess(){
    header("location: ../signup_page_address.php");
    exit();
}
/*come back to make it keep information and label the errors */
if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $phone_number = $_POST["phone_number"];

    if(preg_match("/^(?!\s+$).{5,255}$/u", $email)){
        if(preg_match("/^(?!\s+$)[0-9]{6,255}$/u", $phone_number)){

            $sql = "INSERT INTO contact(email, phone_number) VALUES (:email, :phone_number)";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ":email" => $email,
                ":phone_number" => $phone_number
            ]);
            redirectFromSuccess("You have been successfully signed up");
    }else{
        redirectWithMessage("Your phone number does not meet the required number of characters.");
    }
    }else{
        redirectWithMessage("Your email does not meet the required standard.");
    }
    

        
    }
?>
