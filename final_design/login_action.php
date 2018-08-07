<?php
	if(!session_id()){
		session_start();
	}
	require_once('adminpanel/lib/helper.php');
	if(isset($_POST['user_email']) && isset($_POST['user_password'])){
		
		$user_email = addslashes($_POST['user_email']);
		$user_password = sha1(addslashes($_POST['user_password']));
		
		$is_present = $obj->select("*","user_master","user_status='1' AND user_email='$user_email' AND user_password='$user_password'");
		if(is_array($is_present)){
			$_SESSION['skinbae_user'] = base64_encode(base64_encode(base64_encode(base64_encode($is_present[0]['user_id'])))); 
			if($_POST['url'] == ""){
				echo "index.php";
			}
			else{
				echo $_POST['url'];
			}
		}
		else{
			echo "false";
		}
	}
	else{
		?>
		<script>
			window.location.href="logout.php";
		</script>
		<?php
	}
?>