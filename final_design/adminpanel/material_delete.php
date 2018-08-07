<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_GET['material_id']))
	{
		$material_id = addslashes($_GET['material_id']);
		$update="update material_master set material_status='0' WHERE material_id =$material_id"; 
		$result = $obj->conn->query($update) or die($obj->conn->error);
		
		if($result){
		?>
		<script>
			var msg = "4";
			window.location.href="material_list.php?msg="+msg;
		</script>
		<?php
		}
	}
?>