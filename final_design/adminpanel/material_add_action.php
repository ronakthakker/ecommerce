<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	
	if(isset($_POST['material_id']) && isset($_POST['material_name']) && isset($_POST['material_sub_category_id']) ){
		$where = "";
		if($_POST['material_id'] != ""){
			$material_id = addslashes($_POST['material_id']);
			$where = "AND material_id!='$material_id'";
		}
		$material_name = addslashes($_POST['material_name']);
		$material_sub_category_id = addslashes($_POST['material_sub_category_id']);
		$check_sub_category = $obj->select("material_name","material_master","material_status='1' AND material_name='$material_name' AND material_sub_category_id='$material_sub_category_id' $where ");
		if(is_array($check_sub_category)){
			echo 1;
		}
		else{
			if($_POST['material_id'] != ''){
				$update="update material_master set material_name='$material_name',material_sub_category_id='$material_sub_category_id' WHERE material_id =$material_id";
				$result_update = $obj->conn->query($update) or die($obj->conn->error);
				if($result_update){
					echo 2;
				}
			}
			else{
				$insert = "insert into material_master (material_name,material_sub_category_id) values('$material_name','$material_sub_category_id')";
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




