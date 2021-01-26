<?php  

	error_reporting(E_ALL);

	ini_set("display_errors",1);

	$autoload = function($class)
	{
		include(str_replace('\\','/',$class.'.php'));
	};

	spl_autoload_register($autoload);

	$app = new App();
	$app->setUrl();
	$app->Execute();
