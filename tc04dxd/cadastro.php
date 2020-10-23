<?php
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$connect = mysqli_connect('localhost','root', '', 'tccjocelino');
$query_select = "SELECT login FROM usuarios WHERE login = '$login'";//*
$select = mysqli_query($connect, $query_select);//*
$array = mysqli_fetch_array($select);
$logarray = $array['login'];//*
$nomearray = $array['nome'];

  if($login == "" || $login == null){//*
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastrar.php';</script>";
    }
    else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>alert('Esse login de cadastro já existe');window.location.href='cadastrar.php';</script>";
        die();
      }
      else{
        $query = "INSERT INTO usuarios (nome,login,senha) VALUES ('$nome','$login','$senha')";
        $insert = mysqli_query($connect, $query);

        if($insert == 1){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='cadastrar.php'</script>";
        }
        else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastrar.php'</script>";
        }
        if($nome == "" || $nome == null){
           echo"<script language='javascript' type='text/javascript'>alert('O campo nome deve ser preenchido corretamente');window.location.href='cadastrar.php';</script>";
         }else {
           if($senha == "" || $senha == null){
              echo"<script language='javascript' type='text/javascript'>alert('O campo senha deve ser preenchido corretamente');window.location.href='cadastrar.php';</script>";
             }
         }
        }
    }
?>
