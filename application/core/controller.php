 <?php 

	class Controller{

		public $param;
		public $type;
		public $page;
		public $idx;
		public $ctr;
		public $ctrname;
		public $modelname;
		
		public function start(){
			$param = App::start();
			$ctrname = $param->type."Controller";
			$modelname = $param->type."Model";
			$ctr = new $ctrname;
			$ctr->model = new $modelname;
			$ctr->param = $param;
			$ctr->index();
		}

		protected function index(){
			$method = isset($this->param->page) ? $this->param->page : "basic";
			if(method_exists($this,$method)) $this->$method();
			$this->header();
			$this->content();
			$this->footer();
		}

		protected function header(){
			include_once(_TEM."header.php");
		}

		protected function content(){
			if(isset($this->param->page)){
				include_once(_VIEW."{$this->param->type}/{$this->param->page}.php");
			} else{
				include_once(_TEM."main.php");
			}
		}
		protected function footer(){
			include_once(_TEM."footer.php");
		}
}