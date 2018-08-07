<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	if(isset($_POST['brand_id']))
	{
		$brand_id = addslashes($_POST['brand_id']);
		$get_categories = $obj->select("*","category_master","category_status='1' AND category_brand_id='$brand_id'");
		if(is_array($get_categories)){
		?>
		<option value="0">Please Select a Category </option>
		<?php
			foreach($get_categories as $category_val){
			?>
			<option <?php if(addslashes(isset($_POST['device_category_id']))){ if($category_val['category_id'] == addslashes($_POST['device_category_id']) ){ echo "selected='selected'";} } ?> value="<?php echo $category_val['category_id'];?>"> <?php echo $category_val['category_name'];?> </option>
			<?php
			}
		}
		else{
		?>
		<option value='0'> No Brands available</option>
		<?php
		}
	}
	else{
	?>
	<option value='0'> Please Select a valid Brand</option>
	<?php
	}
?>