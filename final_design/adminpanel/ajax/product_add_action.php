<?php
	require_once('../lib/helper.php');
	require_once('../lib/library_functions.php');
	
	@$product_id = $_POST['product_id'];
	$product_name = $obj->data_filter($_POST['product_name']);
	$product_description = addslashes($_POST['product_description']);
	$preparation_of_use = addslashes($_POST['preparation_of_use']);
	$key_words = $obj->data_filter($_POST['key_words']);
	$product_benefits = $obj->data_filter($_POST['product_benefits']);
	$product_ingredients = $obj->data_filter($_POST['product_ingredients']);
	
	$brand_id = $_POST['brand_id'];
	
	
	if(isset($_FILES['product_image']))
	{
		$product_image = $_FILES['product_image'];
	}
	else
	{
		$product_image = '';
	}
	
	
	if($_POST['product_id'] != "")
	{
		$select = $obj->select("*","product","product_name = '$product_name' AND product_id != $product_id AND product_status!='0'");
	}
	else
	{
		$select = $obj->select("*","product","product_name = '$product_name' AND product_status!='0'");
	}
	
	if(is_array($select)){
		if($_POST['product_id'] != "")
		{
			$msg = 1;
			echo 'product_add.php?msg='.$msg.'&product_id='.$product_id;
		}
		else
		{
			$msg = 1;
			echo 'product_add.php?msg='.$msg;
		}
	}
	else{
		if($_POST['product_id'] != "")
		{
			$product_id = $_POST['product_id'];
			
			if($product_image != '')    // For Product Image (Single)
			{
				$old_images = $obj->select("product_image","product","product_status = '1' AND product_id = $product_id");
				
				if($old_images[0]['product_image'] != '')
				{
					@unlink('../'.$old['product_image']);	
				}
				
				$filename = "../images/website_images/product/";
				$path =   compress_image($_FILES['product_image'], $filename,100);
				$path = str_replace("../","",$path);
				
				$product_image_field = ",product_image='$path[0]'";
			}
			else
			{
				$product_image_field = "";
			}
			
			
			$update="update product set brand_id='$brand_id',product_name='$product_name',product_description='$product_description',preparation_of_use='$preparation_of_use',key_words='$key_words',product_benefits='$product_benefits',product_ingredients='$product_ingredients'$product_image_field WHERE product_id =$product_id";
			
			$result = $obj->conn->query($update) or die($obj->conn->error);
			
			
			if($result){
				$msg = 2;
				echo 'product_list.php?msg='.$msg;
			}
		}
		else
		{	
			
			if($product_image == '')    // For Product Image (Single)
			{
				$product_image_field = "";
				$product_image_value = "";
			}
			else
			{				
				$filename = "../images/website_images/product/";
				$path =   compress_image($_FILES['product_image'], $filename,100);
				$path = str_replace("../","",$path);
				
				$product_image_field = ",product_image";
				$product_image_value = ",'$path[0]'";
			}
			
			$insert = "insert into product (brand_id,product_name,product_description,preparation_of_use,key_words,product_benefits,product_ingredients$product_image_field) values('$brand_id','$product_name','$product_description','$preparation_of_use','$key_words','$product_benefits','$product_ingredients'$product_image_value)";
			
			$result = $obj->conn->query($insert) or die($obj->conn->error);
			
			
			if($result){
				$msg = 3;
				echo 'product_list.php?msg='.$msg;
			}
		}
	}
?>




