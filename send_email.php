<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $to = "mamadoudjeiladiallo@gmail.com";  // Your email
    $subject = "New Message from Contact Form";

    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email content
    $body = "You have received a new message from your website contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send email
    if(mail($to, $subject, $body, $headers)){
        echo "Message sent successfully.";
    } else {
        echo "Failed to send message.";
    }
}
?>

