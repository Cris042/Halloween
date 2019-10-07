<?php
   
   include('../MySql.php'); 
   include('../models/bd.php'); 
   include('../models/main.php'); 
   $data = "";
   if(isset($_POST['pesquisa']))
   {
       
         $id = $_POST['user'];  
         $busca = strip_tags($_POST['pesquisa']);
         @$sessao = $_POST['aux'];
         @$user = $_POST['user'];
		 $query = " nome LIKE '%$busca%' OR cod_grupo LiKE '%$busca%' OR cod_turma LiKE '%$busca%'  "; 
         $EventosUser = \models\bd::selectall('chamada','cod_user = ?','id',array( $id ) ); 
         $TotalEventos = ceil(count($EventosUser));
      
         foreach($EventosUser as $key => $value)
         {
              $EventosInscritos[] = \models\bd::select('evento','id = ? ', array( $value['cod_evento'] ) ); 
         }
         
       
        foreach (@$EventosInscritos as $key => $value) 
        {   
           similar_text($value['nome'],$busca,$PorcentagemNome);
           similar_text($value['cod_turma'],$busca,$PorcentagemGrupo);
           similar_text($value['cod_grupo'],$busca,$PorcentagemTurma);
           if($PorcentagemNome > 40 || $PorcentagemGrupo > 30 || $PorcentagemTurma > 25)
           {
                $data.='
                    <div class="card card_id'.$value['id'].' w33" >
                        <div class="cardhead">
                            <div class="text-center">
                                <h2> '.\models\main::limita_caracteres($value['nome'],12).'<h2>
                            </div>
                        </div><!-- /.cardhead -->

                        <div class="cardbody">
                            <p>
                                '.\models\main::limita_caracteres($value['descricao'],200).'
                            </p>
                        </div><!-- /.cardbody -->

                        <div class="cardfooter">
                                 
                                <form method="post" class="ajax" action="models/cadastra.atividade.php">
                                    <input type="hidden" value="'.$value['id'].'" name="id"/>
                                    <input type="hidden" value="'.$user.'" name="user"/>
                                    <button 
                                        type="submit" class="btn btn-info btn-100 btn-excluir" name="CancelaInscriçao-user" item_id="card_id'.$value['id'].'" >Cancelar Inscriçao
                                    </button>
                                </form>

                                <button type="button" class="btn btn-info btn-100" data-toggle="modal" data-target="#exampleModalScrollable'.$value['id'].'">
                                    Mais detalhes
                                </button>
                        
                        </div><!-- /.cardfooter -->
                    </div><!-- /.card -->
                ';
           }
        }

        $data .= ' <div class="clear"></div>';
     }

  
   echo $data;
?>