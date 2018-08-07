<?php
	require_once('includes/access.php');
	require_once('adminpanel/lib/helper.php');
	if(isset($_POST['type'])){
		$user_id = base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_SESSION['skinbae_user'])))));
		$type = addslashes($_POST['type']);
		$get_user = $obj->select("*","user_master","user_status='1' AND user_id='$user_id'");
		if(is_array($get_user)){
			if($type == "1"){
				if(isset($_POST['user_username']) && isset($_POST['user_lastname']) && isset($_POST['user_phone']) ){
					$user_username = addslashes($_POST['user_username']);
					$user_lastname = addslashes($_POST['user_lastname']);
					$user_phone = addslashes($_POST['user_phone']);
					$update_user = " UPDATE user_master SET user_username='$user_username', user_lastname='$user_lastname', user_phone='$user_phone' WHERE user_id='$user_id'";
					$result_update_user = $obj->conn->query($update_user) or die($obj->conn->error);
					if($result_update_user){
						echo 1;
					}
				}
				else{
				?>
				<script>
					window.location.href="profile.php";
				</script>
				<?php
				}
			}
			else if($type == "2"){
				if(isset($_POST['user_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password']) ){
					$user_password = sha1(addslashes($_POST['user_password']));
					$new_password = sha1(addslashes($_POST['new_password']));
					
					$check_old_pwd = $obj->select("user_password","user_master","user_status='1' AND user_password = '$user_password' AND user_id = '$user_id'");
					if(is_array($check_old_pwd)){
						$update_user = " UPDATE user_master SET user_password='$new_password' WHERE user_id='$user_id'";
						$result_update_user = $obj->conn->query($update_user) or die($obj->conn->error);
						if($result_update_user){
							echo 1;
						}
					}
					else{
						echo 2;
					}
				}
				else{
				?>
				<script>
					window.location.href="profile.php";
				</script>
				<?php
				}
			}
			else if($type == "3"){
				if(isset($_POST['user_address1']) && isset($_POST['user_address2']) && isset($_POST['user_country']) && isset($_POST['user_state']) && isset($_POST['user_city']) && isset($_POST['user_pincode']) && isset($_POST['user_additional_info']) ){
					$user_address1 = addslashes($_POST['user_address1']);
					$user_address2 = addslashes($_POST['user_address2']);
					$user_country = addslashes($_POST['user_country']);
					$user_state = addslashes($_POST['user_state']);
					$user_city = addslashes($_POST['user_city']);
					$user_pincode = addslashes($_POST['user_pincode']);
					$user_additional_info = addslashes($_POST['user_additional_info']);
					
					$update_user = " UPDATE user_master SET user_address1='$user_address1', user_address2='$user_address2', user_country='$user_country', user_state='$user_state', user_city='$user_city', user_pincode='$user_pincode', user_additional_info='$user_additional_info' WHERE user_id='$user_id'";
					$result_update_user = $obj->conn->query($update_user) or die($obj->conn->error);
					if($result_update_user){
						echo 1;
					}
				}
				else{
				?>
				<script>
					window.location.href="profile.php";
				</script>
				<?php
				}
			}
			else{
			?>
			<script>
				window.location.href="profile.php";
			</script>
			<?php
			}
		}
		else{
		?>
		<script>
			window.location.href="profile.php";
		</script>
		<?php
		}
	}
	else{
	?>
	<script>
		window.location.href="profile.php";
	</script>
	<?php
	}
	
?>