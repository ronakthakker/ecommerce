<?php
	require_once('includes/access.php');
	require_once('adminpanel/lib/helper.php');
	if(isset($_POST['type'])){
		$user_id = base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_SESSION['skinbae_user'])))));
		$get_user = $obj->select("*","user_master","user_status='1' AND user_id='$user_id'");
		if(is_array($get_user)){
			$type = addslashes($_POST['type']);
			if($type == "1"){
				if(isset($_POST['product_id']) && isset($_POST['quantity']) && isset($_POST['opt'])){
					$product_id = base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_POST['product_id'])))));
					$quantity = addslashes($_POST['quantity']);
					$opt = addslashes($_POST['opt']);
					$get_product = $obj->select("*","products","product_status='1' AND product_id='$product_id'");
					if(is_array($get_product)){
						$check_cart = $obj->select("*","user_cart","cart_status='1' AND cart_user_id='$user_id' AND cart_product_id='$product_id'");
						if(is_array($check_cart)){
							if($opt == "yes"){
								$cart_quantity = $quantity;
							}
							else{
								$old_quantity = $check_cart[0]['cart_quantity'];
								$cart_quantity = round($old_quantity+$quantity,0);
							}
							$cart_action = "UPDATE user_cart SET cart_quantity='$cart_quantity' WHERE cart_user_id='$user_id' AND cart_product_id='$product_id'";
						}
						else{
							$cart_action = "INSERT INTO user_cart (cart_user_id, cart_product_id, cart_added_date, cart_quantity) VALUES ('$user_id','$product_id',CONVERT_TZ(NOW(), @@session.time_zone, '+5:30'), '$quantity')";
						}
						$result_cart = $obj->conn->query($cart_action) or die($obj->conn->error);
						if($result_cart){
							require_once('refresh_menu_cart.php');
						}
						else{
							echo 2;
						}
					}
					else{
						echo 2;
					}
				}
				else{
				?>
				<script>
					window.location.href="products.php";
				</script>
				<?php
				}
			}
			else if($type == "2"){
				if(isset($_POST['cart_id'])){
					$cart_id = addslashes($_POST['cart_id']);
					$check_cart = $obj->select("*","user_cart","cart_status='1' AND cart_id='$cart_id' AND cart_user_id='$user_id'");
					if(is_array($check_cart)){
						$cart_action = "UPDATE user_cart SET cart_status='0' WHERE cart_id='$cart_id'";
						$result_cart = $obj->conn->query($cart_action) or die($obj->conn->error);
						if($result_cart){
							require_once('refresh_menu_cart.php');
						}
						else{
							echo 2;
						}
					}
					else{
						echo 3;
					}
				}
				else{
				?>
				<script>
					window.location.href="products.php";
				</script>
				<?php
				}
			}
			else{
			?>
			<script>
				window.location.href="products.php";
			</script>
			<?php
			}
		}
		else{
		?>
		<script>
			window.location.href="logout.php";
		</script>
		<?php
		}
	}
	else{
	?>
	<script>
		window.location.href="products.php";
	</script>
	<?php
	}
	
?>										