<?php 
	class App{

	function __construct(){
		$this->param = $this->param();
		$ctr =  $this->param->type."Controller";
		new $ctr();
	}
		
	function param(){
		if(isset($_GET['param'])) $get = explode("/",$_GET['param']);
		$get['type'] = isset($get[0]) && $get[0] ? $get[0] : "main";
		$get['page'] = isset($get[1]) && $get[1] ? $get[1] : NULL;
		$get['idx'] = isset($get[2]) && $get[2] ? $get[2] : NULL;
		$get['page_num'] = isset($get[2]) && $get[2] ? $get[2] : "1";
		return (object)$get;
	}
}