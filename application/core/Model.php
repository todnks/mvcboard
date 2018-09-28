<?php 
	Class Model{

		protected $db;
		protected $param;
		protected $sql;
		
		//서버연결
		function condb(){
			$this->db = new PDO("mysql:host=localhost;dbname=mvc;charset=utf8;","root","");
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		}
		//서버끊기
		function cutdb(){
			$this->db = "";
		}
		//쿼리문 설정
		protected function query($sql = false){
			$this->condb();
			if($sql) $this->sql = $sql;
			$res = $this->db->query($this->sql);
			if(!$res){
				echo $this->sql;
				echo "<pre>";
				print_r($this->db->errorInfo());
				echo "</pre>";
			} else{
				return $res;
			}
			$this->cutdb();
		}

		protected function fetch($sql = false){
			if($sql) $this->sql = $sql;
			return $this->query()->fetch();
		}

		protected function fetchAll($sql = false){
			if($sql) $this->sql = $sql;
			return $this->query()->fetchAll();
		}

		protected function cnt($sql = false){
			return $this->query()->rowCount();
		}

		protected function get_column($arr,$cancel){
			$cancel = explode("/",$cancel);
			$column = "";
			foreach ($arr as $key => $value) {
				if(!in_array($key, $cancel)) {
					$column .= ", '{$key}'='{$value}'";
				}
			}
			return substr($column, 2);
		}

		protected function get_query($column){
			switch ($this->action) {
				case 'insert':
					$sql = "INSERT INTO {$this->table} SET ";
					break;
				case 'delete':
					$sql = "DELETE FROM {$this->table} ";
				break;
				case 'update':
					$sql = "UPDATE {$this->table} SET";
					break;
			}
			$sql .= $column;
			return $this->query($sql);
		}
	}