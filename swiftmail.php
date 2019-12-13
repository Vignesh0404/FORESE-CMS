<?php 
	/* 
		swiftmailer package
		composer Dependency Manager for PHP
		run the code om powershell to get the dependencies
		then get the sample code from swiftmail. 
	*/
		
		require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport

$mailer = new Swift_Mailer($transport);



function sendVerificationEMail($userEmail, $token)
 {


 	global $mailer; 
$body = '
<!DOCTYPE html>
<html>
<head>
	<title>Verify Mail</title>
</head>
<style>
	body{
		background-color: black;
	}
</style>
<body>
<div class="wrapper">
	<p> 
		"This mail is regarding the account verification you created at the Forese-CMS.
		<br>
		Click the link below to verify your account. 
	</p>
		<br>
		<br>
		Click <a href="http://localhost/foresedb/signin.php?token='. $token.'">here</a>"
		<br>
		<br>
		
        

</div>

</body>
</html>';
 	
// Create a message
$message = (new Swift_Message('Verify your account'))
  ->setFrom(EMAIL)
  ->setTo($userEmail)
  ->setBody($body, 'text/html');


  // Send the message
$result = $mailer->send($message);
 }