<?php
	//if(isset($_POST)){
		if(empty($_POST['name'])){
			echo 'Please insert your name';
		}
		else if(empty($_POST['email'])){
			echo 'Please insert your email';
		}
		else if(empty($_POST['number'])){
			echo 'Please insert your contact number';
		}
		else if(empty($_POST['message'])){
			echo 'Please insert your message';
		}
		else{
		//	require_once "Mail.php";
		//	require_once('Mail/mime.php'); 
			
 			$crlf = "\n";
    		//$mime = new Mail_mime($crlf);
			
			 $from = "budi@fotoexpression.com";
			 $to = 'budi.inef@gmail.com';
			 $subject = 'Inquiry from the BIG films website by '.$_POST['name'];
			 $html = "<html><body>You've recieved a message from a website viewer: <br />";
			 $html .= 'Your Name : '.$_POST['name'].'<br />';
			 $html .= 'Your Email : '.$_POST['email'].'<br />';
			 $html .= 'Your Number : '.$_POST['number'].'<br />';
			 $html .= 'Date : '.$_POST['date'].'<br />';
			 $html .= 'Location : '.$_POST['location'].'<br />';
			 $html .= 'Your message : <br />'.$_POST['message'];
			 $html .= "</body></html>";
			 
			// $mime->setTXTBody($subject);
			// $mime->setHTMLBody($html);
			 
			// $body = $mime->get();
			 $body = $html;
			 $host = "ssl://smtp.gmail.com";
			 $port = "465";
			 $username = "budi@fotoexpression.com";
			 $password = "budiganteng";

			 
			 $headers = array ('From' => $from,
			   'To' => $to,
			   'Subject' => $subject);
			 
			 /*
			 $headers = $mime->headers($headers); 
			
			
			 $smtp = Mail::factory('smtp',
			   array ('host' => $host,
           		 'port' => $port,
				 'auth' => true,
				 'username' => $username,
				 'password' => $password));
			 
			 $mail = $smtp->send($to, $headers, $body);
		
			 if (PEAR::isError($mail)) {
			   $message = $mail->getMessage();
			   echo $message;
			  } 
			  else {
			   $message = "Message successfully sent!";
			  }
			 */
			define('GUSER', 'budi@fotoexpression.com'); // Gmail username
			define('GPWD', 'budiganteng'); // Gmail password
			include_once('../include/phpmailer.inc.php');
			
			$mail = new PHPMailer();  // create a new object
			$mail->IsSMTP(); // enable SMTP
			//$mail->IsHTML(true);
			$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true;  // authentication enabled
		//	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = '209.190.61.39';
		//	$mail->Port = 465; 
			$mail->Username = 'budi@inef.web.id';  
			$mail->Password = 'ganteng';           
			$mail->From = GUSER;
			$mail->Subject = $subject;
			$mail->Body = $body;
			$mail->AddAddress($to);
			if(!$mail->Send()) {
				$error = 'Mail error: '.$mail->ErrorInfo; 
				//return false;
			} else {
				$error = 'Message sent!';
				//return true;
			}
			echo $error;
		}
	//}
?>