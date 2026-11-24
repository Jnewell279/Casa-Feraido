<?php
session_start();
require_once "../includes/db.php";

function redirectWithMessage($msg, $type = 'error') {
    $_SESSION['message'] = $msg;
    $_SESSION['msg_type'] = $type;
    header("Location: ../signup_page_address.php");
    exit();
}

function redirectFromSuccess(){
    header("location: ../profile_page.php");
    exit();
}
/*come back to make it keep information and label the errors */
if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $country = $_POST["country"];
    $region = $_POST["region"];
    $city = $_POST["city"];
    $town = $_POST["town"];

    if(preg_match("/^(?!\s+$)[\p{L}\s'-]{1,255}$/u", $country)){
        if(preg_match("/^(?!\s+$)[\p{L}\s'-]{1,255}$/u", $region)){
            if(preg_match("/^(?!\s+$)[\p{L}\s'-]{1,255}$/u", $city)){
                if(preg_match("/^(?!\s+$)[\p{L}\s'-]{1,255}$/u", $town)){

                    $sql = "INSERT INTO addresses(country, region, city, town) VALUES (:country, :region, :city, :town)";

                    $stmt = $pdo->prepare($sql);

                    $stmt->execute([
                        ":country" => $country,
                        ":region" => $region,
                        ":city" => $city,
                        ":town" => $town
                    ]);
                    redirectFromSuccess("You have been successfully signed up");
    }/**/else{
        redirectWithMessage("You failed.");
    }
    }else{
        redirectWithMessage("You failed.");
    }
    }else{
        redirectWithMessage("You failed.");
    }
    }else{
        redirectWithMessage("You failed.");
    }

        
    }
?>
