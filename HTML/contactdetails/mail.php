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
		$phpmailer->Host = 'smtp.gmail.com';
		$phpmailer->SMTPAuth = true;
		$phpmailer->Port = 587;
		$phpmailer->Username = 'Blasio Muhinda';
		$phpmailer->Password = '291993Godi';
		$phpmailer->setFrom($email, 'BIMeX Website');
		$phpmailer->addReplyTo($email, 'BIMeX Website');
		$phpmailer->addAddress('muhindablasio@gmail.com', 'Me');
		$phpmailer->addBCC('muhindablasio@yahoo.com', 'Blasio');
		$phpmailer->Subject = $subject;

		// Enable HTML if needed
		$phpmailer->isHTML(true);
		$bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Subject: {$subject}", "Message:", nl2br($message)];
		$body = join('<br />', $bodyParagraphs);
		$phpmailer->Body = $body;
		echo $body;
		
		// Try to send the mail
		if($mail->send()){
			header('Location: make a thank you html page'); // Redirect to 'thank you' page. Make sure you have it
		} else {
 
			$errorMessage = 'Oops, something went wrong. Mailer Error: ' . $phpmailer->ErrorInfo;
		}
	}
}
?>