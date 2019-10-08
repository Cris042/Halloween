<?php
   
   include('../MySql.php'); 
   include('../models/bd.php'); 
   include('../models/main.php'); 
   $data = "";
   if(isset($_POST['pesquisa']))
   {
       
         $busca = strip_tags($_POST['pesquisa']);
         @$sessao = $_POST['aux'];
         @$user = $_POST['user'];
		 $query = " WHERE nome LIKE '%$busca%' OR cod_grupo LiKE '%$busca%' OR cod_turma LiKE '%$busca%' "; 
         $por_pagina = 6;
         $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
         $inicio = ($paginaAtual -1) * $por_pagina;
         $eventos_pg = \models\bd::selectlimit('evento',$query,$inicio,$por_pagina);
         $eventos = \models\bd::selectAll('evento');
         $eventos_totais = ceil(count($eventos));
         $total_paginas = $eventos_totais / $por_pagina;
   
	
        foreach ($eventos_pg as $key => $value) 
        {   
            $Verifica = \models\bd::select('chamada','cod_user = ? AND cod_evento = ?',array( $user,$value['id'] ) );      
                $data.='
                    <div class="card w33 card_id'.$value['id'].'w33">
                    <div class="cardhead ">
                        <div class="text-center">';

                   if($Verifica != "")
                       $data.=
                        ' <p class="card-estado">INSCRITO</p>
                            <h2> '.\models\main::limita_caracteres($value['nome'],12).'<h2>
                        </div>
                        </div><!-- /.cardhead -->
                        <div class="cardbody">
                            <p>
                                '.\models\main::limita_caracteres($value['descricao'],200).'
                            </p>
                        </div><!-- /.cardbody -->
                        <div class="cardfooter">
                            ';
                     else
                     {
                        $data.=
                        '  <h2> '.\models\main::limita_caracteres($value['nome'],12).'<h2>
                        </div>
                        </div><!-- /.cardhead -->
                        <div class="cardbody">
                            <p>
                                '.\models\main::limita_caracteres($value['descricao'],200).'
                            </p>
                        </div><!-- /.cardbody -->
                        <div class="cardfooter">
                            ';
                     }       
                        
                        
                    if(@$sessao != "" && @$Verifica == "")
                    {
                        $data.= 
                        '   <form method="post" class="ajax" action="models/cadastra.atividade.php">
                                <input type="hidden" value="'.$value['id'].'" name="id"/>
                                <input type="hidden" value="'.@$user.'" name="user"/>
                                <button 
                                    type="submit" class="btn btn-info btn-100 btn-excluir" name="cadastra-pq" item_id="card_id'.$value['id'].'" >Participar                  
                                </button>
                            </form>
                            
                        ';
                    }
                    else if(@$sessao != "")
                    {
                        $data.= 
                        '<form method="post" class="ajax" action="models/cadastra.atividade.php">
                            <input type="hidden" value="'.$value['id'].'" name="id"/>
                            <input type="hidden" value="'.$user.'" name="user"/>
                            <button 
                                type="submit" class="btn btn-info btn-100 btn-excluir" name="CancelaInscriçao-pq" item_id="card_id'.$value['id'].'" >Cancelar Inscriçao
                            </button>
                        </form>';
                    }
                            
                        
                        
                    $data.=
                        '
                        <button type="button" class="btn btn-info btn-100" data-toggle="modal" data-target="#exampleModalScrollable'.$value['id'].'">
                            Mais detalhes
                        </button>
                        </div><!-- /.cardfooter -->
                        </div><!-- /.card -->
                    ';
        }

        $data .= ' <div class="clear"></div>';
     }

     if(isset($_POST['pesquisa-user']))
     {
         
           $busca = strip_tags($_POST['pesquisa-user']);
           $users = \models\bd::selectall('user','id = ?','',array(87) );
           
          foreach ($users as $key => $value) 
          {   
              $data .='
                    <form  class = "ajax" enctype="multipart/form-data" method="post" action="models/AtualizaDados.php">
                        <div class="card card_id'.$value['id'].' w33" >
                            <div class="card-user-img">
                                <input type="file" id="input-img'.$value['id'].'" name="img'. $value['id'].'" />
                                <label for="input-img'.$value['id'].'"><img  src="views/templates/upload/'.$value['img'].'" alt="..."></label>
                            </div>	
                            
                            <div class="input"> 
                                <input 
                                        type="text" name = "email'.$value['id'].'" placeholder="Email" 
                                        required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                        value="'.$value['email'].'"
                                />
                            </div>
                            
                            <div class="input"> 
                                <input 
                                        class="input-senha" type="password" name = "senha'.$value['id'].'" autocomplete="false"
                                        placeholder="Nova senha 6 digitos.." require pattern="[0-9a-zA-Z]{5,}"
                                />
                            </div>
                            
                            <input type="hidden" name="emailatual'.$value['id'].'" value="'.$value['email'].'" />
                            <input type="hidden" name="senhaatual'.$value['id'].'" value="'.$value['senha'].'" />
                            <input type="hidden" name="imgatual'.$value['id'].'" value="'.$value['img'].'" />
                            <input type="hidden" name="cod'.$value['id'].'" value="'.$value['cod'].'" />
                            <input type="hidden" name="id" value="'.$value['id'].'" />
                            
                            <button class="btn btn-cadastra" type="submit" name="atualizar-user">Atualiza Dados</button>
                            <button class="btn btn-cadastra" type="submit" name="atualiza-user">Ver Atividades</button>
                            
                        </div><!-- /.card -->
                    </form>
              ';
             
          }
       $data .= ' <div class="clear"></div>';

   echo $data;
}
?>