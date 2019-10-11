<?php 
   
    include('../../MySql.php'); 
    include('../../models/bd.php'); 
    $Evento = \models\bd::select('evento','id = ?',array( $_SESSION['IdEvento']) );
    $Eventos = \models\bd::selectall('chamada','cod_evento = ?','id',array( $_SESSION['IdEvento'] ) );
    $TotalEventos = ceil(count($EventosUser));
     
    foreach($Eventos as $key => $value)
    {
         $UsersInscritos[] = \models\bd::select('user','id = ?', array( $value['cod_user'] ) );
 
    }
 
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../views/templates/css/table.css" />
    </head>
 
    <body>
        <h2 class="text-center">Usuarios Cadastados no evento <?php echo $Evento[3] ?> </h2>
        <div class="wraper-table">            
            <table> 
                <tr>  
                   <th class="coluna-principla"><?php echo $Evento[3] ?></th>
                   <th class="coluna-principla"><?php echo $Evento[7] ?> - <?php echo $Evento[6] ?> (<?php echo $Evento[8] ?>)</th>
                </tr>    

                <tr>  
                   <th class="coluna-principla w50">N°</th>
                   <th class="coluna-principla w50">E-mail</th>
                </tr>
               
                    <?php foreach($UsersInscritos as $key => $value) {?>
                        <tr>
                            <th><?php echo $key + 1; ?></th>
                            <th><?php echo $value['email']; ?></th>
                        </tr>              
                    <?php }?>

            </table>
        </div><!--wraper-table-->
    </body>
</html>