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

  
   echo $data;
?>