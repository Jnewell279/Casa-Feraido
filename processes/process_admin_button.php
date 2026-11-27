<?php
$sql = "SELECT is_admin FROM users where username = :user";

$stmt = $pdo->prepare($sql);

$stmt->execute([":user"=>$_SESSION["username"]]);

$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if($admin == "Admin"){
    echo"<button class='nav_button'>Admin</button>";
}
else{
    echo"this is not working because of sesssion";
}
?>