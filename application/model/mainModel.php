<?php 
	class mainModel extends Model{
		function getlist(){
			return $this->fetchAll("SELECT * FROM board order by date desc");
		}
	}