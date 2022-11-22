<?php
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$company = $_POST["company"];
$message = $_POST["message"];

// Output messages
$responses = [];
// Check if the form was submitted
if (isset($name, $email, $phone, $company,$message)) {
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

        // prepare email body text
        $Fields .= "Name: ";
        $Fields .= $name;
        $Fields .= "\n";

        $Fields.= "Email: ";
        $Fields .= $email;
        $Fields .= "\n";

        $Fields .= "Phone: ";
        $Fields .= $phone;
        $Fields .= "\n";

        $Fields .= "Company: ";
        $Fields .= $company;
        $Fields .= "\n";

        $Fields .= "Message: ";
        $Fields .= $message;
        $Fields .= "\n";

        // To be sent
        $EmailTo = "muhindablasio@gmail.com";
		// Send mail from which email address?
		$from = $email;
		// Mail subject
        $Subject = "Subscriber message BIM Experts";
		// Mail headers
		$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		// Try to send the mail
		if (mail($EmailTo, $Subject, $Fields, $headers)) {
			// Success
			$responses[] = 'Message sent!';		
		} else {
			// Fail
			$responses[] = 'Message could not be sent! Please check your mail server settings!';
		}
	}
}
?>