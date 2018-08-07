<?php
	if(!session_id()){
		session_start();
	}
	require_once("../lib/helper.php");
	require_once("../lib/library_functions.php");
	
	$user_username = $obj->data_filter($_POST['user_name']);
	$user_password = sha1($obj->data_filter($_POST['user_password']));
	
	$is_admin = $obj->select("user_id","user_master","user_username = '$user_username' AND user_password = '$user_password' AND user_status = '2' ");
	if(is_array($is_admin)){
		$_SESSION['skinbae_admin_id'] = $is_admin[0]['user_id']; 
		echo 1;
	}
	else
	{
		echo 2;
	}
	
	
?>