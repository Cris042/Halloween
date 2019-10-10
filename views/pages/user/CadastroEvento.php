<section class = "box_form">
    <div class="form">
        <form class="ajax" enctype="multipart/form-data" method="post" action="models/CadastroEventos.php" >
           
            <div class="form_body">
                        
                <div class="form-gup">
                    <select name="turma" required>
                        <option value="3° Ano"> 3 ano </option>
                        <option value="2° Ano"> 2 ano </option>
                    </select>

                    <select name="grupo" required>
                        <option value="Dança"> Dança </option>
                        <option value="Apresentaçao"> Apresentaçao </option>
                    </select>
                </div>

                <div class="form-gup">
                    <select name="horario" required>
                        <option value="12:00"> 12:00 </option>
                        <option value="11:00"> 11:00 </option>
                    </select>

                    <select name="local" require>
                        <option value="Laboratório da informatica"> Laboratório da informatica  </option>
                        <option value="Laboratório da matematica  "> Laboratório da Matematica  </option>
                    </select>
               </div>

                <div class = "form-op">
                    <input type ="text" placeholder="titulo"  name ="titulo" required />
                </div>

                <textarea name="descricao" placeholder="descriçao" required>

                </textarea>

                <button class="btn btn-cadastra" type="submit" name="cadastra-evento">Cadastra-se</button>

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