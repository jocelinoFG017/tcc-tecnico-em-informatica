<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
            <meta name="description" content="">
            <meta name="author" content="">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	    <meta name="viewport" content="width=device-width, initial-scale=1">
        
			<title>Cadastro de Usuários</title>
			<link href="css/dash2.css" rel="stylesheet">
			<link href="css/font-awesome.min.css" rel="stylesheet"><!--esse faz aparecer os fafa icon-->
			<link href="css/main.css" rel="stylesheet">
			
			
		<style>
			.ad {
				position: absolute;
				width: 300px;
				height: 250px;
				border: 1px solid #ddd;
				left: 50%;
				transform: translateX(-50%);
				top: 250px;
				z-index: 10;
			}
			.ad .close {
				position: absolute;
				font-family: 'ionicons';
				width: 20px;
				height: 20px;
				color: #fff;
				background-color: #999;
				font-size: 20px;
				left: -20px;
				top: -1px;
				display: table-cell;
				vertical-align: middle;
				cursor: pointer;
				text-align: center;
			}
		</style>
		<script type="text/javascript">
			$(function() {
				$('.close').click(function() {
					$('.ad').css('display', 'none');
				})
			})
		</script>

	</head>
	<body>
		<div class="header">
			<div class="logo">
				<i class="fa fa-renren"></i>
				<span>Eternity</span>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
                
                <a href="adm.html">
                            <span><i class="fa fa-renren"></i></span>
                        <span>Eternity</span>
                    </a>
			</div>
			<nav>
				<ul>
					<li>
						<a href="usuarios2.php">
							<span><i class="fa fa-user"></i></span>
							<span>Usuários</span>
						</a>
					</li>
					<li>
						<a href="#">

							<span><i class="fa fa-user-plus"></i></span>
							<span>Cadastrar</span>
						</a>
					</li>
					<li class="active">
						<a href="#">
							<span><i class="fa fa-renren"></i></span>
							<span>Produtos</span>
						</a>
					</li>
					
                    <li>
						<a href="sair.php">
							<span><i class="fa fa-power-off" aria-hidden="true"></i></span>
							<span>SAIR</span>
                            
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
			<div class="title">
				Aqui você pode cadastrar novos usuários!
			</div>
			
			<div class="main">
				<div class="widget">
					
    
		
			
				
					<div class="login-form"><!--cadastro form-->
						
                        <div class="replay-box" >
                            <form method="POST" action="cadastro.php"><!-- forma de envio é o post e vai chamar o cadastro.php-->
                                    <div class="blank-arrow"><span>*</span>
                                        <label>Nome:</label><input type="text" name="nome" id="nome"><br><span>*</span>
                                    </div>
                                    <div class="blank-arrow">
                                        <label>Login:</label><input type="text" name="login" id="login"><br><span>*</span>
                                    </div>
                                    <div class="blank-arrow">
                                        <label>Senha:</label><input type="password" name="senha" id="senha"><br>
                                    </div>
                              <button type="submit" value="cadastrar" id="cadastrar" name="cadastrar" class="btn btn-default">Cadastrar</button>
                           
                            </form>
                        </div>
                        <!--tirei o formulário de cadastrar-se que tinha aqui-->
					</div><!--/FIM login formulário-->
				
				
			
		
	
                     </div>
				
				
			</div>
		</div>
	</body>
</html>
