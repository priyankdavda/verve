<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// 1. Check request method
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: contact.php");
    exit;
}

// 2. Database connection

//local
// $conn = mysqli_connect("localhost", "root", "", "verveinfosystem");
// if (!$conn) {
//     die("Database connection failed");
// }
//live
$conn = mysqli_connect("localhost", "verveinf1_verveinfouser", "Verveinfouser@123", "verveinf1_verveinfosystem");
if (!$conn) {
    die("Database connection failed");
}
// 3. Get & sanitize form data
$name         = htmlspecialchars(trim($_POST['name']));
$email        = htmlspecialchars(trim($_POST['email']));
$subject      = htmlspecialchars(trim($_POST['subject']));
$phone        = htmlspecialchars(trim($_POST['phone']));
$inquiry_type = htmlspecialchars(trim($_POST['inquiry_type']));
$message      = htmlspecialchars(trim($_POST['message']));

// 4. Validation
if (empty($name) || empty($email) || empty($subject) || empty($phone) || empty($inquiry_type)) {
    die("All required fields are mandatory.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

// 5. Save into database
$sql = "INSERT INTO contact_us 
        (name, email, subject, phone, inquiry_type, message) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $subject, $phone, $inquiry_type, $message);
mysqli_stmt_execute($stmt);

// 6. Send email using PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP config (GMAIL)
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'davdapriyank3883@gmail.com';     
    $mail->Password   = 'jkev vfcp nidn vdmx';        
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Email setup
    $mail->setFrom('davdapriyank3883@gmail.com', 'Website Contact');
    $mail->addAddress('davdapriyank3883@gmail.com');

    $mail->Subject = "New Contact Inquiry - $inquiry_type";
    $mail->Body    = "
Name: $name
Email: $email
Phone: $phone
Inquiry Type: $inquiry_type
Subject: $subject

Message:
$message
";

// Email sent successfully
$mail->send();

// Success flag set
session_start();
$_SESSION['contact_success'] = true;

// Redirect to contact page
header("Location: contact.php");
exit;


} catch (Exception $e) {
    echo "Email sending failed: " . $mail->ErrorInfo;
}

mysqli_close($conn);
?>
