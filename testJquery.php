<?php
//echo $_GET['action'];
if (isset($_GET["action"]) && !empty($_GET["action"])) { //Checks if action value exists
	$action = $_GET["action"];

	require './PHPMailer-master/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
//	$mail->SMTPDebug = 3; 
	$mail->isSMTP();                                      // Set mailer to use SMTP
//	$mail->Host = 'mail.woxiprogrammers.com';  // Specify main and backup SMTP servers
//	$mail->SMTPAuth = true;                               // Enable SMTP authentication
//	$mail->Username = 'infinia@woxiprogrammers.com';                 // SMTP username
//	$mail->Password = 'infi@1234';                           // SMTP password
//	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//	$mail->Port = 587;                                    // TCP port to connect to

	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'infadmin@infiniaretail.com';                 // SMTP username
	$mail->Password = 'aiNifni8';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;

	$mail->setFrom('infadmin@infiniaretail.com', 'Infinia Retail');
	$mail->addAddress('sales@infiniaretail.com', 'Infinia Sales');     // Add a recipient
//	$mail->addCC('bharat.woxi@gmail.com');
//	$mail->addCC('megha.woxi@gmail.com');
//	$mail->addCC('sandeep.patil@woxiprogrammers.com');
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Infinia Retail : SELL EASIER. BETTER. MORE';
	$mail->Body    = 'Customer Email Address : '.$_GET["emailAddress"];
//	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
		$return["msg"] = 'false';
	} else {
		$return["msg"] = 'true';
	}

	echo json_encode($return);
} else {
 	$return["msg"] = 'false';
        echo json_encode($return);
}

?>
