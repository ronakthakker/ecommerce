<?php
	require_once('adminpanel/lib/helper.php');
	if(isset($_POST['user_username']) && isset($_POST['user_lastname']) && isset($_POST['user_email']) && isset($_POST['user_password']) ){
		
		$user_username = addslashes($_POST['user_username']);
		$user_lastname = addslashes($_POST['user_lastname']);
		$user_email = addslashes($_POST['user_email']);
		$user_password = sha1(addslashes($_POST['user_password']));
		
		$check_email = $obj->select("*","user_master","user_status='1' AND user_email='$user_email' AND user_email!=''");
		if(is_array($check_email)){
			echo "1";
		}
		else{
			$insert = "INSERT INTO user_master (user_username, user_lastname, user_email, user_password) VALUES (?, ?, ?, ?)";
			$stmt = $obj->conn->prepare($insert);
			$stmt->bind_param("ssss", $user_username, $user_lastname, $user_email, $user_password);
			if($stmt->execute()){
				require_once("mail_function.php");
				
				$heading = '<table width="100%" style="background-color:#D8703F;min-height:100px;width:100%"><tbody><tr><td>
				<p style="margin-bottom:10px; margin-top: 10px;color: #333;font-family: Helvetica,Arial,sans-serif;    font-size: 25px;font-weight: bold;padding-left: 15px;">
				Welcome to Ecomm!
				</p>
				</td>
				<td align="right" style="width: 30%;padding-bottom:15px;padding-top:5px;padding-left:15px;padding-right:15px">
				<div style="padding: 10px 15px;float: none;height: 50px;width: 85px;"><img src="http://skinbae.com/images/logo.png" style="width: 115%;"></div></td>
				</tr></tbody></table>';
				
				$messagebody = '<tr>
				<td style="padding-left:15px;padding-right:15px">
				<p style="line-height:1.20;margin-bottom:10px;margin-top:10px;color:#000;font-family:Helvetica,Arial,sans-serif;padding-top:20px;font-size:16px">
				<b>Dear '.$user_username.',</b> <br/>  <br/> Welcome to Skinbae. You have been successfully registered with us.
				</p>
				<p style="line-height:1.20;margin-bottom:10px;margin-top:10px;color:#000;font-family:Helvetica,Arial,sans-serif;padding-bottom:10px;padding-left:20px;font-size:18px"> <br/>
				<strong>Please use the new details to login with MototPays web Application</strong>
				</p>
				<p style="line-height:1.20;margin-bottom:10px;margin-top:10px;color:#000;font-family:Helvetica,Arial,sans-serif;padding-bottom:25px;padding-top:5px;font-size:16px">
				<strong>Thank You,</strong><br>
				<br>
				<strong>Team, Skinbae</strong><br></p>
				<hr style="border-bottom:1px solid #ddd;padding-left:15px;padding-right:15px">
				</td>
				</tr>';
				
				$footer = 'Copyright © '.date('Y', strtotime("now")).' Skinbae. All Rights Reserved.';
				
				$mail_type = 'defaultmail';  // defaultmail/phpmailer
				
				$use_template = 'yes';
				
				$from_mail = 'jigar.onerooftech@gmail.com';
				
				$to_mail = $user_email;
				
				$subject = 'Welcome to ecomm';
				
				sendEmail($use_template,$heading,$messagebody,$footer,$mail_type,$from_mail,$to_mail,$subject);
				
				echo "2";
			}
			$stmt->close();
		}
	}
	else{
		echo 3;
	}
?>