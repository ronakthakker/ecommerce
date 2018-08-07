<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	
	if(isset($_POST['sub_category_id']) && isset($_POST['sub_category_name']) && isset($_POST['sub_category_category_id']) ){
		$where = "";
		if($_POST['sub_category_id'] != ""){
			$sub_category_id = addslashes($_POST['sub_category_id']);
			$where = "AND sub_category_id!='$sub_category_id'";
		}
		$sub_category_name = addslashes($_POST['sub_category_name']);
		$sub_category_category_id = addslashes($_POST['sub_category_category_id']);
		$check_sub_category = $obj->select("sub_category_name","sub_category_master","sub_category_status='1' AND sub_category_name='$sub_category_name' AND sub_category_category_id='$sub_category_category_id' $where ");
		if(is_array($check_sub_category)){
			echo 1;
		}
		else{
			if($_POST['sub_category_id'] != ''){
				$update="update sub_category_master set sub_category_name='$sub_category_name',sub_category_category_id='$sub_category_category_id' WHERE sub_category_id =$sub_category_id";
				$result_update = $obj->conn->query($update) or die($obj->conn->error);
				if($result_update){
					echo 2;
				}
			}
			else{
				$insert = "insert into sub_category_master (sub_category_name,sub_category_category_id) values('$sub_category_name','$sub_category_category_id')";
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




