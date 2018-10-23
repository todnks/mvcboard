<?php 
	Class maincontroller extends controller{
		function basic(){
			$this->list = $this->model->getlist();
		}
	}