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
			
			 $from = "connect@thebigfilms.com";
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
			   
			   
			require_once '../include/lib/swift_required.php';
	
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
			
			echo 'success';
		}
	//}
?>