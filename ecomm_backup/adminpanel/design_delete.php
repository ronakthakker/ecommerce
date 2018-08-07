<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_GET['design_id']))
	{
		$design_id = addslashes($_GET['design_id']);
		$update="update design_master set design_status='0' WHERE design_id =$design_id"; 
		$result = $obj->conn->query($update) or die($obj->conn->error);
		
		if($result){
		?>
		<script>
			var msg = "4";
			window.location.href="design_list.php?msg="+msg;
		</script>
		<?php
		}
	}
	
	
?>




