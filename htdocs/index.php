<?php 

	//상수정리
	const _ROOT = __DIR__."/";
	const _APP = _ROOT."application/";
	const _MODEL = _APP."model/";
	const _VIEW = _APP."view/";
	const _CON = _APP."controller/";
	const _CORE = _APP."core/";

	require_once(_CORE."config.php");
	new App();