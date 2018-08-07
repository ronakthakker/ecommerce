<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	require_once('lib/library_functions.php');
	
	if(isset($_POST['brand_id']) && isset($_POST['category_id']) && isset($_POST['device_id']) && isset($_POST['design_id']) && isset($_POST['design_name']) && isset($_POST['product_title']) && isset($_POST['product_cases']) && isset($_POST['product_sku']) && isset($_POST['product_design']) && isset($_POST['product_mrp']) && isset($_POST['product_selling_price']) && isset($_POST['product_keywords']) && isset($_POST['product_description']) ){
		$image_path_prefix = "";
		$where = "";
		if( isset($_POST['product_id']) && $_POST['product_id'] != "" ){
			$product_id = addslashes($_POST['product_id']);
			$where = "AND product_id!='$product_id'";
		}
		$brand_id = addslashes($_POST['brand_id']);
		$category_id = addslashes($_POST['category_id']);
		$device_id = addslashes($_POST['device_id']);
		$design_id = addslashes($_POST['design_id']);
		$design_name = addslashes($_POST['design_name']);
		$product_title = addslashes($_POST['product_title']);
		$product_cases = addslashes($_POST['product_cases']);
		$product_sku = addslashes($_POST['product_sku']);
		$product_design = addslashes($_POST['product_design']);
		$product_mrp = addslashes($_POST['product_mrp']);
		$product_selling_price = addslashes($_POST['product_selling_price']);
		$product_keywords = addslashes($_POST['product_keywords']);
		$product_description = addslashes($_POST['product_description']);
		if(isset($_FILES['product_image_link']) && $_FILES['product_image_link'] != '' ){
			$logoURI = addslashes($_POST['logoURI']);
		}
		
		$check_product = $obj->select("*","products","product_status='1' AND product_title='$product_title' AND product_sku='$product_sku' $where ");
		if(is_array($check_product)){
			if($check_product[0]['product_sku'] == $product_sku){
				echo 1;
			}
			else{
				echo 5;
			}
		}
		else{
			if(isset($_POST['product_id']) && $_POST['product_id']!= ""){
				$product_image_field = "";
				if(isset($_FILES['product_image_link']) && $_FILES['product_image_link'] != '' ){
					$product_image_link = $_FILES['product_image_link'];
					$old_images = $obj->select("product_image_link","products","product_status = '1' AND product_id = $product_id");
					@unlink($old_images[0]['product_image_link']);
					$binary = file_get_contents($logoURI);
					$uid = guid();
					$product_image_url = 'images/products/'.$uid.'_'.$product_image_link['name'][0];
					$product_image_field = ",product_image_link='$image_path_prefix$product_image_url'";
					file_put_contents('images/products/'.$uid.'_'.$product_image_link['name'][0], $binary);
				}
				
				$update="update products set brand_id='$brand_id', category_id='$category_id', device_id='$device_id', design_id='$design_id', design_name='$design_name', product_title='$product_title', product_cases='$product_cases', product_sku='$product_sku', product_design='$product_design' , product_mrp='$product_mrp', product_selling_price='$product_selling_price', product_keywords='$product_keywords', product_description='$product_description' $product_image_field WHERE product_id =$product_id";
				$result_update = $obj->conn->query($update) or die($obj->conn->error);
				if($result_update){
					echo 2;
				}
				else{
					echo 4;
				}
			}
			else{
				
				$product_image_field = "";
				$product_image_value = "";
				if(isset($_FILES['product_image_link']) && $_FILES['product_image_link'] != '' ){
					$product_image_link = $_FILES['product_image_link'];
					$binary = file_get_contents($logoURI);
					$uid = guid();
					$product_image_url = 'images/products/'.$uid.'_'.$product_image_link['name'][0];
					$product_image_field = ", product_image_link";
					$product_image_value = ", '$image_path_prefix$product_image_url'";
					file_put_contents('images/products/'.$uid.'_'.$product_image_link['name'][0], $binary);
				}
				
				$insert = "insert into products (brand_id, category_id, device_id, design_id, design_name, product_title, product_cases, product_sku, product_design, product_mrp, product_selling_price, product_keywords, product_description $product_image_field) values('$brand_id', '$category_id', '$device_id', '$design_id', '$design_name', '$product_title', '$product_cases', '$product_sku', '$product_design', '$product_mrp', '$product_selling_price', '$product_keywords', '$product_description' $product_image_value)";
				$result_insert = $obj->conn->query($insert) or die($obj->conn->error);
				if($result_insert){
					echo 3;
				}
				else{
					echo 4;
				}
			}
		}
	}
	else{
		echo 4;
	}
?>




