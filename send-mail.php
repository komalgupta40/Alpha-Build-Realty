<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@alphabuildrealty.com';
        $mail->Password = 'Build@#6789';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender
        $mail->setFrom('info@alphabuildrealty.com', 'Website Enquiry');

        // Send to BOTH emails
        $mail->addAddress('info@alphabuildrealty.com');
        $mail->addAddress('alphabuildrealty@gmail.com');

        // Content
        $mail->Subject = 'New Enquiry';
        $mail->Body = "Name: $name\nEmail: $email\nPhone: $phone";

        $mail->send();

    echo "<script>
alert('✅ Mail Sent Successfully');
window.location.href='4-bhk-flats-in-dehradun.php';
</script>";

    } catch (Exception $e) {
        echo "❌ Error: {$mail->ErrorInfo}";
    }
}
?>