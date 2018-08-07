<?php
	class connect {
		public $conn;
		
		function __construct() { 
			$this->conn = mysqli_connect("localhost","root","","david_new") or die ('Failed to connect to the database');
			//$this->conn = mysqli_connect("localhost","root","","skinbae") or die ('Failed to connect to the database');
		}
		function __destruct() {
			$ans=$this->conn->close();
		}
	}
	
?>