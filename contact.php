<?php
		 	 $from = "connect@thebigfilms.com";
			 $to = 'connect@thebigfilms.com';
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
			   
			   
			require_once 'include/lib/swift_required.php';
	
			//Create the Transport
			$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465,'ssl')
			  ->setUsername('inquiry@fotoexpression.com')
			  ->setPassword('fotoexpression');
			  
			$mailer = Swift_Mailer::newInstance($transport);

			//Create a message
			$message = Swift_Message::newInstance($subject)
			  ->setFrom(array($from))
			  ->setTo(array($to))
			  ->setBody($html)
			  ;
			$message->setContentType("text/html");
			//Send the message
			$result = $mailer->send($message);
			
			echo ('success');
?>
<script language="javascript">
 	alert(<?php echo $message?>);
	document.location = 'mail.php';
 </script>