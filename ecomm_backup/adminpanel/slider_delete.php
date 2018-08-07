<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_GET['slider_id'])){
		$slider_id = addslashes($_GET['slider_id']);
		$sel_slider = $obj->select("*","slider_master","slider_status='1' AND slider_id='$slider_id'");
		if(is_array($sel_slider)){
			@unlink($sel_slider[0]['slider_image_link']);
			$update="update slider_master set slider_status='0' WHERE slider_id ='$slider_id'"; 
			$result = $obj->conn->query($update) or die($obj->conn->error);
			if($result){
			?>
			<script>
				var msg = "4";
				window.location.href="slider_list.php?msg="+msg;
			</script>
			<?php
			}
		}
		else{
		?>
		<script>
			window.location.href="slider_list.php?msg;
		</script>
		<?php
		}
	}
	else{
	?>
	<script>
		window.location.href="slider_list.php?msg;
	</script>
	<?php
	}
?>




