<?php
include('../MySql.php');
include('../models/bd.php');
include('../models/main.php');

$data['mensagem'] = "";
$data['sucesso'] = true;

       if(isset($_POST['cadastra-evento']))
       {
          $titulo = strip_tags($_POST['titulo']);
          $turma = strip_tags($_POST['turma']);
          $local = strip_tags($_POST['local']);
          $horario = strip_tags($_POST['horario']);
          $grupo = strip_tags($_POST['grupo']);
          $descricao = strip_tags($_POST['descricao']);
          $verifica = \models\bd::verifica('evento','nome = ?', array( $titulo ) );
          $date = date('Y-m-d');
          $autor = $_POST['autor'];
         
          if($verifica == false)
          {
             $data['sucesso'] = false;
             $data['mensagem'] = "Evento  existente";
          }

          if($data['sucesso'] == true)
          {
               
              \models\bd::inserir('evento','?,?,?,?,?,?,?,?,?',array( $turma,$grupo,$titulo,$descricao,20,$date,$local,$horario,$autor ) );
              $data['mensagem'] = "cadastro realizado!";
          }


       }

       
       die(json_encode($data));
?>