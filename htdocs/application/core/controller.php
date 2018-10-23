<?php 
	Class controller{

		function __construct(){
			$this->param = App::param();
			$model = "model{$this->param->type}";
			new $model();
			$this->model = new $model();
			$this->index();
		}

		function index(){
			$method = isset($this->param->page) ? $this->param->page : "basic";
			if(method_exists($this,$method))$this->$method();
			$this->include();
			$this->main();
		}

		function main(){
		if(isset($this->param->page)){ $this->action();
			include_once(_VIEW."{$this->param->type}/{$this->param->page}.php");
				} else{
			include_once(_VIEW."main.php");
			}
		}

		function include(){
			include_once(_VIEW."header.php");
			include_once(_VIEW."footer.php");
		}
	}