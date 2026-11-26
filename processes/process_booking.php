<?php
session_start();



if($_SERVER["REQUEST_METHOD"] === "POST"){

    $house_name = $_POST["house_name"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];

    $num_adult = $_POST["num_adult"];
    $num_child = $_POST["num_child"];
    $fisrt = $_POST["first_name"];
    $last = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_num = $_POST["phone_number"];
    
$str_list_names =["House name","First name", "Last name"];
$int_list_names =["Number of adults", "Number of children", "Phone number"];

$str_list_var =[$house_name, $fisrt, $last,];
$int_list_var =[$num_adult, $num_child, $phone_num];
/*      declares validation ^ and $ match to the entire entered string
                    rejects jut whitespace inputs
                             allow inputs from multiple language including space's apostrophes and hyphens
                                        has to be withing this length
                                                enables unicode matching*/
    foreach($str_list_var as $row){
        if(preg_match("/^(?!\s+$)[\p{L}\s'-]{1,255}$/u", $row)){
            echo $row. "<br>";
        }
    }
    foreach($int_list_var as $row){
        if(preg_match("/^(?!\s+$)[\p{L}0-9]{1,15}$/u", $row)){
            echo $row. "<br>";
        }else{
            echo "this not";
        }
    }
}
?>