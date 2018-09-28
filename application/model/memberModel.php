<?php 
	class memberModel extends Model{

		function idchk(){
			$this->sql = "SELECT * FROM member where id='{$_POST['id']}'";
			return $this->cnt();
		}
		function login(){
			$this->sql = "SELECT * FROM member where id='{$_POST['id']}' and pw='{$_POST['pw']}'";
			return $this->fetch();
		}


		function process(){
			$this->action = $_POST['action'];
			$this->table = "member";
			$cancel = "/action";
			$add_sql = "";
			access($this->idChk() != 0,"중복된 아이디 입니다.");
			$column = $this->get_column($_POST,$cancel);
			$add_sql .= ", date=now()";
			$add_sql .= ", change_date=now()";
			$column .= $add_sql;
			access($this->get_query($column),"회원가입이 완료되었습니다.","/");
		}
	}