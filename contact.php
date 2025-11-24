<?php
// contact.php - PHPMailer example with fallback logging
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

function clean($v) {
    return trim(htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'));
}

$name = isset($_POST['name']) ? clean($_POST['name']) : '';
$email = isset($_POST['email']) ? clean($_POST['email']) : '';
$company = isset($_POST['company']) ? clean($_POST['company']) : '';
$message = isset($_POST['message']) ? clean($_POST['message']) : '';

$errors = [];
if (strlen($name) < 2) $errors[] = 'Please provide your name.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please provide a valid email.';
if (strlen($message) < 10) $errors[] = 'Message is too short.';

if (!empty($errors)) {
    http_response_code(400);
    echo '<h3>There were problems with your submission</h3><ul>';
    foreach ($errors as $e) echo '<li>' . $e . '</li>';
    echo '</ul><p><a href="index.php#contact">Back to form</a></p>';
    exit;
}

// PHPMailer SMTP example
// Install PHPMailer with Composer: composer require phpmailer/phpmailer
// Then require the Composer autoloader
// require 'vendor/autoload.php';

// Example SMTP settings (replace with real credentials)
$smtpHost = 'smtp.example.com';
$smtpUser = 'smtp_user@example.com';
$smtpPass = 'smtp_password';
$smtpPort = 587;
$to = 'hello@ayveez.com';
$subject = 'Contact form submission — Ayveez: ' . substr($message, 0, 50);

$body = "Name: $name\r\nEmail: $email\r\nCompany: $company\r\n\r\nMessage:\r\n$message\r\n";

// Try to use PHPMailer if available
$sent = false;
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    try {
        // use PHPMailer\PHPMailer\PHPMailer;
        // use PHPMailer\PHPMailer\SMTP;
        // NOTE: the above 'use' lines are comments to avoid parse errors if PHPMailer not present.
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUser;
        $mail->Password = $smtpPass;
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $smtpPort;

        $mail->setFrom($email, $name);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $sent = $mail->send();
    } catch (Exception $e) {
        $sent = false;
    }
} else {
    // fallback to mail()
    $headers  = "From: {$name} <{$email}>\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $sent = @mail($to, $subject, $body, $headers);
}

if ($sent) {
    echo '<h3>Thanks — message sent</h3><p>We will get back to you shortly.</p><p><a href="index.php">Return to homepage</a></p>';
    exit;
}

// if sending failed, log to file (useful for local dev)
$logLine = "-----\r\n" . date('Y-m-d H:i:s') . "\r\n" . $body . "\r\n";
@file_put_contents(__DIR__ . '/contact-log.txt', $logLine, FILE_APPEND);

http_response_code(500);
echo '<h3>Sorry — we could not send your message</h3>';
echo '<p>The message has been recorded locally. Please try again later or email hello@ayveez.com directly.</p>';
echo '<p><a href="index.php">Return to homepage</a></p>';
exit;
