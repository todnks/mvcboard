<?php 
	session_start();

	function alert($msg){
		echo "<script>alert('{$msg}');</script>";
	}

	function move ($url = false) {
		echo "<script>";
			echo $url ? "location.replace('{$url}');" : "history.back();";
		echo "</script>";
		exit;
	}

	function access($bool,$msg,$url = false){
		if ($bool) {
			alert($msg);
			move($url);
		}
	}

	function memberchk(){
		access(isset($_SESSION['member']),"로그인후에는 이용이 불가능합니다","/");
	}

	function loginchk(){
		access(!isset($_SESSION['member']),"회원만 이용가능합니다");
	}

	function __autoload($className){
		$className2 = strtolower($className);
		switch ($className2) {
			case 'app':
			case 'model':
			case 'controller':
				$dir = _CORE."{$className}.php";
				break;
			default:
				$dir = strpos($className2,"controller") ? _CON : _MODEL;
				$dir .= "{$className}.php";
			break;
		}
		require_once($dir);
	}