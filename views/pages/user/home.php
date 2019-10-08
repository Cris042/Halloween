<?php
   $por_pagina = 6;
   $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
   $inicio = ($paginaAtual -1) * $por_pagina;
   $eventos_pg = \models\bd::selectlimit('evento','',$inicio,$por_pagina);

   $eventos = \models\bd::selectAll('evento');
   $TotalEventos = ceil(count($eventos));
   $total_paginas = $TotalEventos / $por_pagina;
 
?>

<section class="slide">
	<div class="bd-example">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">

				<div class="carousel-item active">
					<img src="views/templates/img/img1.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					<h5>First slide label</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
					</div>
				</div>

				<div class="carousel-item">
				    <img src="views/templates/img/img2.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					<h5>Second slide label</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>

				<div class="carousel-item">
				    <img src="views/templates/img/img3.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					<h5>Third slide label</h5>
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
					</div>
				</div>
				
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</section><!--slide-->  

<section id="sobre">
	<div id="service-section">
		<div class="container">
			<div class="theme-title"><br>
				<h2>Sobre</h2>
			</div> <!-- /.theme-title -->

			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="single-service-content">
						<div class="icon-heading tran3s">
							<div class="icon tran3s"><i class="fas fa-ghost" aria-hidden="true"></i></div>
							<h6><a href="#" class="tran3s">Lorem ipsum </a></h6>
						</div>
						<p>
								Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, 
								tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut 
								veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. 
						</p>
					</div> <!-- /.single-service-content -->
				</div> <!-- /.col-lg -->	

				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="single-service-content">
						<div class="icon-heading tran3s">
							<div class="icon tran3s"><i class="fas fa-skull-crossbones" aria-hidden="true"></i></div>
							<h6><a href="#" class="tran3s">Lorem ipsum </a></h6>
						</div>
						<p>
								Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, 
								tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut 
								veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. 
						</p>
					</div> <!-- /.single-service-content -->
				</div> <!-- /.col-lg -->	

				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="single-service-content">
						<div class="icon-heading tran3s">
							<div class="icon tran3s"><i class="fas fa-spider" aria-hidden="true"></i></div>
							<h6><a href="#" class="tran3s">Lorem ipsum </a></h6>
						</div>
						<p>
								Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, 
								tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut 
								veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. 
						</p>
					</div> <!-- /.single-service-content -->
				</div> <!-- /.col-lg -->	

				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="single-service-content">
						<div class="icon-heading tran3s">
							<div class="icon tran3s"><i class="fas fa-ghost" aria-hidden="true"></i></div>
							<h6><a href="#" class="tran3s">Lorem ipsum </a></h6>
						</div>
						<p>
								Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, 
								tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut 
								veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. 
						</p>
					</div> <!-- /.single-service-content -->
				</div> <!-- /.col-lg -->	

				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="single-service-content">
						<div class="icon-heading tran3s">
							<div class="icon tran3s"><i class="fas fa-skull-crossbones" aria-hidden="true"></i></div>
							<h6><a href="#" class="tran3s">Lorem ipsum </a></h6>
						</div>
						<p>
								Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, 
								tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut 
								veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. 
						</p>
					</div> <!-- /.single-service-content -->
				</div> <!-- /.col-lg -->	

				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="single-service-content">
						<div class="icon-heading tran3s">
							<div class="icon tran3s"><i class="fas fa-spider" aria-hidden="true"></i></div>
							<h6><a href="#" class="tran3s">Lorem ipsum </a></h6>
						</div>
						<p>
								Lorem ipsum dolor sit amet, consectetur scing elit, sed do eiusmod, 
								tempor incididunt labore et dolore magna aliqua. Ut enim ad minim ut 
								veniam, quis nostrud exercitation ullamco aliquip ex ea commodo consequat. 
						</p>
					</div> <!-- /.single-service-content -->
				</div> <!-- /.col-lg -->	

			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /#service-section -->
</section> <!-- /.sobre -->

<section id="eventos">
   <div class="eventos">
   <div class="container">
		<div class="theme-title"><br>
			<h2>Eventos</h2>
		</div> <!-- /.theme-title -->

		<div class="pesquisa-card">
			<form method="post" class="ajax_pesquisa"  action="models/pesquisa.php">
					<input placeholder="Procure por: Nome,Turma e Grupo" class="input-busca" type="text" name="pesquisa"  />
					<input type="hidden" name = "aux" value="<?php echo @$_SESSION['sessao']?>" />
					<input type="hidden" value="<?php echo @$_SESSION['id'] ?>" name="user"/>
					<div  class="icone-search">
						<button disabled name="pesquisa" class="icone-search"><i class="fas fa-search"></i></button>
					</div>
			</form>
		</div> <!-- /.pesquisa-card -->

		<div class="box-enventos">
		<?php 	 
		    foreach($eventos_pg as $key => $value){ 
			 @$Verifica = \models\bd::select('chamada','cod_user = ? AND cod_evento = ?',array( $_SESSION['id'],$value['id'] ) );
		?>
           
			<div class="card card_id<?php echo $value['id']; ?> w33" >
				<div class="cardhead">
				    <div class="text-center">

						<?php if(@$Verifica != "") {?>
						   <p class="card-estado">INSCRITO</p>
						<?php }?>

						<h2> <?php echo  \models\main::limita_caracteres($value['nome'],12)?><h2>

					</div>
				</div><!-- /.cardhead -->

				<div class="cardbody">
					<p>
						<?php echo  \models\main::limita_caracteres($value['descricao'],250)?>
					</p>
				</div><!-- /.cardbody -->

				<div class="cardfooter">
				    
					 <?php if(@$_SESSION['sessao'] != "" && @$Verifica == "") {?>
						<form method="post" class="ajax" action="models/cadastra.atividade.php">
							<input type="hidden" value="<?php echo $value['id'] ?>" name="id"/>
							<input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="user"/>
							<button 
							   type="submit" class="btn btn-info btn-100 btn-excluir" name="cadastra" item_id="card_id<?php echo $value['id']; ?>" >Participar
							</button>
						</form>
					 <?php } else if(@$_SESSION['sessao'] != ""){?>					
						<form method="post" class="ajax" action="models/cadastra.atividade.php">
							<input type="hidden" value="<?php echo $value['id'] ?>" name="id"/>
							<input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="user"/>
							<button 
							    type="submit" class="btn btn-info btn-100 btn-excluir" name="CancelaInscriçao" item_id="card_id<?php echo $value['id']; ?>" >Cancelar Inscriçao
							</button>
						</form>
					  <?php }?>
						
					    <button type="button" class="btn btn-info btn-100" data-toggle="modal" data-target="#exampleModalScrollable<?php echo $value['id'] ?>">
							Mais detalhes
						</button>
					
					 
				</div><!-- /.cardfooter -->
			</div><!-- /.card -->
			
		<?php } ?>
		<div class="clear"></div>
		</div><!-- /.box-enventos -->

		<nav aria-label="Page navigation example">
			<ul class="pagination">
			 <?php for($i = 0; $i < $total_paginas; $i++){ ?>
				<li class="page-item text-center">
					<a href="<?php echo INCLUDE_PATH ?>base?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a>
				</li>
			 <?php } ?>
			</ul>
		</nav><!-- /.Page navigation example -->
    </div> <!-- /.container -->
    </div> <!-- /.eventos -->
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body modal-cadastro">
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-info btn-100" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
<!-- Modal -->
  
   <?php foreach($eventos as $key => $value) { ?>
        <div class="modal fade" id="exampleModalScrollable<?php echo $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">

				    <div class="modal-header">
						<h5 class="modal-title text-center" id="exampleModalScrollableTitle">
							    <?php echo  $value['nome']?>  (<?php echo  $value['cod_turma'] ?>)
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
								<p><?php echo  $value['descricao'] ?></p>
					</div>

					<div class="modal-footer">
							<button type="button" class="btn btn-info btn-100" data-dismiss="modal">Close</button>
					</div>
					
				</div>			
			</div>
		</div>
   <?php } ?>


</div> <!-- /.main-page-wrapper -->
	