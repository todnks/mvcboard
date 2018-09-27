<?php 
	class memberModel extends Model{

		function action (){ 
			access($this->idchk()!=0, "시발");
		}

		function idchk(){
			$this->sql = "SELECT * FROM member where id=? and pw=?";
			$this->arr = [$_POST['id'],$_POST['pw']];
			return $this->fetch();
		}

		function login(){
			$this->sql = "SELECT * FROM member where id=? and pw=?";
			return $this->fetch();
		}


}