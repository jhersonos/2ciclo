<?php 
session_start();
include('conexion/conexion.php'); 
$u=$_SESSION["usuario"];
$c=$_SESSION["clave"];
if ($u!=""&& $c!="") {
}else{
	header("Location: index.php");
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Editar</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<meta http-equiv="Content-Type" content="text/html" />
	<link rel="stylesheet" href="css/chosen.css">
    <link rel="stylesheet" href="css/chosen.min.css">
<script type="text/javascript" src="js/chosen.jquery.js"></script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="home.php">Administrar</a>
			</div>
			<div class="collapse navbar-collapse" id="dropdown">
				<ul class="nav navbar-nav">
					<li class="dropdown" >
						<a href="#" id="c_tur" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						Laboratorios<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a onclick="labo();" href="#">Nueva Reserva</a></li>
							<li><a onclick="verlab();" href="#">Ver Registros</a></li>
							<!--<li><a onclick="veraula();" href="#">Aula</a></li>-->
						</ul>
						</li>
						
						<li class="dropdown" >
							<a href="#" id="c_tur" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Encuestas <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a onclick="verencu();" href="#">Reporte</a></li>
								<li><a onclick="encuesta();" href="#">Modificar</a></li>
								<li><a onclick="verencu();" href="#">Nueva encuesta</a></li>
							</ul>
						</li>
						<li class="dropdown" >
							<a href="#" id="c_tur" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Docentes <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a onclick="verdoce();" href="#">Buscar</a></li>
								<li><a onclick="mdocente();" href="#">Modificar</a></li>
								<li><a onclick="cargolab();" href="#">Carga Laboral</a></li>                                
								<li><a onclick="tard();" href="#">Tardanza</a></li>
								<li><a onclick="rep();" href="#">Reporte</a></li>
							</ul>
						</li>		
					</ul>			
					<ul class="nav navbar-nav" style="float:right;">
                    	<li class="dropdown">	
							<a href="salir.php" class="btn btn-default">Salir</a>
						</li>
					</ul>			
				</div>
			</div>
		</nav>
		<div id="general" class="container-fluid"></div>
    	<div id="mail"><script>$('#mail').hide();</script></div>
		<div id="msj"><script>$('#msj').hide();</script></div>

</body>
</html>