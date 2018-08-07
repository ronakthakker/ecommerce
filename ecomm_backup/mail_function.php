<?php	
	function sendEmail($use_template,$heading,$messagebody,$footer,$mail_type,$from_mail,$to_mail,$subject)
	{
		if($use_template == 'yes')
		{
			$message ='<!DOCTYPE html>
			<html>
			<head>
			<title></title>
			</head>
			<body>
			<table width="100%"><tbody><tr><td>
			<table align="center" cellspacing="0" cellpadding="0" style="padding-top:30px;margin-left:auto;margin-right:auto;padding:30px 0;width:100%"><tbody><tr><td style="padding-left:0;padding-right:0">
			<table width="100%"><tbody><tr><td style="padding-left:0;padding-right:0">
			'.$heading.'
			<table width="100%" style="border:2px solid #ddd">
			<tbody>
			'.$messagebody.'		
			<tr>
			<td style="font-family:Helvetica,Arial,sans-serif;padding-bottom:25px;padding-top:10px;text-align:center">
			'.$footer.'
			</td>
			</tr></tbody></table></td>
			</tr></tbody></table></td>
			</tr></tbody></table></td>
			</tr></tbody></table>
			</body>
			</html>';
		}
		else
		{
			$message = $messagebody;
		}
		
		
		if($mail_type == 'defaultmail')
		{
			$from_add = $from_mail;
			$to_add = $to_mail;
			$subject = $subject;
			$headers = "From: $from_add \r\n";
			$headers .= "Reply-To: $from_add \r\n";
			$headers .= "Return-Path: $from_add\r\n";
			$headers .= "X-Mailer: PHP \r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			
			if(mail($to_add,$subject,$message,$headers))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		else if($mail_type == 'phpmailer')
		{
			require_once 'PHPMailer/class.phpmailer.php';
			
			$mail = new PHPMailer(); // create a new object  
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
			//$mail->SMTPAuth = true; // authentication enabled                                       //Comment if using Godaddy
			//$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail OR SSL         //Comment if using Godaddy
			$mail->Host = "localhost"; //changed localhost/smtp.gmail.com for using godaddy
			//$mail->Port = 587;    //587 tls , 463 ssl , 25 unsecured                                //Comment if using Godaddy
			$mail->IsHTML(true);
			//$mail->Username = "";                                      //Comment if using Godaddy
			//$mail->Password = "";                                                        //Comment if using Godaddy
			$mail->SetFrom($from_mail);
			$mail->Subject = $subject;
			$mail->Body = $message;
			$mail->AddAddress($to_mail);
			
			if($mail->Send()) 
			{
				return 1;
			} 
			else 
			{
				//echo "Mailer Error: " . $mail->ErrorInfo;
				return 0;
			}
		}
	}
	
	
?>	