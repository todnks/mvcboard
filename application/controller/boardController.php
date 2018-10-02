<?php 
	Class boardController extends Controller{

		function write(){
			loginchk();
			if(isset($_POST['action'])) $this->model->process();
		}

		function view(){
			$this->view = $this->model->getview();
			
		}
	}