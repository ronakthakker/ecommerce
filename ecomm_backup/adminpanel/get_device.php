<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_POST['category_id']))
	{
		$category_id = addslashes($_POST['category_id']);
		$get_device = $obj->select("*","device_master","device_status='1' AND device_category_id='$category_id'");
		if(is_array($get_device)){
		?>
		<option value="0">Please Select a Device </option>
		<?php
			foreach($get_device as $device_val){
			?>
			<option value="<?php echo $device_val['device_id'];?>"> <?php echo $device_val['device_name'];?> </option>
			<?php
			}
		}
		else{
		?>
		<option value='0'> No Devices available</option>
		<?php
		}
	}
	else{
	?>
	<option value='0'> Please Select a valid Category</option>
	<?php
	}
?>