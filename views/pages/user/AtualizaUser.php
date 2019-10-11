<?php 
   if(isset($_GET['id']))
   {
         $id = (int)$_GET['id'];

         if($id == "")
             \models\main::redirect(INCLUDE_PATH);
         else
            $user = \models\bd::select('user','id = ?',array( $id )); 
     
   }
   else 
    \models\main::redirect(INCLUDE_PATH);
?>
<section class = "box_form">
    <div class="form">
        <form class="ajax" enctype="multipart/form-data" method="post" action="models/AtualizaDados.php" >
           
            <div class="form-atualizar">
                <div class="from_img">
                     <input id='selecao-arquivo-img' class="input-img" type="file" name="img"/>
                     <label for='selecao-arquivo-img'>
                         <img  src="views/templates/upload/<?php echo $user[3] ?>" alt="...">
                    </label> 
                </div>
                  
                <div class = "input-icone">
                    <div><i class="fas fa-skull-crossbones" aria-hidden="true"></i></div>
                </div>

                <input type="text" name = "email" placeholder="Email" 
                    required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $user[1] ?>"
                    />

                <div class = "input-icone">
                    <div><i class="fas fa-skull-crossbones" aria-hidden="true"></i></div>
                </div>

                <div class = "input-icone-js">
                    <span class="btn-show-pass"><i class="fas fa-eye"></i></span>
                </div>

                <input class="input-senha" type="password" name = "senha" placeholder="Nova minimo 6 digitos.." 
                autocomplete="off" pattern="[0-9a-zA-Z]{5,}"/>

                <select class="input-100" name= "cod">
                        <option value="<?php echo $user[4] ?>"> 
                              <?php 
                                    if($user[4] == 0) 
                                        echo "User";
                                    else if($user[4] == 1)
                                         echo "Admin";
                                    else if($user[4] == 2)
                                         echo "Super Admin";
                                                                    
                                ?>
                         </option>
                        <option value="0">User </option>
                        <option value="1">Admin </option>
                        <option value="2">Sadmin </option>
                <select>
              
                <input type="hidden" name="emailatual" value="<?php echo $user[1] ?>" />
				<input type="hidden" name="senhaatual" value="<?php echo $user[2] ?>" />
				<input type="hidden" name="imgatual" value="<?php echo $user[3] ?>" />
				<input type="hidden" name="id" value="<?php echo $id ?>" />
                <button class="btn btn-cadastra" type="submit" name="cadastra-user">Atualizar</button>

            </div><!-- /.from-body -->
            
        </form>
    </div><!-- /.form -->
</section><!-- /.box_form -->

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