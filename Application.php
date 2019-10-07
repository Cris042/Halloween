<?php
	
	class Application{

		const DEFAULT = 'Home';
		public function run()
		{
			$token = md5(@$_SESSION['id'].$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);

			if(isset($_GET['url']))
			{
				$url = explode('/',$_GET['url']);
				$Arquivo = 'controllers/'.ucfirst($url[0]).'Controller.php';
				if(file_exists($Arquivo))
				{
				    $class = 'controllers\\'.ucfirst($url[0]).'Controller';
				    include($Arquivo);
				}
				else
				{
					$class = 'controllers\\'.self::DEFAULT.'Controller';
					$Arquivo = 'controllers/'.self::DEFAULT.'Controller.php';
					$url[0] = self::DEFAULT;
					include($Arquivo);
				}
				   
			}
			else
			{
				$class = 'controllers\\'.self::DEFAULT.'Controller';
				$Arquivo = 'controllers/'.self::DEFAULT.'Controller.php';
				$url[0] = self::DEFAULT;
				include($Arquivo);
			}
			 
			if(@$_SESSION['sessao'] != null)
			{
				if($token == @$_SESSION['sessao'])
				{
					$controller = new $class();
					$controller->index();
				}
				else
				   die("ERRO 404");
			}
			else
			{			
					$controller = new $class();
					$controller->index();
			}

			
		
		}

	}

?>