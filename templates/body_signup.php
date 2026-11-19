<div class="body_signup_col">
    <div></div>
    <div class="body_main">
        <form action="processes/process_signup.php" method="post" class="body_signup_form">
            <p><input placeholder="Jon" type="text" name="first_name" class="body_signup_box"></p>
            <p><input placeholder="New" type="text" name="last_name" class="body_signup_box"></p>
            <p><input placeholder="Username" type="text" name="username" class="body_signup_box"></p>
            <p><input placeholder="Password" type="password" name="password" class="body_signup_box"></p>
            <p><input list="is_admin" placeholder="Are you an Admin?" class="body_signup_box">
            <dataset id="is_admin">
                <option value="Yes">
                <option value="No">
            </dataset></p>
            <input type="submit" value="Sign up">
        </form>
    </div>
    <div></div>
</div>