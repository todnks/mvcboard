<?php 
	Class modelmain extends model{
		function getlist(){
			return $this->fetchAll("SELECT * FROM board order by date desc");
		}
	}