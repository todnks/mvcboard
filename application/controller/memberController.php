<?php 
	class memberController extends Controller{

		function join(){
			memberchk();
			if(isset($_POST['action'])) $this->model->process();
		}

		function login(){
			memberchk();
			if(isset($_POST['action'])) {
				$a = $this->model->login();
				access($a == "","아이디 또는 비밀번호가 일치하지 않음");
				$_SESSION['member'] = $a;
				alert("로그인 완료");
				move("/");
			}
		}
	}