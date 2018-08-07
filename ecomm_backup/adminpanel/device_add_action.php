<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	
	if(isset($_POST['device_id']) && isset($_POST['device_name']) && isset($_POST['device_category_id']) ){
		$where = "";
		if($_POST['device_id'] != ""){
			$device_id = addslashes($_POST['device_id']);
			$where = "AND device_id!='$device_id'";
		}
		$device_name = addslashes($_POST['device_name']);
		$device_category_id = addslashes($_POST['device_category_id']);
		$check_category = $obj->select("device_name","device_master","device_status='1' AND device_name='$device_name' AND device_category_id='$device_category_id' $where ");
		if(is_array($check_category)){
			echo 1;
		}
		else{
			if($_POST['device_id'] != ''){
				$update="update device_master set device_name='$device_name',device_category_id='$device_category_id' WHERE device_id =$device_id";
				$result_update = $obj->conn->query($update) or die($obj->conn->error);
				if($result_update){
					echo 2;
				}
			}
			else{
				$insert = "insert into device_master (device_name,device_category_id) values('$device_name','$device_category_id')";
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




