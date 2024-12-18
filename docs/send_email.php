<?php
// Include the PHPMailer class
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->SMTPDebug = 3;  // Disable debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'saivamsidudigam@gmail.com';  // Your Gmail address
        $mail->Password = 'xozd rfwj tcct cjmt';  // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient
        $mail->setFrom('saivamsidudigam@gmail.com', 'Test Sender');
        $mail->addAddress('saivamsidudigam@gmail.com', 'Test Recipient');  // Replace with recipient email

        // Email subject and body
        $mail->Subject = 'New Message from Contact Form';
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Body = "You have received a new message from $name ($email).<br><br>Message: $message";

        // Send the email
        if ($mail->send()) {
            echo 'Message has been sent successfully.';
        } else {
            echo 'Message could not be sent.';
        }
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>
