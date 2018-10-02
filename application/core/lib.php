<?php 
	session_start();
	//경고창
	function alert($msg){
		echo "<script>alert('{$msg}');</script>";
	}
	//페이지 이동
	function move($url = false){
		echo "<script>";
			echo $url ? "location.href='{$url}'" : "history.back();";
		echo "</script>";
		exit;
	}
	//조건문실행->경고창->페이지 이동
	function access($bool,$msg,$url = false){
		if ($bool) {
			alert($msg);
			move($url);
		}
	}
	//로그인체크
	function loginchk(){
		access(!isset($_SESSION['member']),"로그인후애 이용가능합니다");
	}
	//회원체크
	function memberchk(){
		access(isset($_SESSION['member']),"회원은 이용이 불가능합니다");
	}
	//autoload
	function __autoload ($className) {
		$className2 = strtolower($className);
		switch ($className2) {
			case 'model':
			case 'app':
			case 'controller':
				$file = _CORE."{$className}.php";
			break;
			default:
				$file = strpos($className2, "model") ? _MODEL : _CTR;
				$file .= $className.".php";
			break;
		}
		require_once($file);
	}
	//프린트pre
	function print_pre ($val) {
		echo "<pre>";
			print_r($val);
		echo "</pre>";
	}