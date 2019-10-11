<?php 
   $id = $_SESSION['id'];
   @$User = \models\bd::selectall('user','id != ?','id',array( $id ) );
   @$TotalUser = ceil(count($User));
?>
<section id="eventos">
   <div class="eventos">
   <div class="container">
		<div class="theme-title"><br><br><br><br>
			<h2>Usuarios</h2><br>
		</div> <!-- /.theme-title -->
		
		
		<div class="pesquisa-card">
			<form method="post" class="ajax_pesquisa"  action="models/Pesquisa.php">
                    <input placeholder="Procure por: E-mail" class="input-busca" type="text" name="pesquisa-user"  />
                    <input type= "hidden" name="id" value="<?php echo $_SESSION['id'] ?>" />
					<div  class="icone-search">
						<button disabled name="pesquisa" class="icone-search"><i class="fas fa-search"></i></button>
					</div>
			</form>
		</div> <!-- /.pesquisa-card -->

		<div class="box-enventos">
		<?php 	 
			if($TotalUser > 0)
				foreach($User as $key => $value){ 		
		?>
            <div class="card card_id<?php echo $value['id']; ?> w33" >
                    <div class="card-user-img">
                        <input type="file" id="input-img<?php echo $value['id']?>" name="img" />
                        <label for="input-img<?php echo $value['id']?>"><img  src="views/templates/upload/<?php echo $value['img'] ?>" alt="..."></label>
                    </div>	
                  
                    <div class="input"> 
                        <p> 
                                <?php 
                                    if($value['cod'] == 0) 
                                        echo "User";
                                    else if($value['cod'] == 1)
                                         echo "Admin";
                                    else if($value['cod'] == 2)
                                         echo "Super Admin";
                                ?>
                        </p>
                    </div>
                    
                    <div class="input"> 
                        <p> 
                               <?php echo $value['email']?>
                        </p>
                    </div>
                    
                    
                    <button class="btn btn-cadastra btn-card"  name="atualizar-user">
                        <a href="<?php echo INCLUDE_PATH ?>AtualizaUser?id=<?php echo $value['id']?>"> Atualiza User </a>
                    </button>                            
             
                    <button class="btn btn-cadastra btn-card"   data-toggle="modal" 
                     data-target="#exampleModalScrollable<?php echo $value['id'] ?>">
                        Ver Atividades
                    </button>
            </div><!-- /.card -->
                    
			
		<?php } ?>
		<div class="clear"></div>
		</div><!-- /.box-enventos -->

		
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

<?php foreach($User as $key => $value) { ?>
        <div class="modal fade" id="exampleModalScrollable<?php echo $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">

				    <div class="modal-header">
						<h5>Atividades do <?php echo $value['email'] ?> </h5>
					</div>

					<div class="modal-body">
                            <?php  
                                  @$EventosInscritos = null;
                                  $id = $value['id'];
                                  @$EventosUser = \models\bd::selectall('chamada','cod_user = ?','id',array( $id ) );
                                  @$TotalEventos = ceil(count($EventosUser));
    
                                    foreach($EventosUser as $key => $value)
                                    {
                                            @$EventosInscritos[] = \models\bd::select('evento','id = ?', array( $value['cod_evento'] ) );

                                    }
                            ?>
                            <?php 	 
                                if($TotalEventos > 0)
                                    foreach($EventosInscritos as $key => $value){ 		
                            ?>
                                  <div class="card-atividades-user">
                                      <i class="fas fa-ghost" aria-hidden="true"></i>
                                      <p ><?php echo $value['nome']; ?></p>
                                  </div>

                            <?php }?>

					</div>

					<div class="modal-footer">
							<button type="button" class="btn btn-info btn-100" data-dismiss="modal">Close</button>
					</div>
					
				</div>			
			</div>
		</div>
   <?php } ?>

              