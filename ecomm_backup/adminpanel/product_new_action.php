<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_POST['product_id']) && isset($_POST['is_new'])){
		$product_id = addslashes($_POST['product_id']);
		$is_new = addslashes($_POST['is_new']);
		
		$check_prod = $obj->select("*","products","product_status='1'");
		if(is_array($check_prod)){
			$update_is_new = "UPDATE products SET is_new='$is_new' WHERE product_id='$product_id'";
			$result_update = $obj->conn->query($update_is_new) or die($obj->conn->error);
			if($result_update){
				echo 1;
			}
			else{
				echo 2;
			}
		}
	}
	else{
	?>
	<script> window.location.href="product_list.php"; </script>
	<?php
	}
?>