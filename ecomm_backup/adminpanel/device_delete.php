<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_GET['device_id']))
	{
		$device_id = addslashes($_GET['device_id']);
		$update="update device_master set device_status='0' WHERE device_id =$device_id"; 
		$result = $obj->conn->query($update) or die($obj->conn->error);
		
		if($result){
		?>
		<script>
			var msg = "4";
			window.location.href="device_list.php?msg="+msg;
		</script>
		<?php
		}
	}
?>