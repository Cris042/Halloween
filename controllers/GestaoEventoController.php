<?php
	namespace controllers;
	
	class GestaoEventoController extends Controller
	{
		
		public function index()
		{   
		
			if (@$_SESSION['sadm'] == true)
				\views\View::render('user/GestaoEvento.php','HeaderLogadoSadmin.php','footer.none.php');
			else
			    \models\main::redirect(INCLUDE_PATH);
		}
	}
?>