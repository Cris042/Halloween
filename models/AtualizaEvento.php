<?php
include('../MySql.php');
include('../models/bd.php');
include('../models/main.php');

$data['mensagem'] = "";
$data['sucesso'] = true;

       if(isset($_POST['atualiza-evento']))
       {
          @$titulo = strip_tags($_POST['titulo']);
          $turma = strip_tags($_POST['turma']);
          $local = strip_tags($_POST['local']);
          $horario = strip_tags($_POST['horario']);
          $grupo = strip_tags($_POST['grupo']);
          $descricao = strip_tags($_POST['descricao']);
          $nome = $_POST['NomeAtual'];
          $id = $_POST['id'];

         if(@$titulo != $nome)
         {
            $verifica = \models\bd::verifica('evento','nome = ?', array( $titulo ) );
            $date = date('Y-m-d');
            
            if($verifica == false)
            {
                $data['sucesso'] = false;
                $data['mensagem'] = "Evento  existente";
            }
            else
            {
                $TituloFinal = $_POST['titulo'];
            }
          }
          else
              $TituloFinal = $_POST['NomeAtual'];

          if($data['sucesso'] == true)
          {
               
              \models\bd::editar('evento','cod_turma = ?,cod_grupo = ?, nome = ?, descricao = ?, local = ?, horario = ?',
              array( $turma,$grupo,$titulo,$descricao,$local,$horario ),$id );
              $data['mensagem'] = "Atualizaçao realizado!";
          }


       }

       
       die(json_encode($data));
?>