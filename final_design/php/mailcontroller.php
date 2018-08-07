<?php 
ob_start();// turn on output buffering
include_once('phpmailer.php');// to send mail 
$mode = $_REQUEST['mode'];

if($mode=='contact'){
	  	
		$mail = new PHPMailer();
		$mail->Priority = 3; // COPY
		$mail->From = $_REQUEST['email'];
		$mail->FromName = ucwords($_REQUEST['fname'])." ".ucwords($_REQUEST['lname']);			
		$mail->Subject = "Jewellery Shoppe Contact Us";
		$mail->AddAddress("contact@srgit.com","Admin");
		$mail->Body = "";
		$mail->AltBody = "";
	  
	  	$body .= '
		
		<div >
  <table align="center" border="0" cellspacing="0" cellpadding="5" width="600" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; border:1px solid #cccccc; border-collapse:collapse">
     <tr style="background:#333">
    <td align="center"><img src="http://www.srgit.biz/demo/jewellery/template/images/logo.png" width="180"></td>
  </tr>
    <tr>
      <td><hr style="opacity:0.3;" /></td>
    </tr>
    <tr>
      <td style="background:#EEEEEE; padding:10px 0" align="center"><strong style="font-size:17px">Date : '.date("F j, Y", strtotime(date("Y-m-d"))).' </strong></td>
    </tr>
    
    <tr>
      <td><table border="0" cellspacing="0" cellpadding="5" width="100%" >
      <tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px"><b>Hello ,</b></font></td>
		</tr>
      <tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px">'.ucwords($_REQUEST['fname']).' '.ucwords($_REQUEST['lname']).' has contacted Jewellery Shoppe.
</font></td>
	</tr>
          <tr>
            <td valign="middle"><p style="font-size:13px; margin-bottom:10px; margin-top:0;  padding-left:5px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:13px"><b>Contact details are as follows:</b></font></p>
              <table border="0" cellspacing="0" cellpadding="0" width="300">
                <tr>
                  <td valign="top"><table border="0" cellspacing="0" cellpadding="2" width="100%">
                      <tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Name : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px"> '.ucwords($_REQUEST['fname']).' '.ucwords($_REQUEST['lname']).'</font></th>
		</tr>';
		if(!empty($_REQUEST['phone'])){
		$body .= '<tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Phone : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px">'.$_REQUEST['phone'].'</font></th>
		</tr>';
		}
		if(!empty($_REQUEST['email'])){
		$body .= '<tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Email : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px">'.$_REQUEST['email'].'</font></th>
		</tr>';
		}
		if(!empty($_REQUEST['country'])){
		$body .= '<tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Country : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px">'.$_REQUEST['country'].'</font></th>
		</tr>';
		}
		if(!empty($_REQUEST['message'])){
		$body .= '<tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Message : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px">'.$_REQUEST['message'].'</font></th>
		</tr>';
		}
		$body .= '<tr>
			<td colspan="2"><br />
			<font face="Verdana" style="font-size:12px" color="#666666"><b>Kind Regards,<br />
			<font face="Verdana" style="font-size:12px" color="#666666" >
			Jewellery Shoppe.</font></b>	
			</font>
			</td>
		</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			
			</table>
			</div> ';
			
		$mail->Body .= $body;
		$mail->Send();
		$mail->ClearAllRecipients();
		
		echo 1;
		exit();
}

if($mode=='subscriber'){
		
		$mail = new PHPMailer();
		$mail->Priority = 3; // COPY
		$mail->From = $_REQUEST['subsemail'];
		$mail->FromName = "Jewellery Shoppe";			
		$mail->Subject = "Jewellery Subscribe";
		$mail->AddAddress("contact@srgit.com","Admin");
		$mail->Body = "";
		$mail->AltBody = "";
	  
	  	$body .= '
		<div >
  <table border="0" cellspacing="0" align="center" cellpadding="5" width="600" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; border:1px solid #cccccc; border-collapse:collapse">
 
     <tr style="background:#333">
    <td align="center"><img src="http://www.srgit.biz/demo/jewellery/template/images/logo.png" width="180"></td>
  </tr>
    <tr>
      <td><hr style="opacity:0.3;" /></td>
    </tr>
    <tr>
      <td style="background:#EEEEEE; padding:10px 0" align="center"><strong style="font-size:17px">Date : '.date("F j, Y", strtotime(date("Y-m-d"))).' </strong></td>
    </tr>
    
    <tr>
      <td><table border="0" cellspacing="0" cellpadding="5" width="100%" >
      <tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px"><b>Hello ,</b></font></td>
		</tr>
      <tr>
			<td colspan="2"><font face="Verdana" style="font-size:12px">Thank you for subscribing. We will get back to you soon.
</font></td>
	</tr>
          <tr>
            <td valign="middle"><p style="font-size:13px; margin-bottom:10px; margin-top:0;  padding-left:5px;"><font style="font-family:Arial, Helvetica, sans-serif; font-size:13px"><b>Subscriber details are as follows:</b></font></p>
              <table border="0" cellspacing="0" cellpadding="0" width="300">
                <tr>
                  <td valign="top"><table border="0" cellspacing="0" cellpadding="2" width="100%">
                      <tr>
           <td align="left" width="30%"><font face="Verdana" style="font-size:12px">Email : </font></th>
           <td align="left"><font face="Verdana" style="font-size:12px"> '.$_REQUEST['subsemail'].'</font></th>
		</tr>
        <tr>
			<td colspan="2"><br />
			<font face="Verdana" style="font-size:12px" color="#666666"><b>From Jewellery Shoppe auto-email</b><br />
			</font>
			</td>
		</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			</table></td>
			</tr>
			
			</table>
			</div> ';
			
		$mail->Body .= $body;
		$mail->Send();
		$mail->ClearAllRecipients();
		
		echo 1;
		exit();

}
?>