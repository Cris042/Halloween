<?php
    
    namespace models;
    
    class main
    {
        function limita_caracteres($texto, $limite, $quebra = true)
		{
			$tamanho = strlen($texto);
			if($tamanho <= $limite)
			{ 
			   $novo_texto = $texto;
			}
			else
			{ 
			   if($quebra == true)
			   { 
				  $novo_texto = trim(substr($texto, 0, $limite))."...";
			   }
			   else
			   { 
				  $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); 
				  $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."..."; 
			   }
			}
			return $novo_texto;
		}

		public static function logar()
		{
			
			    $email = strip_tags($_POST['email']);
				$senha = strip_tags( sha1( $_POST['senha'] ) );
			
				$user = \MySql::conectar()->prepare("SELECT * FROM `user` WHERE email = ? AND senha = ? ");
				$user ->execute(array($email,$senha));
	
				if($user ->rowCount() == 1)
				{  
					$result = $user->fetch();
					if($result['cod'] == 0)				 
						$_SESSION['user'] = true;
					else if($result['cod'] == 1)
						$_SESSION['adm'] = true;
					else
						$_SESSION['super_adm'] = true;
					
					$_SESSION['id'] = $result['id'];
					$_SESSION['email'] = $result['email'];
					$_SESSION['img'] = $result['img'];
					$_SESSION['sessao'] = md5($_SESSION['id'].$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT']);
					
				}
				else
				{
					echo '
					<script>
						alert("Usuario nao encontado");
					</script>';
				}
		}

		public static function sair()
		{
			session_destroy();
			self::redirect(INCLUDE_PATH);
		}

		public static function redirect($url)
		{
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

		public static function imagemValida($imagem)
		{
				if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' ||$imagem['type'] == 'image/png')		   
					return true;
				else
					return false;

		}
		public static function uploadFile($file)
		{
			define('BASE_DIR',__DIR__.'/');
			$formatoArquivo = explode('.',$file['name']);
			$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
			if(move_uploaded_file($file['tmp_name'],BASE_DIR.'../views/templates/upload/'.$imagemNome))
					return $imagemNome;
			else
					return false;
		}

    }
?>