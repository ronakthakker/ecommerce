<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_POST['category_id']))
	{
		$category_id = addslashes($_POST['category_id']);
		$get_sub_categories = $obj->select("*","sub_category_master","sub_category_status='1' AND sub_category_category_id='$category_id'");
		if(is_array($get_sub_categories)){
		?>
		<option value="0">Please Select a Category </option>
		<?php
			foreach($get_sub_categories as $sub_category_val){
			?>
			<option <?php if(addslashes(isset($_POST['material_sub_category_id']))){ if($sub_category_val['sub_category_id'] == addslashes($_POST['material_sub_category_id']) ){ echo "selected='selected'";} } ?> value="<?php echo $sub_category_val['sub_category_id'];?>"> <?php echo $sub_category_val['sub_category_name'];?> </option>
			<?php
			}
		}
		else{ 
		?>
		<option value='0'> No Category available</option>
		<?php
		}
	}
	else{
	?>
	<option value='0'> Please Select a valid Category</option>
	<?php
	}
?>