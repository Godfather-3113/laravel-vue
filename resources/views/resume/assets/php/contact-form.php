<?php

	$name = trim($_POST['name']);
	$email = trim($_POST['email']);
	$subject = trim($_POST['subject']);
	$message = trim($_POST['message']);

	$emailTo = 'alisher.maxkamov@unicorm.uz';
	if (!empty($subject)) {
	    $subject = 'Message from  website.';
	}
	$body = "Name: $name \n\nEmail: $email \n\n Message:\n$message";
	$headers = 'From: '.$email."\r\n" .
        'Reply-To: '.$email."\r\n";
        "Content-type: text/plain; charset=utf-8\r\n";

	mail($emailTo, $subject, $body, $headers);
	$emailSent = true;
	echo ('success');

