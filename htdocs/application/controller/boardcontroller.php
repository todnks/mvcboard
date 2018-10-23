<?php 
	class boardcontroller extends controller{
		function action(){
			if(isset($_POST['action'])) $this->model->boardaction();
		}

		function view(){
			$this->view = $this->model->getview();
			$this->prev = $this->model->prev();
			$this->next = $this->model->next();
			access($this->view == "","존재하지않는 페이지입니다");
		}

		function update(){
			loginchk();
			$this->view();
			$this->action();
			access($this->view->midx != $_SESSION['member']->idx,"작성자만 접근할수있습니다");
		}

		function delete(){
			loginchk();
			$this->model->delete();
			alert("삭제");
			move("/");
		}
	}