<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // if installed via Composer

$mail = new PHPMailer(true);

$valid = ['success' => false,'message' => []];
try {
$errors = [];
if (empty($_POST['fname'])) $errors['fname'] = 'Name is required.';
if (empty($_POST['fphone'])) $errors['fphone'] = 'Phone Number  is required.';
if (empty($_POST['fservice'])) $errors['fservice'] = 'Service is required.';
if (empty($_POST['fmessage'])) $errors['fmessage'] = 'Message is required.';

if(!empty($errors)) {
    echo json_encode([
        'success' => false,
        'errors' => $errors
    ], JSON_PRETTY_PRINT);
    exit;
}

$subject = "New Consultation Submission from " . htmlspecialchars($_POST['fname']);
$message = "<h2>Get A  Consultation Submission</h2>";
$message .= "<p><strong>" . ucfirst('Name') . ":</strong> " . htmlspecialchars($_POST['fname']) . "</p>";
$message .= "<p><strong>" . ucfirst('phone') . ":</strong> " . htmlspecialchars($_POST['fphone']) . "</p>";
$message .= "<p><strong>" . ucfirst('Service') . ":</strong> " . htmlspecialchars($_POST['fservice']) . "</p>";
$message .= "<p><strong>" . ucfirst('Message') . ":</strong> " . htmlspecialchars($_POST['fmessage']) . "</p>";

    $name = $_POST['fname'];
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


