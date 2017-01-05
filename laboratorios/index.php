<!DOCTYPE html>
<html>
<head>
	
	<title>Disponibilidad de Laboratorios</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>


<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">LABORATORIOS</a>
		</div>

		<div class="collapse navbar-collapse" id="dropdown">
			<ul class="nav navbar-nav">
                      
				<li class="dropdown">
					<input type="hidden" id="lab"/>
					<a href="#" id="c_lab" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Laboratorio 	
                    	<span class="caret"></span>
                    </a>
					<ul class="dropdown-menu" role="menu">
						<li><a onclick="setlab(1);" href="#">Lab 1</a></li>
						<li><a onclick="setlab(3);" href="#">Lab 2</a></li>
						<li><a onclick="setlab('4');" href="#">Lab Hardware</a></li>
					</ul>
				</li>
<!---->
				<li class="dropdown">
					<input type="hidden" id="tur"/>
					<a href="#" id="c_tur" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Turno
                    	<span class="caret"></span>
                    </a>
					<ul class="dropdown-menu" role="menu">
						<li><a onclick="settur(1);" href="#">Mañana</a></li>
						<li><a onclick="settur(2);" href="#">Tarde</a></li>
						<li><a onclick="settur(3);" href="#">Noche</a></li>
					</ul>
				</li>
<!---->
				<li class="dropdown">
                	<div style="margin:6px"><input style="padding: 6px; height: 38px;" class="form-control" type="date" id="fecha"/></div>
				</li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" onclick="buscar();">Buscar</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div id="cont" class="jumbotron"></div>

</body>
</html>