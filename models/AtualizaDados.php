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
          $emailatual = $_POST['emailatual'];
          @$senha = strip_tags( sha1( $_POST['senha'] ) );
          $senhaatual = $_POST['senhaatual'];
          $cod = strip_tags($_POST['cod']);
          $id = strip_tags($_POST['id']);
       
         
         if(@$senha != $senhaatual)
         {         
               $senha = strip_tags( sha1( $_POST['senha'] ) );
         }
                
         if(@$email != $emailatual)
         {         
            $verifica = \models\bd::verifica('user','email = ?',array($email));

            if($verifica == false)
            {
               $data['sucesso'] = false;
               $data['mensagem'] = "Email existente";
            }
            else
            {
               $email = $_POST['email'];
            }
         
         }
          

          if(@$imagem == "")
          {         
             $img = @$_POST['imgatual'] ;
             $imagemvalida = true;
          }
          else
          {
              $imagemvalida = \models\main::imagemValida($imagem);
            
              if($imagemvalida == false)
              {
                 $data['sucesso'] = false;
                 $data['mensagem'] = "Imagem invalida";
              }
              else
               $img = \models\main::uploadFile($imagem);
          }

      
          if($data['sucesso'] == true)
          {
                          
              \models\bd::editar('user','email = ?,senha = ?,img = ?',array($email,$senha,$img) ,$id);
              $_SESSION['email'] = $email;
              $_SESSION['img'] = $img;
              $data['mensagem'] = "Sucesso!";
           
          }


       }

       if(isset($_POST['atualizar-user']))
       {
          $id = strip_tags($_POST['id']);
          @$imagem = $_FILES['img'.$id];
          $email = strip_tags($_POST['email'.$id]);
          $emailatual = $_POST['emailatual'.$id];
          @$senha = strip_tags( sha1( $_POST['senha'.$id]) );
          $senhaatual = $_POST['senhaatual'.$id ];
          $cod = strip_tags($_POST['cod'.$id]);
         
       
         
         if(@$senha != $senhaatual)
         {         
               $senha = strip_tags( sha1( $_POST['senha'.$id] ) );
         }
                
         if(@$email != $emailatual)
         {         
            $verifica = \models\bd::verifica('user','email = ?',array($email));

            if($verifica == false)
            {
               $data['sucesso'] = false;
               $data['mensagem'] = "Email existente";
            }
            else
            {
               $email = $_POST['email'.$id];
            }
         
         }
          

          if(@$imagem == "")
          {         
             $img = @$_POST['imgatual'.$id] ;
             $imagemvalida = true;
          }
          else
          {
              $imagemvalida = \models\main::imagemValida($imagem);
            
              if($imagemvalida == false)
              {
                 $data['sucesso'] = false;
                 $data['mensagem'] = "Imagem invalida";
              }
              else
               $img = \models\main::uploadFile($imagem);
          }

      
          if($data['sucesso'] == true)
          {
                          
              \models\bd::editar('user','email = ?,senha = ?,img = ?',array($email,$senha,$img) ,$id);
              $_SESSION['email'] = $email;
              $_SESSION['img'] = $img;
              $data['mensagem'] = "Sucesso!";
           
          }


       }
    
       die(json_encode($data));
?>