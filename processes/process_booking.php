<?php
session_start();
require_once "../includes/db.php";

function redirectWithError($msg, $type='error'){
    $_SESSION['message'] = $msg;
    $_SESSION['msg_type'] = $type;
    header("location: ../booking.php");
    exit();
}
function redirectOnSuccess(){
    header("location: ../success page");
    exit();
}


if($_SERVER["REQUEST_METHOD"] === "POST"){

    $house_name = $_POST["house_name"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];

    $num_adult = $_POST["num_adult"];
    $num_child = $_POST["num_child"];
    $fisrt = $_POST["first_name"];
    $last = $_POST["last_name"];
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $phone_num = $_POST["phone_number"];
    
$str_list_names =["House name","First name", "Last name"];
$int_list_names =["Number of adults", "Number of children", "Phone number"];

$str_list_var =[$house_name, $fisrt, $last,];
$int_list_var =[$num_adult, $num_child, $phone_num];

$count = 0;
/*      declares validation ^ and $ match to the entire entered string
                    rejects jut whitespace inputs
                             allow inputs from multiple language including space's apostrophes and hyphens
                                        has to be withing this length
                                                enables unicode matching*/
    foreach($str_list_var as $row){
        $count+=1;
        if(preg_match("/^(?!\s+$)[\p{L}\s'-]{1,255}$/u", $row)){
            echo $row. "<br>";
        }else{
            /*redirectWithError("Your ". $int_list_name[$count-1]. " is one of the following: Not entered, Contains an invalid character or is outside the allowed range of characters allowed.");*/
        }
    }
    foreach($int_list_var as $row){
        if(preg_match("/^(?!\s+$)[\p{L}0-9]{1,15}$/u", $row)){
            echo $row. "<br>";
        }else{
            /*redirectWithErr or("Your". $int_list_name[$count-1]. "is one of the following: Not entered, Contains an invalid character or is outside the allowed range of characters allowed.");*/
        }
    }

    $sql_date ="SELECT start_date, end_date FROM bookings";

    $stmt_date = $pdo->prepare($sql_date);

    $stmt_date->execute([]);

    $bookings = $stmt_date->fetchAll(PDO::FETCH_ASSOC);

    foreach ($bookings as $row) {
    echo "Start: " . $row['start_date'] . " - End: " . $row['end_date'] . "<br>";
    }

}
?>