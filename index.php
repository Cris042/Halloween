<?php
	session_start();
	define('BASE_DIR',__DIR__.'/');
	define('INCLUDE_PATH','/base/');
	date_default_timezone_set('America/Sao_Paulo');
	
	include('Application.php');
	include('MySql.php');
	include('controllers/Controller.php');
	include('views/View.php');
	include('models/bd.php');
	include('models/main.php');
	
	if(@$_SESSION['inicio_session'] == "")
	    $_SESSION['inicio_session'] =  date('i');

	$application = new Application();
	$application->run();
	ob_end_flush();

?>