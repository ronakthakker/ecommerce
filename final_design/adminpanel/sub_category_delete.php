<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_GET['sub_category_id']))
	{
		$sub_category_id = addslashes($_GET['sub_category_id']);
		$update="update sub_category_master set sub_category_status='0' WHERE sub_category_id =$sub_category_id"; 
		$result = $obj->conn->query($update) or die($obj->conn->error);
		
		if($result){
		?>
		<script>
			var msg = "4";
			window.location.href="sub_category_list.php?msg="+msg;
		</script>
		<?php
		}
	}
?>