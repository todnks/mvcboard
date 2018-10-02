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
			access($data->midx != )
		}
}