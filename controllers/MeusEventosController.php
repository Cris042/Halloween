<?php
	namespace controllers;
	
	class MeusEventosController extends Controller
	{
		
		public function index()
		{
		
			
			if(@$_SESSION['user'] == true)
				\views\View::render('user/EventosUser.php','header.logado.user.php','footer.php');
			else if (@$_SESSION['adm'] == true)
				\views\View::render('user/EventosUser.php','header.logado.adm.php','footer.php');
			else if (@$_SESSION['sadm'] == true)
				\views\View::render('user/EventosUser.php','HeaderLogadoSadmin.php','footer.php');
			else
			    \models\main::redirect(INCLUDE_PATH);
		}
	}
?>