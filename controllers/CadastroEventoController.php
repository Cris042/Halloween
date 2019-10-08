<?php
	namespace controllers;
	
	class CadastroEventoController extends Controller
	{
		
		public function index()
		{
		
			if(isset($_POST['logar']))
				\models\main::logar();
				
			if(@$_SESSION['adm'] == true)
				\views\View::render('user/CadastroEvento.php','header.logado.adm.php','footer.none.php');
			else if (@$_SESSION['sadm'] == true)
				\views\View::render('user/CadastroEvento.php','HeaderLogadoSadmin.php','footer.php');
			else
			    \models\main::redirect(INCLUDE_PATH);
		}
	}
?>