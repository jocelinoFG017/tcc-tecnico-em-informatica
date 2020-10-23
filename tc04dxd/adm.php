<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
            <meta name="description" content="">
            <meta name="author" content="">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	    <meta name="viewport" content="width=device-width, initial-scale=1">
        
		  <title>Página Admistrativa</title>
       
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
           
            
        
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/font-awesome.min.css" rel="stylesheet">
            <link href="css/prettyPhoto.css" rel="stylesheet">
            <link href="css/price-range.css" rel="stylesheet">
            <link href="css/animate.css" rel="stylesheet">
        	<link href="css/main.css" rel="stylesheet">
            <link href="css/responsive.css" rel="stylesheet">
            <link rel="shortcut icon" href="imagens/ico/favicon.ico">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
         
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
            <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        
            <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		    <link rel="stylesheet" href="css/dash.css">
            <link rel="shortcut icon" href="imagens/ico/favicon.ico">
        
            <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script>
		<script src="js/menu.js"></script>

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
			<a href="" class="nav-trigger"><span></span></a>
		</div>
		<div class="side-nav">
			<div class="logo">
                
				<a href="adm.php">
                            <span><i class="fa fa-renren" ></i></span>
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

							<span><i class="fa fa-cube"></i></span>
							<span>Produtos</span>
						</a>
					</li>
					<li class="active">
						<a href="#">
							<span><i class="fa fa-plug"></i></span>
							<span>Gráfico</span>
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
				Analytics
			</div>
			
			<div class="main">
				<div class="widget">
					<div class="title">Number of views</div>
					<div class="chart"></div>
				</div>
				<div class="widget">
					<div class="title">Number of likes</div>
					<div class="chart"></div>
				</div>
				<div class="widget">
					<div class="title">Number of comments</div>
					<div class="chart"></div>
				</div>
			</div>
		</div>
	</body>
</html>
