<?php 
    session_start();
    include('../../MySql.php'); 
    include('../../models/bd.php'); 
    $EventosUser = \models\bd::selectall('chamada','cod_user = ?','id',array( $_SESSION['id'] ) );
    $User = \models\bd::select('user','id = ?',array( $_SESSION['id'] ));
    $TotalEventos = ceil(count($EventosUser));
     
    foreach($EventosUser as $key => $value)
    {
         $EventosInscritos[] = \models\bd::select('evento','id = ?', array( $value['cod_evento'] ) );
 
    }
 
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../views/templates/css/table.css" />
    </head>
 
    <body>
        <h2 class="text-center">Atividades do user <?php echo $User[1]?></h2>
        <div class="wraper-table">            
            <table>              
                <tr>  
                   <th class="coluna-principla">Nome</th>
                   <th class="coluna-principla">Local</th>
                   <th class="coluna-principla">Data</th>
                   <th class="coluna-principla">Horario</th>
                   <th class="coluna-principla">Turma</th>
                   <th class="coluna-principla">Grupo</th>
                </tr>

                <?php foreach($EventosInscritos as $key => $value) {?>
                    <tr>
                         <th><?php echo $value['nome']; ?></th>
                         <th><?php echo $value['local']; ?></th>
                         <th><?php echo $value['data']; ?></th>
                         <th><?php echo $value['horario']; ?></th>
                         <th><?php echo $value['cod_turma']; ?></th>
                         <th><?php echo $value['cod_grupo']; ?></th>
                    </tr>              
                <?php }?>

            </table>
        </div><!--wraper-table-->
    </body>
</html>