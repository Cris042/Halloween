<section class = "box_form">
    <div class="form">
        <form class="ajax" enctype="multipart/form-data" method="post" action="models/cadastro.php" >
           
            <div class="form_body">
                <div class="from_img">
                     <input id='selecao-arquivo' class="input-img" type="file" name="img"/>
                     <label for='selecao-arquivo'><i class="fas fa-images"></i></label> 
                </div>

                <div class = "input-icone">
                    <div><i class="fas fa-skull-crossbones" aria-hidden="true"></i></div>
                </div>

                <input type="text" name = "email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/>

                <div class = "input-icone">
                    <div><i class="fas fa-skull-crossbones" aria-hidden="true"></i></div>
                </div>

                <div class = "input-icone-js">
                    <span class="btn-show-pass"><i class="fas fa-eye"></i></span>
                </div>

                <input class="input-senha" type="password" name = "senha" placeholder="senha minimo 6 digitos.." require pattern="[0-9a-zA-Z]{5,}"/>

                <button class="btn btn-cadastra" type="submit" name="cadastra-user">Cadastra-se</button>

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