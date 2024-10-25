<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Require the PHPMailer files
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Initialize PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';              // Specify SMTP server
        $mail->SMTPAuth   = true;                               // Enable SMTP authentication
        $mail->Username   = 'mamadoudjeiladiallo@gmail.com';           // SMTP username
        $mail->Password   = 'your-email-password';              // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;     // Enable TLS encryption
        $mail->Port       = 587;                                // TCP port for connection

        // Recipient and sender info
        $mail->setFrom('your-email@example.com', 'Your Website');
        $mail->addAddress('mamadoudjeiladiallo@gmail.com');      // Your email address to receive messages

        // Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<h3>New message from $name ($email)</h3><p>$message</p>";

        // Send email
        $mail->send();
        echo 'Message has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
