<?php
	include_once("conexao/conexao.php");


	//Seleção da tabela cursos
	$sql = "SELECT * FROM usuario";
	$curso = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		    <meta charset="utf-8">
           
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	    <meta name="viewport" content="width=device-width, initial-scale=1">
        
			<title>Usuários</title>
			 <link href="css/bootstrap.min.css" rel="stylesheet">
			  <link href="css/font-awesome.min.css" rel="stylesheet"><!--esse faz aparecer os fafa icon-->
			<link href="css/dash2.css" rel="stylesheet">
           
        	<!--<link href="css/main.css" rel="stylesheet">esse q da erro-->
        
		  

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
						<a href="cadastrar.php">

                            <span><i class=" fa fa-user-plus"></i></span>
							<span>Cadastrar</span>
						</a>
					</li>
					<li class="active">
						<a href="#">
							<span><i class="fa fa-plug"></i></span>
							<span>Gráfico</span>
						</a>
					</li>
					<li class="active">
						<a href="Listar/listarEndereco.php">
							<span><i class="fa fa-plug"></i></span>
							<span>Endereços</span>
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
		</div><!--aqui acaba o menu lateral-->
        
        
		<div class="main-content">
			<div class="title">
				Seja bem-vindo, aqui você tem acesso aos usuarios do sistema
			</div>
			
			<div class="maina">
				<div class="widgete"><!--aqui fica aquele fundo branco desproporcional -->
                    
                    
					<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h3><label class="glyphicon glyphicon-book"> </label> Usuários </h3>
		</div>
		
			<div class="col-md-12">

			<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>Gmail</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_cursos = mysqli_fetch_assoc($curso)){ ?>
								<tr>
									<td><?php echo $rows_cursos['idUsuario']; ?></td>
									<td><?php echo $rows_cursos['nome']; ?></td>
									<td><?php echo $rows_cursos['login']; ?></td>
									<td>
										<button type="button" class="btn btn-xs btn-primary"
										data-toggle="modal" data-target="#myModal<?php echo $rows_cursos['ID']; ?>">
										<span class="glyphicon glyphicon-eye-open"></span> Visualizar</button>

										<button type="button" class="btn btn-xs btn-warning"
										data-toggle="modal" data-target="#exampleModal"
										data-whateverid="<?php echo $rows_cursos['id']; ?>"
										data-whatevernome="<?php echo $rows_cursos['nome']; ?>"
										data-whateverlogin="<?php echo $rows_cursos['login']; ?>"
                                                
										data-whateverdetalhes="<?php echo $rows_cursos['detalhes']; ?>"><span class="	glyphicon glyphicon-edit"></span> Editar
										</button>

                                        
										<a href="processa_apagar.php?ID=<?php echo $rows_cursos['ID']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
                                        
									</td>
								</tr>
								<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $rows_cursos['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_cursos['nome']; ?></h4>
											</div>
											<div class="modal-body">
												<p><?php echo $rows_cursos['id']; ?></p>
												<p><?php echo $rows_cursos['nome']; ?></p>
												<p><?php echo $rows_cursos['login']; ?></p>

											</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal -->
								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
								  <div class="modal-dialog" role="document">
									
									  
									  <div class="modal-body">
                                          
										<form method="POST" action="processa.php" enctype="multipart/form-data">
										  <div class="form-group">
											<label for="recipient-name" class="control-label">Nome:</label>
											<input name="nome" type="text" class="form-control" id="recipient-name">
										  </div>
										  <div class="form-group">
											<label for="message-text" class="control-label">Detalhes:</label>
											<textarea name="detalhes" class="form-control" id="detalhes"></textarea>
										  </div>
										  	<div class="form-group">
											<label for="recipient-name" class="control-label">login:</label>
											<textarea name="login" class="form-control" id="login"></textarea>
										  </div>
										<input name="id" type="hidden" class="form-control" id="id-curso" value="">

										<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
										<button type="submit" class="btn btn-danger">Alterar</button>

										</form>
                                          
									

									</div>
								  </div>                                  
								</div>
                            <?php } ?>					
						</tbody>
                </table>
 </div>
 </div>
</div>
				</div>
				
			</div>
            
	
        
        
        
        
	</body>
</html>
