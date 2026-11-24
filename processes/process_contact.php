<?php 
session_start(); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Strip newlines to prevent header injection and trim whitespace
    $first = trim(str_replace(["\r", "\n"], '', $_POST['first_name'] ?? ''));
    $last  = trim(str_replace(["\r", "\n"], '', $_POST['last_name'] ?? ''));
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $content = $_POST['content'] ?? '';

    if ($email && !empty($content)) {
        $subject = "Message from " . $first . " " . $last;
        $message = wordwrap($content, 70);
        
        // Replace with a valid domain address from your server
        $headers = "From: webmaster@yourdomain.com\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";

        if (mail($email, $subject, $message, $headers)) {
            echo "Email sent successfully.";
        } else {
            echo "Mail server failed to send the email.";
        }
    } else {
        echo "Please provide a valid email address and message.";
    }
}
?>
