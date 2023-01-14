<?php

//Phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/autoload.php';

// Output messages
$responses = [];

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$company = $_POST["company"];
$message = $_POST["message"];

// Check if the form was submitted
if (isset($name, $email, $phone, $company, $message)) {
	// Validate email adress
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$responses[] = 'Email is not valid!';
	}
	// Make sure the form fields are not empty
	if (empty($name) || empty($email) || empty($phone) || empty($company) || empty($message)) {
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
		$phpmailer->Username = 'bimexke@gmail.com';
		$phpmailer->Password = 'wagkdohalmwkeznh';
		$phpmailer->setFrom($email, 'BIMeX Website');
		$phpmailer->addReplyTo($email, 'BIMeX Website');
		$phpmailer->addAddress('bimexke@gmail.com', 'BIM GMAIL');
		$phpmailer->addBCC('bimexperts@yahoo.com', 'BIM Yahoo');
		$phpmailer->Subject = "Website Message";
		$exception = new Exception();

		//SMTP Debug setting
		$phpmailer->SMTPDebug = 2;

		// Enable HTML if needed
		$phpmailer->isHTML(true);
		$bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Phone: {$phone}", "Company: {$company}", "Message:", nl2br($message)];
		$body = join('<br />', $bodyParagraphs);
		$phpmailer->Body = $body;

		// Try to send the mail
		if ($phpmailer->send()) {
			//Redirect page header('Location: index_light.html');
			// Success
			$responses[] = 'Message sent!';
		} else {
			$responses = 'Oops, something went wrong. Mailer Error: ' . $exception->getMessage();
			echo $exception;
		}
	}
}
?>