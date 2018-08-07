<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	require_once('lib/library_functions.php');
	if(isset($_POST['slider_order']) && isset($_POST['slider_id'])){
		$where = "";
		if($_POST['slider_id'] != ""){
			$slider_id = addslashes($_POST['slider_id']);
			$where = "AND slider_id!='$slider_id'";
		}
		$slider_order = addslashes($_POST['slider_order']);
		$check_order = $obj->select("slider_order","slider_master","slider_status='1' AND slider_order='$slider_order' $where ");
		if(is_array($check_order)){
			echo 1;
		}
		else{
			if($_POST['slider_id'] != ''){
				$update_append = "";
				if(isset($_FILES['slider_image_link'])){
					$old_image = $data=$obj->select("*","slider_master","slider_status='1' AND slider_id='$slider_id'");
					if(is_array($old_image)){
						@unlink($old_image[0]['slider_image_link']);
						$slider_path_arr = compress_image($_FILES['slider_image_link'], "images/sliders/", "100");
						$slider_image_link = $slider_path_arr[0];
						$update_append = ",slider_image_link ='$slider_image_link'";
					}
					else{
						echo 4;
					}
				}
				$update="update slider_master set slider_order='$slider_order' $update_append WHERE slider_id='$slider_id'";
				$result_update = $obj->conn->query($update) or die($obj->conn->error);
				if($result_update){
				echo 2;
				}
			}
			else{
				$inser_field = "";
				$inser_value = "";
				if(isset($_FILES['slider_image_link'])){
					$slider_path_arr = compress_image($_FILES['slider_image_link'], "images/sliders/", "100");
					$slider_image_link = $slider_path_arr[0];
					$inser_field = ",slider_image_link";
					$inser_value = ",'$slider_image_link'";
				}
				$insert = "insert into slider_master (slider_order $inser_field ) values('$slider_order' $inser_value )";
				$result_insert = $obj->conn->query($insert) or die($obj->conn->error);
				if($result_insert){
					echo 3;
				}
			}
		}
	}
	else{
		echo 4;
	}
?>