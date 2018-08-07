<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	
	if(isset($_POST['category_id']) && isset($_POST['category_name']) ){
		$where = "";
		if($_POST['category_id'] != ""){
			$category_id = addslashes($_POST['category_id']);
			$where = "AND category_id!='$category_id'";
		}
		$category_name = addslashes($_POST['category_name']);
		$check_category = $obj->select("category_name","category_master","category_status='1' AND category_name='$category_name' $where ");
		if(is_array($check_category)){
			echo 1;
		}
		else{
			if($_POST['category_id'] != ''){
				$update="update category_master set category_name='$category_name' WHERE category_id =$category_id";
				$result_update = $obj->conn->query($update) or die($obj->conn->error);
				if($result_update){
					echo 2;
				}
			}
			else{
				$insert = "insert into category_master (category_name) values('$category_name')";
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




