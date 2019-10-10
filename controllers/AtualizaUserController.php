<?php
	namespace controllers;
	
	class AtualizaUserController extends Controller
	{
		
		public function index()
		{   
		
			if (@$_SESSION['sadm'] == true)
				\views\View::render('user/AtualizaUser.php','HeaderLogadoSadmin.php','footer.php');
			else
			    \models\main::redirect(INCLUDE_PATH);
		}
	}
?>