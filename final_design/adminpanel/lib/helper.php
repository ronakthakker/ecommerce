<?php
	//require_once('includes/access.php');
	require_once('connect.php');
	
	class helper extends connect{
		
		function select($field,$table,$condition){
			
			if(empty($condition)){
				$condition=1;
			}
			
			$str = "select $field from $table where $condition"; 
			
			
			$result = $this->conn->query($str) or die($this->conn->error);			
			
			
			if($result->num_rows >0){
				
				
				while($ans =$result->fetch_array(MYSQL_BOTH)){
					
					$data[] = $ans;
				}
				return $data;
			}
			
			else{
				return 0;
			}
			
		}
		
		function delete($table,$condition=1){
			
			if(empty($condition)){
				$condition = 1;
			}
			
			$str = "delete from $table where $condition";
			
			$this->conn->query($str) or die($this->conn->error);
		}
		
		
		function update($table,$field,$condition=1){
			
			if(empty($condition)){ $condition=1; }
			
			$str = "update $table set $field where $condition ";
			$this->conn->query($str) or die($this->conn->error);
		}
		
		function data_filter($data){
			return $this->conn->real_escape_string(strip_tags(addslashes(trim($data))));
		}
		
		function data_editor_filter($data){
			return $this->conn->real_escape_string(addslashes(trim($data)));
		}
		
	}
	
	$obj = new helper();
?>	