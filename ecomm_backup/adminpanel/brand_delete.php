<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_GET['brand_id']))
	{
		$brand_id = addslashes($_GET['brand_id']);
		$update="update brand_master set brand_status='0' WHERE brand_id =$brand_id"; 
		$result = $obj->conn->query($update) or die($obj->conn->error);
		
		if($result){
		?>
		<script>
			var msg = "4";
			window.location.href="brand_list.php?msg="+msg;
		</script>
		<?php
		}
	}
	
	
?>




