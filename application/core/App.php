<?php 

	class App{

		public $param;
		public $type;
		public $page;
		public $idx;
		public $page_num;
		public $member;
		public $ismember;
		public static $value;

		//url주소를 변수로 지정 
		function __construct(){
		if(isset($_GET['param'])) $get = explode("/", $_GET['param']);
		$this->type = isset($get[0]) ?  $get[0] : "main";
		$this->page = isset($get[1]) ? $get[1] : NULL;
		$this->idx = isset($get[2]) ? $get[2] : NULL;
		$this->page_num = isset($get[2]) ? $get[2] : "1";
		$this->member = isset($_SESSION['member']) ? $_SESSION['member'] : NULL;
		$this->ismember = isset($this->member) ? true : false;
		self::$value = $this;
	}

	function start(){
		self::$value = new App();
		return self::$value;
	}
}