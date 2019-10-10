<?php
	namespace controllers;
	
	class GestaoUsuariosController extends Controller
	{
		
		public function index()
		{   
		
			if (@$_SESSION['sadm'] == true)
				\views\View::render('user/GestaoUsuarios.php','HeaderLogadoSadmin.php','footer.php');
			else
			    \models\main::redirect(INCLUDE_PATH);
		}
	}
?>