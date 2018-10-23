<?php 
	Class memberController extends Controller{
	
		function action(){
			if(isset($_POST['action'])) $this->model->action();
		}

		function logout(){
			loginchk(); 
			access(session_destroy(),"로그아웃","/");
		}

		function mypage(){
			access(loginchk(),"","/");
		}

		function memberdelete(){
			loginchk();
			$this->model->delete();
			session_destroy();
			alert("삭제 되었습니다");
			move("/");
	}
}