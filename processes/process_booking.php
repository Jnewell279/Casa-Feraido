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
    $first = $_POST["first_name"];
    $last = $_POST["last_name"];
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $phone_num = $_POST["phone_number"];
    
    $str_list_names =["House name","First name", "Last name"];
    $int_list_names =["Number of adults", "Number of children", "Phone number"];

    $str_list_var =[$house_name, $first, $last,];
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
        }else{
            /*redirectWithError("Your ". $int_list_name[$count-1]. " is one of the following: Not entered, Contains an invalid character or is outside the allowed range of characters allowed.");*/
        }
    }
    foreach($int_list_var as $row){
        if(preg_match("/^(?!\s+$)[\p{L}0-9]{1,15}$/u", $row)){
        }else{
            /*redirectWithErr or("Your". $int_list_name[$count-1]. "is one of the following: Not entered, Contains an invalid character or is outside the allowed range of characters allowed.");*/
        }
    }

    $sql_property = "SELECT property_id FROM properties WHERE house_name=:house_name";

    $stmt_property = $pdo->prepare($sql_property);

    $stmt_property->execute([':house_name' => $house_name]);
    
    $house_id = $stmt_property->fetch(PDO::FETCH_ASSOC);

    if ($house_id) {
    $house_id = $house_id['property_id'];
    }


    $sql_date ="SELECT start_date, end_date, date_range FROM bookings WHERE property_id = :house_id";


    $stmt_date = $pdo->prepare($sql_date);

    $stmt_date->execute([":house_id" => $house_id]);

    $bookings = $stmt_date->fetchAll(PDO::FETCH_ASSOC);

    $start_day = (new DateTimeImmutable($start_date))->format('d');
    $end_day = (new DateTimeImmutable($end_date))->format('d');
    $day_range = $end_day - $start_day;

    foreach($bookings as $bookings){
        if($bookings["start_date"] ==""){
            $sql = "INSERT INTO bookings(house_name, start_date, end_date, date_range, num_adult, num_child, first_name, last_name, email, phone_number)
            VALUES (:house, :start, :end, :days, :adults, :children, :first, :last, :email, :phone)";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ":house" => $house_name,
                ":start" => $start_date,
                ":end" => $end_date,
                ":days" => $day_range,
                ":adults" => $num_adult,
                ":children" => $num_child,
                ":first" => $first,
                ":last" => $last,
                ":email" => $email,
                ":phone" => $phone_num
            ]);
        }else{
            echo "no somebody else is there";
        }
    }
}
?>