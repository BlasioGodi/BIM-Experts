<?php

//Phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/autoload.php';

// Output messages
$responses = [];

$email = $_POST['email'];
$subject = $_POST['subject'];
$name = $_POST['name'];
$message = $_POST['message'];
// Check if the form was submitted
if (isset($email, $subject, $name, $message)) {
	// Validate email adress
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$responses[] = 'Email is not valid!';
	}
	// Make sure the form fields are not empty
	if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['name']) || empty($_POST['msg'])) {
		$responses[] = 'Please complete all fields!';
	}
	// If there are no errors
	if (!$responses) {

		//SMTP Configuration settings
		$phpmailer = new PHPMailer(true);
		$phpmailer->isSMTP();
		$phpmailer->Host = 'smtp.mailtrap.io';
		$phpmailer->SMTPAuth = true;
		$phpmailer->Port = 2525;
		$phpmailer->Username = '401d2efc697e93';
		$phpmailer->Password = 'c95f560a8461c6';
		$mail->setFrom($email, 'Mailtrap Website');
		$mail->addAddress('example@example.com', 'Me');
		$mail->Subject = $subject;

		// Where to send the mail? It should be your email address
		$to = 'muhindablasio@gmail.com';
		// Send mail from which email address?
		$from = 'noreply@example.com';
		// Mail subject
		$subject = $_POST['subject'];
		// Mail message
		$message = $_POST['msg'];
		// Mail headers
		$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		// Try to send the mail
		if (mail($to, $subject, $message, $headers)) {
			// Success
			$responses[] = 'Message sent!';
		} else {
			// Fail
			$responses[] = 'Message could not be sent! Please check your mail server settings!';
		}
	}
}
?>