<?php 
   $id = $_SESSION['id'];
   @$EventosUser = \models\bd::selectall('chamada','cod_user = ?','id',array( $id ) );
   @$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
   @$TotalEventos = ceil(count($EventosUser));
    
   foreach($EventosUser as $key => $value)
   {
        @$EventosInscritos[] = \models\bd::select('evento','id = ?', array( $value['cod_evento'] ) );

   }
?>
<section id="eventos">
   <div class="eventos">
   <div class="container">
		<div class="theme-title"><br><br><br><br>
			<h2>Meus Eventos</h2><br>
		</div> <!-- /.theme-title -->
		
		
		<div class="pesquisa-card">
			<form method="post" class="ajax_pesquisa"  action="models/PesquisaUser.php">
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
			if($TotalEventos > 0)
				foreach($EventosInscritos as $key => $value){ 		
		?>
           
			<div class="card card_id<?php echo $value['id']; ?> w33" >
				<div class="cardhead">
				    <div class="text-center">
						<h2> <?php echo  \models\main::limita_caracteres($value['nome'],12)?><h2>
					</div>
				</div><!-- /.cardhead -->

				<div class="cardbody">
					<p>
						<?php echo  \models\main::limita_caracteres($value['descricao'],250)?>
					</p>
				</div><!-- /.cardbody -->

				<div class="cardfooter">
						<form method="post" class="ajax" action="models/cadastra.atividade.php">
							<input type="hidden" value="<?php echo $value['id'] ?>" name="id"/>
							<input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="user"/>
							<button 
							    type="submit" class="btn btn-info btn-100 btn-excluir" name="CancelaInscriçao" item_id="card_id<?php echo $value['id']; ?>" >Cancelar Inscriçao
							</button>
						</form>
					    <button type="button" class="btn btn-info btn-100" data-toggle="modal" data-target="#exampleModalScrollable<?php echo $value['id'] ?>">
							Mais detalhes
						</button>
				
				</div><!-- /.cardfooter -->
			</div><!-- /.card -->
			
		<?php } ?>
		<div class="clear"></div>
		</div><!-- /.box-enventos -->

		
    </div> <!-- /.container -->
	</div> <!-- /.eventos -->

	<?php 	 
			if($TotalEventos > 0){
	?>
		<div class="text-center pdf-txt" >
			<a href="models/pdf/Atividades.php"> <i class="fas fa-file-pdf"></i> <h5>Gerer pdf das suas atividade</h5></a><br><br>
		<div>
	<?php } ?>

</section>

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

<?php 
       if($TotalEventos > 0)
    	 foreach(@$EventosInscritos as $key => $value) {
 ?>
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
              