<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST["subject"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);
    
    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Set up email parameters
    $to = "info@blakkatz.art"; // Change this to your email
    $full_subject = "Contact Form: " . $subject;
    $full_message = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\r\n"; // Use the user's email as the sender

    // Send email
    if (mail($to, $full_subject, $full_message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message. Please try again.";
    }
}
?>
