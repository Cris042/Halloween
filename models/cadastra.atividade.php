 <?php
   include('../MySql.php');
   include('../models/bd.php');
   include('../models/main.php');

   
   $data['mensagem'] = "";
   $data['sucesso'] = true;
   
    if(isset($_POST['cadastra']))
    {

        $id = $_POST['id'];
        $user = $_POST['user'];
        $verifica = \models\bd::verifica('chamada','cod_user = ? AND cod_evento = ? ',array($id,$user));
      
        if($verifica == true)
        {
            \models\bd::inserir('chamada','?,?',array($user,$id));
            $data['mensagem'] = "<script>location.reload('http://localhost/base/#eventos');</script>";
           
        }
        else
        {
            $data['mensagem'] = "<script>location.reload('http://localhost/base/#eventos');</script>";
            $data['sucesso'] = false;
        }
    
    }

    if(isset($_POST['CancelaInscriçao']))
    {
           $user = $_POST['user'];
           $id_evento = $_POST['id'];

           \models\bd::excluir('chamada','cod_user = ? AND cod_evento = ?',array($user,$id_evento));
           $data['mensagem'] = "<script>location.reload('http://localhost/base/#eventos');</script>";
    }

    if(isset($_POST['cadastra-pq']))
    {

        $id = $_POST['id'];
        $user = $_POST['user'];
        $verifica = \models\bd::verifica('chamada','cod_user = ? AND cod_evento = ? ',array($id,$user));
      
        if($verifica == true)
        {
            \models\bd::inserir('chamada','?,?',array($user,$id));
            \models\main::redirect("http://localhost/base/#eventos");
           
        }
        else
        {
            \models\main::redirect("http://localhost/base/#eventos");
            $data['sucesso'] = false;
        }
    
    }



    if(isset($_POST['CancelaInscriçao-pq']))
    {
           $user = $_POST['user'];
           $id_evento = $_POST['id'];

           \models\bd::excluir('chamada','cod_user = ? AND cod_evento = ?',array($user,$id_evento));
           \models\main::redirect("http://localhost/base/#eventos");
    }

    if(isset($_POST['CancelaInscriçao-user']))
    {
           $user = $_POST['user'];
           $id_evento = $_POST['id'];

           \models\bd::excluir('chamada','cod_user = ? AND cod_evento = ?',array($user,$id_evento));
           \models\main::redirect("http://localhost/base/MeusEventos");
    }
    

    die(json_encode($data));
?>