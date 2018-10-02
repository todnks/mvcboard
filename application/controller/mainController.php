<?php 
	class mainController extends Controller{
		function basic () {
			$this->list = $this->model->getlist();
		}
	}