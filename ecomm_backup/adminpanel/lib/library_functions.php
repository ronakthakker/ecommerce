<?php
	
	// function compress_image($source_url, $destination_url,$quality) 
	// { 
	// $curr_time = (strtotime("now"));
	// $destination_url = trim($destination_url);
	// if(is_dir($destination_url) == "")
	// {
	// mkdir($destination_url,0755,true);
	// }
	
	// for ($i=0;$i<count($source_url['tmp_name']);$i++)
	// {
	// $s_path = $source_url['tmp_name'][$i];
	// $s_name = $source_url['name'][$i];
	// $destination_path=strtolower($destination_url.$curr_time.$s_name);
	// if($source_url['type'] != 'image/jpg' || $source_url['type'] != 'image/jpeg' || $source_url['type'] != 'image/png' || $source_url['type'] != 'image/gif')
	// {
	// $document = move_uploaded_file($s_path,$destination_path);
	// $link[]=$destination_path;
	// }
	// else
	// {
	// $info = getimagesize($source_url['tmp_name'][$i]);
	// if ($info['mime'] == 'image/jpeg')
	// { 
	// $image = imagecreatefromjpeg($s_path); 
	// $new_image = imagejpeg($image, $destination_path, $quality);
	// }
	// else if ($info['mime'] == 'image/gif') 
	// {
	// $image = imagecreatefromgif($s_path); 
	// $new_image = imagegif($image, $destination_path, $quality);
	// }
	// else if ($info['mime'] == 'image/png')
	// { 
	// $image = imagecreatefrompng($s_path);
	// $new_image = imagepng($image, $destination_path, $quality);
	// }
	// else if ($info['mime'] == 'image/jpg')
	// {
	// $image = imagecreatefromjpeg($s_path); 
	// $new_image = imagejpeg($image, $destination_path, $quality);
	// }
	// else
	// {
	// $document = move_uploaded_file($s_path,$destination_path);
	// } 
	// $link[]=$destination_path;
	// }	
	
	
	// }
	// return $link; 
	// } 
	
	function compress_image($source_url, $destination_url,$quality) 
	{ 
		$curr_time = guid();
		$destination_url = trim($destination_url);
		if(is_dir($destination_url) == "")
		{
			mkdir($destination_url,0755,true);
		}
		
		for ($i=0;$i<count($source_url['tmp_name']);$i++)
		{
			if(is_array($source_url['tmp_name'])){
				$s_path = $source_url['tmp_name'][$i];
				$s_name = $source_url['name'][$i];
			}
			else{
				$s_path = $source_url['tmp_name'];
				$s_name = $source_url['name'];
			}
			
			$destination_path = str_replace(' ', '-', strtolower($destination_url.$curr_time.$s_name));
			$destination_path = preg_replace('/[^A-Za-z0-9\.\-\/\{\}]/', '-', $destination_path);
			$destination_path = preg_replace('/-+/', '-', $destination_path);
			if($source_url['type'] != 'image/jpg' || $source_url['type'] != 'image/jpeg' || $source_url['type'] != 'image/png' || $source_url['type'] != 'image/gif')
			{
				$document = move_uploaded_file($s_path,$destination_path);
				$link[]=$destination_path;
			}
			else
			{
				$info = getimagesize($source_url['tmp_name'][$i]);
				if ($info['mime'] == 'image/jpeg')
				{ 
					$image = imagecreatefromjpeg($s_path); 
					$new_image = imagejpeg($image, $destination_path, $quality);
				}
				elseif ($info['mime'] == 'image/gif') 
				{
					$image = imagecreatefromgif($s_path); 
					$new_image = imagegif($image, $destination_path, $quality);
				}
				elseif ($info['mime'] == 'image/png')
				{ 
					$image = imagecreatefrompng($s_path);
					$new_image = imagepng($image, $destination_path, $quality);
				}
				elseif ($info['mime'] == 'image/jpg')
				{
					$image = imagecreatefromjpeg($s_path); 
					$new_image = imagejpeg($image, $destination_path, $quality);
				}
				else
				{
					$document = move_uploaded_file($s_path,$destination_path);
				} 
				$link[]=$destination_path;
			}	
			
			
		}
		return $link; 
	}
	
	function pre($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
	
	function pre_exit($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		exit();
	}
	
	function convert_number($number) 
	{ 
		if (($number < 0) || ($number > 999999999)) 
		{ 
			throw new Exception("Number is out of range");
		} 
		
		$Gn = floor($number / 100000);  /* lacs (mega) */ 
		$number -= $Gn * 100000; 
		$kn = floor($number / 1000);     /* Thousands (kilo) */ 
		$number -= $kn * 1000; 
		$Hn = floor($number / 100);      /* Hundreds (hecto) */ 
		$number -= $Hn * 100; 
		$Dn = floor($number / 10);       /* Tens (deca) */ 
		$n = $number % 10;               /* Ones */ 
		
		$res = ""; 
		
		if ($Gn) 
		{ 
			$res .= convert_number($Gn) . " Lacs"; 
		} 
		
		if ($kn) 
		{ 
			$res .= (empty($res) ? "" : " ") . 
			convert_number($kn) . " Thousand"; 
		} 
		
		if ($Hn) 
		{ 
			$res .= (empty($res) ? "" : " ") . 
			convert_number($Hn) . " Hundred"; 
		} 
		
		$ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
		"Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
		"Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
		"Nineteen"); 
		$tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
		"Seventy", "Eigthy", "Ninety"); 
		
		if ($Dn || $n) 
		{ 
			if (!empty($res)) 
			{ 
				$res .= " and "; 
			} 
			
			if ($Dn < 2) 
			{ 
				$res .= $ones[$Dn * 10 + $n]; 
			} 
			else 
			{ 
				$res .= $tens[$Dn]; 
				
				if ($n) 
				{ 
					$res .= "-" . $ones[$n]; 
				} 
			} 
		} 
		
		if (empty($res)) 
		{ 
			$res = "zero"; 
		} 
		
		return $res; 
	}
	
	function secondsToTime($seconds) {        // Output : 2 Days 3 Hrs.
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a Days %h Hrs');
	}
	
	
	function guid(){
		if (function_exists('com_create_guid')){
			return com_create_guid();
			}else{
			mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
			$charid = strtoupper(md5(uniqid(rand(), true)));
			$hyphen = chr(45);// "-"
			$uuid = chr(123)// "{"
			.substr($charid, 0, 8).$hyphen
			.substr($charid, 8, 4).$hyphen
			.substr($charid,12, 4).$hyphen
			.substr($charid,16, 4).$hyphen
			.substr($charid,20,12)
			.chr(125);// "}"
			return $uuid;
		}
	}
	
	
	// use_template = 'yes/no'
	//heading = Your Template heading
	//messagebody = Template Message Body / Normal Email Body 
	//footer = Template Footer (E.g Copyright © 2016 Project Name. All Rights Reserved.)
	// mail_type = 'defaultmail/phpmailer'
	// from_mail = From email id
	// to_mail = To email id
	// subject = Mail Subject
	
	function sendEmail($use_template,$heading,$messagebody,$footer,$mail_type,$from_mail,$to_mail,$subject)
	{
		if($use_template == 'yes')
		{
			$message ='<!DOCTYPE html>
			<html>
			<head>
			<link href="http://ortlx.com/demo/kfpl/css/font-awesome.min.css" rel="stylesheet">
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
			require_once '../PHPMailer/class.phpmailer.php';
			
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