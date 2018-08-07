<!DOCTYPE html>
<html lang="en">
	<?php
		require_once('includes/header.php');
	?>
	<script src="js/jquery-1.11.1.min.js"></script>
	<section>
		<div class="mainwrapper">
			<div class="mainpanel">
				<?php
					$apple_products = $obj->select("product_id,product_image_link","product_apple","product_image_link!='' LIMIT 15001,5000 ");
					if(is_array($apple_products)){
						foreach($apple_products as $apple_val){
							$product_id = $apple_val['product_id'];
							$str= $apple_val['product_image_link'];
							$base = basename($str);
							$check_present = $obj->select("product_temp_name","product_apple","product_temp_name = '$base'");
							if(is_array($check_present)){
								$curr_base = basename($str,".php");
								$filename = explode(".",$curr_base);
								$new_filename = $filename[0];
								$curr_count = count($check_present);
								$new_base = $new_filename." (".$curr_count.").jpg";
								$update = "UPDATE product_apple SET product_temp_name='$base' ,product_image_name='$new_base' WHERE product_id='$product_id'";
							}
							else{
								$update = "UPDATE product_apple SET product_temp_name='$base' ,product_image_name='$base' WHERE product_id='$product_id'";
							}
							//$result_update = $obj->conn->query($update) or die($obj->conn->error);
						?>
						<br/>
						<br/>
						<a href="<?php echo $apple_val['product_image_link'] . '?pid='.$apple_val['product_id']  ; ?>" download="<?php echo $apple_val['product_id'].".jpg"; ?>" id="<?php echo $apple_val['product_id']; ?>" > </a>
						<script>
							//$('#'+<?php echo $apple_val['product_id']; ?>).get(0).click();
						</script>
						<?php
						}
					}
				?>
			</div>
		</div>
	</section>
</html>	