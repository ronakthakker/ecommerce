<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_GET['category_id']))
	{
		$category_id = addslashes($_GET['category_id']);
		$update="update category_master set category_status='0' WHERE category_id =$category_id"; 
		$result = $obj->conn->query($update) or die($obj->conn->error);
		
		if($result){
		?>
		<script>
			var msg = "4";
			window.location.href="category_list.php?msg="+msg;
		</script>
		<?php
		}
	}
?>