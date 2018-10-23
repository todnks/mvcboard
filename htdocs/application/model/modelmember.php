<?php 
	class modelmember extends model{
		function idchk(){
			$this->sql = "SELECT * FROM member where id=?";
			$this->exeArr = [$_POST['id']];
			return $this->rowCount();
		}

		function login(){
			$this->sql = "SELECT * FROM member where id=? and pw=?";
			$this->exeArr = [$_POST['id'],hash("sha512",$_POST['pw'])];
			return $this->fetch();
		}

		function uploaddate(){
			$this->sql = "UPDATE member SET change_date=now() where id=? and pw=?";
			$this->exeArr = [$_POST['id'],hash("sha512",$_POST['pw'])];
			return $this->query();
		}

		function delete(){
			$file = $this->fetchAll("SELECT * FROM board where midx='{$_SESSION['member']->idx}'");
			$this->sql = "
				DELETE FROM member where idx='{$_SESSION['member']->idx}';
			";
			return $this->query();
		}

		function action(){
			switch ($_POST['action']) {
				case 'join':
				access($this->idchk() != 0,"중복된 아이디가 존재합니다");
				$this->sql = "INSERT INTO member SET id=?, pw=?, name=?, date=now()";
				$this->getExeArr($_POST,"/action");
				$this->query();
				break;
				case 'login':
				$member = $this->login();
				access($member == "","아이디또는 비밀번호가 틀렸습니다");
				$this->uploaddate();
				$_SESSION['member'] = $member;
				break;
			}
			alert("완료되었습니다");
			move("/");
		}
	}