<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	
	if(isset($_POST['design_id']) && isset($_POST['design_name']) ){
		$where = "";
		if($_POST['design_id'] != ""){
			$design_id = addslashes($_POST['design_id']);
			$where = "AND design_id!='$design_id'";
		}
		$design_name = addslashes($_POST['design_name']);
		$check_category = $obj->select("design_name","design_master","design_status='1' AND design_name='$design_name' $where ");
		if(is_array($check_category)){
			echo 1;
		}
		else{
			if($_POST['design_id'] != ''){
				$update="update design_master set design_name='$design_name' WHERE design_id =$design_id";
				$result_update = $obj->conn->query($update) or die($obj->conn->error);
				if($result_update){
					echo 2;
				}
			}
			else{
				$insert = "insert into design_master (design_name) values('$design_name')";
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




