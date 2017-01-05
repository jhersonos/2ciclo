<?php 
	session_start();
	include('conexion/conexion.php'); 
	$u=$_SESSION["usuario"];
	$c=$_SESSION["clave"];
	if ($u!="" && $c!="") {
		header("Location: home.php");
		die();
	}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
	<title>Ingresar</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<meta http-equiv="Content-Type" content="text/html" />
</head>
<body>
<div class="container">
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="login.php" role="login">
			<img src="img/logocv.png" class="img-responsive" alt="" />
			<label for="inputEmail" class="col-lg-2 control-label">Usuario:</label>
			<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario">
			<div class="pwstrength_viewport_progress"></div>
			<label for="inputEmail" class="col-lg-2 control-label">Password:</label>
			<input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña">
			<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Ingresar</button>
		</form>
      </section>  
      </div>
      
      <div class="col-md-4">v-1.2</div>
  </div>    
</div>
</body>
</html>