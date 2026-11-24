<?php
session_start();
?>

<div class="body_signup_col">
    <div></div>
    <div class="body_main">
        <form action="processes/process_signup_contact.php" method="post" class="body_signup_form">
            <p><input placeholder="07123 456789" type="integer" name="phone_number" class="body_signup_box" required></p>
            <p><input placeholder="Email@email.com" type="text" name="email" class="body_signup_box" required></p>
            <input type="submit" value="Continue">
            
        </form>
    </div>
    <div></div>
</div>