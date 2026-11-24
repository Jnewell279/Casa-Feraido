<?php
session_start();

$_SESSION['user_data'] = $_POST;
?>

<div class="body_signup_col">
    <div></div>
    <div class="body_main">
        <form action="signup_page_address.php" method="post" class="body_signup_form">
            <p><input placeholder="+44 7123 456789" type="text" name="phone_number" class="body_signup_box" required></p>
            <p><input placeholder="Email@email.com" type="text" name="email" class="body_signup_box" required></p>
            <input type="submit" value="Continue">
            
        </form>
    </div>
    <div></div>
</div>