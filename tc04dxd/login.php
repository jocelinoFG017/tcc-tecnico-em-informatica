<?php
  $login = $_POST['login'];
  $senha = md5($_POST['senha']);//*
  $connect = mysqli_connect('localhost','root','', 'tccjocelino');//*
     if((isset($_POST['login'])) && (isset($_POST['senha']))) {//*
        $usuario = mysqli_real_escape_string($connect, $_POST['login']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($connect, $_POST['senha']);//
		$senha = md5($senha);

		$result_usuario = "SELECT * FROM usuarios WHERE login = '$login' && senha = '$senha'";
		$resultado_usuario = mysqli_query($connect, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario); // Se resulta for Verdadeiro

		if(isset($resultado)){
			header("Location:adm.html");

			}
		else{
			header("Location:login.html");
		}

	}

?>
