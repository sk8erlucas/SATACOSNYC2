<?php
 
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $visitor_message = "";
     
    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = "You have a new contact in your website"."\r\n".
			"Name: ". $visitor_name . "\r\n".
			"Mail: ". $visitor_email . "\r\n".
			"Message: ". htmlspecialchars($_POST['visitor_message']);
    }
     
    $recipient = "satacosnyc@gmail.com";
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
    
	$email_title = "You have a new contact from the website";
    if(mail($recipient, $email_title, $visitor_message, $headers)) {
		header("Location: https://.com/?key=email_sent_ok");
		exit();
    } else {
        header("Location: https://.com/?key=email_sent_nodata");
		exit();

    }
     
} else {
    header("Location: https://.com/?key=email_sent_error");
	exit();
}
 
?>