<?php
	// inicio da sessão
	//session_start();
	
	function seguranca_adm(){
		if((empty($_SESSION['usuarioID'])) || (empty($_SESSION['usuarioEmail'])) || (empty($_SESSION['usuarioNiveisAcessoId']))){		
			$_SESSION['loginErro'] = "Área restrita";
			header("Location: ../adm/index.php");
		}else{
			if($_SESSION['usuarioNiveisAcessoId'] != "1"){
				$_SESSION['loginErro'] = "Área restrita";
				header("Location: ../adm/index.php");
			}
		}
	}
?>