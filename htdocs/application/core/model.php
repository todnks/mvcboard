<?php 
	class model{

		function __construct(){
			$this->param = App::param();
			$this->exeArr = [];
		}

		function dbcon(){
			$this->db = new PDO("mysql:host=localhost;dbname=mvc;charset=utf8","root","");
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		}

		function dbcut(){
			$this->db = NULL;
		}

		protected function query($sql = false){
			$this->dbcon();
			if($sql) $this->sql = $sql;
			$res = $this->db->prepare($this->sql);
			if(!$res->execute($this->exeArr)) {
				echo "<pre>";
				print_r($this->sql);
				echo "</pre>";
			} else{
				return $res;
			}
			$this->dbcut();
		}

		protected function fetch($sql = false){
			if($sql) $this->sql = $sql;
			return $this->query()->fetch();
		}

		protected function fetchAll($sql = false){
			if($sql) $this->sql = $sql;
			return $this->query()->fetchAll();
		}

		protected function rowCount($sql = false){
			if($sql) $this->sql = $sql;
			return $this->query()->rowCount();
		}

		protected function getexearr($post,$cancel){
			$cancel = explode("/",$cancel);
			$column = "";
			foreach ($post as $key => $val) {
				if(!in_array($key, $cancel)){
					$column .= in_array($key,['pw']) ? ",".hash("sha512",$val) : ",".$val;
				}
			}
			$this->exeArr = explode(",", substr($column, 1));
		}
	}