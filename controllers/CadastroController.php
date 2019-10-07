<?php
	namespace controllers;
	
	class CadastroController extends Controller
	{
		
		public function index()
		{
		
			if(isset($_POST['logar']))
				\models\main::logar();
				
			if(@$_SESSION['sessao'] != true)
				\views\View::render('user/cadastro.php','','footer.none.php');
			else
			    \models\main::redirect(INCLUDE_PATH);
		}
	}
?>