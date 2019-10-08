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
                <form  class = "ajax" enctype="multipart/form-data" method="post" action="models/AtualizaDados.php">
                    <div class="card-user-img">
                        <input type="file" id="input-img<?php echo $value['id']?>" name="img<?php echo $value['id']?>" />
                        <label for="input-img<?php echo $value['id']?>"><img  src="views/templates/upload/<?php echo $value['img'] ?>" alt="..."></label>
                    </div>	
                  
                    <div class="input"> 
                        <input 
                                type="text" name = "email<?php echo $value['id']?>" placeholder="Email" 
                                required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                value="<?php echo $value['email']?>"
                        />
                    </div>
                    
                    <div class="input"> 
                        <input 
                                class="input-senha" type="password" name = "senha<?php echo $value['id']?>" autocomplete="false"
                                placeholder="Nova senha 6 digitos.." require pattern="[0-9a-zA-Z]{5,}"
                        />
                    </div>
                    
					<input type="hidden" name="emailatual<?php echo $value['id']?>" value="<?php echo $value['email'] ?>" />
					<input type="hidden" name="senhaatual<?php echo $value['id'] ?>" value="<?php echo $value['senha'] ?>" />
					<input type="hidden" name="imgatual<?php echo $value['id'] ?>" value="<?php echo $value['img'] ?>" />
					<input type="hidden" name="cod<?php echo $value['id'] ?>" value="<?php echo $value['cod'] ?>" />
                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>" />
                    
                    <button class="btn btn-cadastra" type="submit" name="atualizar-user">Atualiza Dados</button>                            
                </form>

                    <button class="btn btn-cadastra"   data-toggle="modal" 
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
							
					</div>

					<div class="modal-footer">
							<button type="button" class="btn btn-info btn-100" data-dismiss="modal">Close</button>
					</div>
					
				</div>			
			</div>
		</div>
   <?php } ?>

              