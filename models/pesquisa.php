<?php
   session_start();
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
                    <div class="card w50 card_id'.$value['id'].'">
                    <div class="cardhead ">
                        <div class="text-center">';

                   if($Verifica != "")
                       $data.=
                        ' <p class="card-estado">INSCRITO</p>
                            <h2> '.\models\main::limita_caracteres($value['nome'],16).'<h2>
                        </div>
                        </div><!-- /.cardhead -->
                        <div class="cardbody">
                            <p>
                                '.\models\main::limita_caracteres($value['descricao'],260).'
                            </p>
                        </div><!-- /.cardbody -->
                        <div class="cardfooter">
                            ';
                     else 
                     {
                        $data.=
                        '  <h2> '.\models\main::limita_caracteres($value['nome'],16).'<h2>
                        </div>
                        </div><!-- /.cardhead -->
                        <div class="cardbody">
                            <p>
                                '.\models\main::limita_caracteres($value['descricao'],260).'
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
                            
                        
                    if(@$_SESSION['sadm'] == true) 
                    {   
                        $data.=
                            '
                            <button type="button" class="btn btn-info btn-100" data-toggle="modal" data-target="#exampleModalScrollable'.$value['id'].'">
                                Mais detalhes
                            </button>

                            <button class="btn btn-info btn-100">
								<a href="GestaoEvento?id='.$value['id'].'">Gerir</a>
							</button>
                            
                            </div><!-- /.cardfooter -->
                            </div><!-- /.card -->
                        ';
                    }
                    else
                    {
                        $data.='
                           
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

     if(isset($_POST['pesquisa-user']))
     {
         
           $busca = strip_tags($_POST['pesquisa-user']);
           $id = $_POST['id'];
           $query = " WHERE email LIKE '%$busca%' AND id != '$id' "; 
           $users =  \models\bd::selectAll('user');
           $TotalUsers = ceil( count($users) );
           $user =  \models\bd::selectlimit('user',$query,0,$TotalUsers);
           
          foreach ($user as $key => $value) 
          {   
              $data .='
                <div class="card card_id'.$value['id'] .'w33" >
                    <div class="card-user-img">
                        <input type="file" id="input-img'.$value['id'].'" name="img" />
                        <label for="input-img'.$value['id'].'"><img  src="views/templates/upload/'.$value['img'].'" alt="..."></label>
                    </div>	
                    
                    <div class="input"> 
                        <p> ';
                     
                      
                        if($value['cod'] == 0) 
                            $data .= "User";
                        else if($value['cod'] == 1)
                            $data .= "Admin";
                        else if($value['cod'] == 2)
                             $data .= "Super Admin";
                   
                        
                 $data .=' 
                        </p>
                     </div>
                    
                    <div class="input"> 
                        <p> 
                                '.$value['email'].'
                        </p>
                    </div>
                    
                    
                    <button class="btn btn-cadastra btn-card"  name="atualizar-user">
                        <a href="http://localhost/base/AtualizaUser?id='.$value['id'].'"> Atualiza User </a>
                    </button>                            
            
                    <button class="btn btn-cadastra btn-card"   data-toggle="modal" 
                    data-target="#exampleModalScrollable'.$value['id'].'">
                        Ver Atividades
                    </button>
                </div><!-- /.card -->
              ';
             
          }
          
       $data .= ' <div class="clear"></div>';
     }
   echo $data;

?>