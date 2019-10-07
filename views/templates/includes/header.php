<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Ola mundo</title>
		<!--======================================= Meta tags==============================================-->
		<meta charset="UTF-8">	
		<!--======================================= Meta tags==============================================-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!--===============================================================================================-->	
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--===============================================================================================-->	
		<link rel="shortcut icon" href="views/templates/img/" />
		<!--===============================================================================================-->	
		<meta name="description" content="" />
		<!--===============================================================================================-->	
		<meta name="google" value="notranslate">
	    <!--===============================================================================================-->	
		<meta name="keywords" content="" />
		<!--===============================================================================================-->
		
		<!--========================================= css =================================================-->	
		<link rel="stylesheet" type="text/css" href="views/templates/css/bootstrap.css" />
		<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="views/templates/css/coroliby.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="views/templates/css/style.css" />
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="views/templates/fonts/fontawesome/css/all.css" /> 
		<!--===============================================================================================-->	

    </head>
    
    <body>
		<div class="main-page-wrapper">
		<header>
			<div class="center">
				<div class="logo left">
					<a href="<?php echo INCLUDE_PATH; ?>#Home">
						<img src="views/templates/img/logo.png" class="d-block w-100" alt="...">
				    </a>
				</div><!-- /.logo-->
					<nav class="desktop right">
						<ul>
							<li ><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
							<li ><a href="<?php echo INCLUDE_PATH; ?>#sobre">Sobre</a></li>
							<li ><a href="<?php echo INCLUDE_PATH; ?>#eventos">Eventos</a></li>
							<li data-toggle="modal" data-target="#exampleModalCenter"><a>Login</a></li>
							<li ><a href="<?php echo INCLUDE_PATH; ?>cadastro">Cadastre-se</a></li>
						
						</ul>
					</nav><!-- /.desktop -->
					<div class="clear"></div><!-- /.clear-->
			</div><!-- /.center-->
			<div class="menu ">			
				<div class="menu_container">
						<div class="menu_background"></div>
						<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
						<div class="menu_content d-flex flex-column align-items-center justify-content-start">
							<nav class="menu_nav">
								<ul class="d-flex flex-column align-items-center justify-content-start">
									<li ><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
									<li ><a href="<?php echo INCLUDE_PATH; ?>#sobre">Sobre</a></li>
									<li ><a href="<?php echo INCLUDE_PATH; ?>#eventos">Eventos</a></li>
									<li data-toggle="modal" data-target="#exampleModalCenter"><p>Login</p></li>
									<li ><a href="<?php echo INCLUDE_PATH; ?>cadastro">Cadastre-se</a></li>
								</ul>
							</nav><!-- /.menu_nav -->
						</div>
				</div><!-- /.menu_container -->		 
			</div><!-- /.menu -->
			<button class="hamburger right"><i class="fa fa-bars" aria-hidden="true"></i></button>
	   </header>
	   <?php
		 
		  $minuto = date('i');
	      if( $_SESSION['inicio_session'] < $minuto){
		   @$_SESSION['inicio_session'] = $minuto = date('i + 5');
	   ?>
			<div class="susto">
				<img src="views/templates/img/gif.gif" class="d-block w-100" alt="...">
			</div>
		<?php } ?>

		<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-login">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">ENTRA</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post">
					  
						<div class = "input-icone">
						   <div><i  class="fas fa-skull-crossbones icone-houve" aria-hidden="true"></i></div>
						</div>

						<input type="text" id = "icone"  placeholder="Email" name = "email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/>

						<div class = "input-icone" >
						   <div><i  class="fas fa-skull-crossbones icone-houve" aria-hidden="true"></i></div>
						</div>

						<div class = "input-icone-js">
						    <span  class="btn-show-pass"><i class="fas fa-eye"></i></span>
		  				</div>

						<input class="input-senha" type="password" placeholder="Senha" id = "icone-senha" name = "senha" />

						<button class="btn btn-logar" type="submit" name="logar">Logar</button>
						
					</form>
				</div>
				<div class="modal-footer">
					<div class="txt-footer-login">
						<p> crie uma conta : <a href="<?php echo INCLUDE_PATH ?>cadastro">Cadastre-se</a>
		            </div>
				</div>
				</div>
			</div>
		</div>
	   