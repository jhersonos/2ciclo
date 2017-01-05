<!DOCTYPE html>
<html>
<head>
	
	<title>Disponibilidad de Aula</title>
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
			<a class="navbar-brand" href="#">Aulas</a>
		</div>

		<div class="collapse navbar-collapse" id="dropdown">
			<ul class="nav navbar-nav">
    			<li class="dropdown">
                	<div style="margin:6px">
                		<?php $fecha_actual=date("Y/m/d"); ?>
                		<input style="padding: 6px; height: 38px;" class="form-control" type="date" id="fecha"/>
                	</div>
				</li>				       
<!---->                      
				<li class="dropdown">
					<input type="hidden" id="lab"/>
					<a href="#" id="c_lab" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Dia	
                    	<span class="caret"></span>
                    </a>
					<ul class="dropdown-menu" role="menu">
						<li><a onclick="setaula(1);" href="#">Lunes</a></li>
						<li><a onclick="setaula(2);" href="#">Martes</a></li>
						<li><a onclick="setaula(3);" href="#">Miercoles</a></li>
						<li><a onclick="setaula(4);" href="#">Jueves</a></li>
						<li><a onclick="setaula(5);" href="#">Viernes</a></li>
						<li><a onclick="setaula(6);" href="#">Sabado</a></li>
					</ul>
				</li>
<!---->
				<li class="dropdown">
					<input type="hidden" id="pabellon" />
					<a href="#" id="pabe" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Pabellon
                    	<span class="caret"></span>
                    </a>
					<ul class="dropdown-menu" role="menu">
						<li><a onclick="setpabe('A');" href="#">A</a></li>
						<li><a onclick="setpabe('B');" href="#">B</a></li>
						<!--<li><a onclick="settur(3);" href="#">Noche</a></li>-->
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
						<li><a onclick="setturn(1);" href="#">Mañana</a></li>
						<li><a onclick="setturn(2);" href="#">Tarde</a></li>
						<li><a onclick="setturn(3);" href="#">Noche</a></li>
					</ul>
				</li>	
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" onclick="buscaraula();">Buscar</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div id="conte" class="jumbotron"></div>

</body>
</html>