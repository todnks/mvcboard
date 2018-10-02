<?php 
	Class boardModel extends Model{

		function getView(){
			if($this->param->page == "view"){
				$this->query("UPDATE board SET hit=hit+1 where idx='{$this->param->idx}'");
			}
			return $this->fetch("SELECT * FROM board where idx='{$this->param->idx}'");
		}

		function prev(){
			$prev = (array)$this->fetch("SELECT max(idx) FROM board where idx < '{$this->param->idx}'");
			return $prev['max(idx)'];
		}

		function next(){
			$next = (array)$this->fetch("SELECT min(idx) FROM board where idx > '{$this->param->idx}'");
			return $prev['min(idx)'];
		}

		function delete(){
			$data = $this->getView();
			access($data->midx != $_SESSION['memeber']->idx,"작성자만 접근");
			@unlink(_DATA.$data->change_name);
			$this->query("DELETE FROM board where idx='{$this->param->idx}'");
		}

		function process(){
			$this->action = $_POST['action'];
			$this->table = "board";
			$cancel = "/action/file";
			$column = $this->get_column($_POST,$cancel);
			$add_sql = "";
			$change_name = "";
			$data = $this->getView();
			switch ($this->action) {
				case 'insert':
					if(isset($_FILES['file']) && $_FILES['file']['tmp_name'] != ""){
						$change_name = file_upload($_FILES['file']);
						@unlink(_DATA.$data->change_name);
						$add_sql .= ", file_name='{$_FILES['file']['name']}'";
						$add_sql .= ", file_size='{$_FILES['file']['size']}'";
						$add_sql .= ", change_name='{$change_name}'";
					}
					$add_sql .= ", date=now()";
					break;
				
				default:
					# code...
					break;
			}
		}
}