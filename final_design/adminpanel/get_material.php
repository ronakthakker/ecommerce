<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_POST['sub_category_id']))
	{
		$sub_category_id = addslashes($_POST['sub_category_id']);
		$get_material = $obj->select("*","material_master","material_status='1' AND material_sub_category_id='$sub_category_id'");
		if(is_array($get_material)){
		?>
		<option value="0">Please Select a Material </option>
		<?php
			foreach($get_material as $material_val){
			?>
			<option value="<?php echo $material_val['material_id'];?>"> <?php echo $material_val['material_name'];?> </option>
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