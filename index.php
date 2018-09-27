<?php 
	//상수정의	
	const _ROOT = __DIR__."/";
	const _APP = _ROOT."application/";
	const _CORE = _APP."core/";
	const _MODEL = _APP."model/";
	const _CTR = _APP."controller/";
	const _VIEW = _APP."view/";
	const _TEM = _VIEW."template/";
	require_once(_CORE."lib.php");

	App::start();
	controller::start();