<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	
	if(isset($_POST['brand_id']) && isset($_POST['brand_name']) ){
		$where = "";
		if($_POST['brand_id'] != ""){
			$brand_id = addslashes($_POST['brand_id']);
			$where = "AND brand_id!='$brand_id'";
		}
		$brand_name = addslashes($_POST['brand_name']);
		$check_category = $obj->select("brand_name","brand_master","brand_status='1' AND brand_name='$brand_name' $where ");
		if(is_array($check_category)){
			echo 1;
		}
		else{
			if($_POST['brand_id'] != ''){
				$update="update brand_master set brand_name='$brand_name' WHERE brand_id =$brand_id";
				$result_update = $obj->conn->query($update) or die($obj->conn->error);
				if($result_update){
					echo 2;
				}
			}
			else{
				$insert = "insert into brand_master (brand_name) values('$brand_name')";
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




