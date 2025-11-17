<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // if installed via Composer

$mail = new PHPMailer(true);

$valid = ['success' => false,'message' => []];
try {
$errors = [];
if (empty($_POST['aname'])) $errors['aname'] = 'Name is required.';
if (empty($_POST['last_name'])) $errors['last_name'] = 'Last Name is required.';
if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
} 
if (empty($_POST['phone'])) $errors['phone'] = 'Phone Number  is required.';
if (empty($_POST['country'])) $errors['country'] = 'Country is required.';
if (empty($_POST['requesting_for'])) $errors['requesting_for'] = 'Requesting For is required.';
if (empty($_POST['treatment'])) $errors['treatment'] = 'Treatment For is required.';


if(!empty($errors)) {
    echo json_encode([
        'success' => false,
        'errors' => $errors
    ], JSON_PRETTY_PRINT);
    exit;
}

$subject = "New Admission from " . htmlspecialchars($_POST['aname']);
$message = "<h2>Admission</h2>";
$message .= "<p><strong>" . ucfirst('Name') . ":</strong> " . htmlspecialchars($_POST['aname']) . htmlspecialchars(string: $_POST['last_name']). "</p>";
$message .= "<p><strong>" . ucfirst('Email') . ":</strong> " . htmlspecialchars($_POST['email']) . "</p>";
$message .= "<p><strong>" . ucfirst('phone') . ":</strong> " . htmlspecialchars($_POST['phone']) . "</p>";
$message .= "<p><strong>" . ucfirst('Country') . ":</strong> " . htmlspecialchars($_POST['country']) . "</p>";
$message .= "<p><strong>" . ucfirst('Requesting For') . ":</strong> " . htmlspecialchars($_POST['requesting_for']) . "</p>";
$message .= "<p><strong>" . ucfirst('Treatment ') . ":</strong> " . htmlspecialchars($_POST['treatment']) . "</p>";


    $name = $_POST['aname'];
    // Server settings
   $mail->isSMTP();                           
    $mail->Host       = 'smtp.gmail.com';      
    $mail->SMTPAuth   = true;                  
    $mail->Username   = 'mail.thenorthernlights@gmail.com';
    $mail->Password   = 'bpvxwincosaddlkb';
    $mail->SMTPSecure = 'tls';                 
    $mail->Port       = 587;                   

    // Recipients
    $mail->setFrom('mail.thenorthernlights@gmail.com', 'Thenorthernlights Web');
    $mail->addAddress('info@thenorthernlights.ca', $name);
    $mail->addReplyTo('mail.thenorthernlights@gmail.com', 'Information');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;//'Hello! This is a test email.';

if($mail->send()) {
    $valid['success'] = true;
    $valid['message'] = "our team will be in contact with you shortly...";
}else{
    $valid['message'] = "Unable to send email. Please try again..";
}
echo json_encode($valid);
} catch (Exception $e) {
   // echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    $valid['message'] = "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

//echo json_encode($valid);

