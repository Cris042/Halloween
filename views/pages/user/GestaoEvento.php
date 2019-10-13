<?php 
   if(isset($_GET['id']))
   {
         $id = (int)$_GET['id'];

         if($id == "")
             \models\main::redirect(INCLUDE_PATH);
         else
            $Evento = \models\bd::select('evento','id = ?',array( $id )); 
     
   }
   else 
    \models\main::redirect(INCLUDE_PATH);
?>
<section class = "box_form">
    <div class="form-evento">
        <form class="ajax" enctype="multipart/form-data" method="post" action="models/AtualizaEvento.php" >
           
            <div class="form_body">
                        
                <div class="form-gup">
                    <select name="turma">
                         <option value="<?php echo $Evento[1] ?>"><?php echo $Evento[1] ?></option>
                        <option value="3° Ano"> 3 ano </option>
                        <option value="2° Ano"> 2 ano </option>
                    </select>

                    <select name="grupo" >
                        <option value="<?php echo $Evento[2] ?>"><?php echo $Evento[2] ?></option>
                        <option value="Dança"> Dança </option>
                        <option value="Apresentaçao"> Apresentaçao </option>
                    </select>
                </div>

                <div class="form-gup">
                    <select name="horario" >
                        <option value="<?php echo $Evento[8] ?>"><?php echo $Evento[8] ?></option>
                        <option value="12:00"> 12:00 </option>
                        <option value="11:00"> 11:00 </option>
                    </select>

                    <select name="local" >
                        <option value="<?php echo $Evento[7] ?>"><?php echo $Evento[7] ?></option>
                        <option value="Laboratório da informatica"> Laboratório da informatica  </option>
                        <option value="Laboratório da matematica  "> Laboratório da Matematica  </option>
                    </select>
               </div>

                <div class = "form-op">
                    <input type ="text" placeholder="titulo"  name ="titulo" required 
                     value="<?php echo $Evento[3] ?>"
                    />
                </div>

                <textarea name="descricao" placeholder="descriçao" required>
                          <?php echo $Evento[4] ?>
                </textarea>

                <input type="hidden" value="<?php echo $Evento[0] ?>" name = "id" />
                <input type="hidden" value="<?php echo $Evento[3] ?>" name = "NomeAtual" />
                <button class="btn btn-cadastra" type="submit" name="atualiza-evento">Atualizar</button>
                
            </div><!-- /.from-body -->
            
        </form>
               
            <button class="btn btn-cadastra" name="cadastra-evento">
                        <a href="models/pdf/Evento.php?id=<?php echo $Evento[0]?>">Gerar Pdf </a>
            </button>
            
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