<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_GET['product_id']))
	{
		$product_id = addslashes($_GET['product_id']);
		$update="update product_master set product_status='0' WHERE product_id =$product_id"; 
		$result = $obj->conn->query($update) or die($obj->conn->error);
		
		if($result){
		?>
		<script>
			var msg = "4";
			window.location.href="product_list.php?msg="+msg;
		</script>
		<?php
		}
	}
?>