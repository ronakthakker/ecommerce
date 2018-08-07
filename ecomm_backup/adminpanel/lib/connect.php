<?php
	class connect {
		public $conn;
		
		function __construct() { 
			//$this->conn = mysqli_connect("localhost","skinbae","skinbae@123*","skinbae") or die ('Failed to connect to the database');
			$this->conn = mysqli_connect("localhost","root","","ecom_backup") or die ('Failed to connect to the database');
		}
		function __destruct() {
			$ans=$this->conn->close();
		}
	}
	
?>