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

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = trim($_POST["username"] ?? '');
    $pass = $_POST["password"] ?? '';

    if (empty($user) || empty($pass)) {
        redirectBecauseError("Please enter both a username and password.");
    }

    // 1. Fetch the user row from the database FIRST
    $sql = "SELECT * FROM users WHERE username = :user LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":user" => $user]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // 2. Check if the user exists AND verify the password against the database column
    if ($row && password_verify($pass, $row['password'])) {
        
        // 3. Store user info in the session so other pages know they are logged in
        session_regenerate_id(true); // Prevents session fixation attacks
        $_SESSION['user_id'] = $row['id']; // Change 'id' if your primary key is named differently
        $_SESSION['username'] = $row['username'];

        redirectOnSuccess('You have been successfully logged in.');
    } else {
        redirectBecauseError("Incorrect username or password. Please try again.");
    }
}
?>