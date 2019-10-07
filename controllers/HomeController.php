<?php
	namespace controllers;
	
	class HomeController extends Controller
	{
		
		public function index()
		{
			
			if(isset($_POST['logar']))
				\models\main::logar();
				
			if (isset($_GET['loggout'])) 
				\models\main::sair();

			if(@$_SESSION['user'] == true  )
				\views\View::render('user/home.php','header.logado.user.php','footer.php');
			else if(@$_SESSION['adm'] == true )
			     \views\View::render('user/home.php','header.logado.adm.php','footer.php');
			else
			    \views\View::render('user/home.php');
		}
	}
?>