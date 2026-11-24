<?php
session_start();
?>

<div class="body_signup_col">
    <div></div>
    <div class="body_main">
        <form action="signup_page_contact" method="post" class="body_signup_form">
            <p><input placeholder="Jon" type="text" name="first_name" class="body_signup_box" required></p>
            <p><input placeholder="New" type="text" name="last_name" class="body_signup_box" required></p>
            <p><input placeholder="Username" type="text" name="username" class="body_signup_box" required></p>
            <p><input placeholder="Password" type="password" name="password" class="body_signup_box" required></p>
            <input type="submit" value="Continue">
            
        </form>
    </div>
    <div></div>
</div>
