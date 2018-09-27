<?php 
	class Model{
		//서버연결
		function condb(){
			$this->db = new PDO("mysql:host=localhost;");
		}
	}
 ?>	