<?php
include('../MySql.php');
include('../models/bd.php');
include('../models/main.php');

$data['mensagem'] = "";
$data['sucesso'] = true;

       if(isset($_POST['cadastra-user']))
       {
          @$imagem = $_FILES['img'];
          $email = strip_tags($_POST['email']);
          $senha = strip_tags( sha1( $_POST['senha'] ) );
          $verifica = \models\bd::verifica('user','email = ?',array($email));
          
          if(@$imagem != "")
          {         
               if(\models\main::imagemValida($imagem) == false)
               {
                  $data['sucesso'] = false;
                  $data['mensagem'] = "imagem invalida";
               }
               else
               {
                  $upload = false;
               }
            
          }
         

          if($verifica == false)
          {
             $data['sucesso'] = false;
             $data['mensagem'] = "Email existente";
          }

          if($data['sucesso'] == true)
          {
               if (@$imagem == "") 
               {
                  $img = "5d969ac6d4e86.png";
                  $upload = true;
               }
            
               if ($upload == false ) 
                 $img = \models\main::uploadFile($imagem);
            

              \models\bd::inserir('user','?,?,?,?,?',array($email,$senha,$img,0,null));
              $data['mensagem'] = "cadastro realizado!";
          }


       }
    
       die(json_encode($data));
?>