<?php	
	function sendOTP($email,$new_password) {
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
	
		$message_body = "your password has been updated to " .$new_password;
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = TRUE;
		$mail->SMTPSecure = 'tls'; // tls or ssl
		$mail->Port     = "587";
		$mail->Username = "muskannayani19@gnu.ac.in";
		$mail->Password = "muskan111";
		$mail->Host     = "smtp.gmail.com";
		$mail->Mailer   = "smtp";
		$mail->SetFrom("muskannayani19@gnu.ac.in", "web");
		$mail->AddAddress($email);
		$mail->Subject = "Password updated sucessfully..!!";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$mail->Send();
		
		
	}
?>