<?php
    session_start();
    $u=$_SESSION["usuario"];
    $c=$_SESSION["clave"];
    if ($u!=""&& $c!="") {
    }else{
      header("Location: ../index.php");
      die();
    }

	include('../conexion/conexion.php');
	$c="select * from profe order by ape_paterno ";
	$result=mysql_query($c,$con);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Actualización Docente</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	 <link rel="stylesheet" href="../css/chosen.css">
    <link rel="stylesheet" href="../css/chosen.min.css">
  <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../js/index.js"></script>
    <script type="text/javascript" src="../js/chosen.jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html" />
</head>
<body>
<div class="container">
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" onsubmit="return editar();" role="login">
			<img src="../img/logocv.png" class="img-responsive" alt="" />
			<p style="text-align: justify;">Através de este formulario usted podrá actualizar toda su información personal para facilitar muchos procesos internos de la institución, agradecemos su tiempo y colaboración.
			</p>
      
          <select id="profe" required data-placeholder="Profesor" class="chosen-select form-control input-lg">
          	<option>--Selecionar Profesor--</option>
          	<?php while ($f=mysql_fetch_array($result)) { ?>
          	<option style="text-align: left;" value="<?php echo $f['id']; ?>"><?php echo $f['ape_paterno'].", ".$f['nombres']; ?></option>
            <?php } ?>
          </select>
          <div class="pwstrength_viewport_progress"></div>
          <button onclick="editar();" type="submit" name="go" class="btn btn-lg btn-primary btn-block">Actualizar datos</button>
          <div>
            <a style="color:white;" href="contacto.php" class="btn btn-lg btn-primary btn-block">Registrar Nuevo</a>
          </div>
        </form>
        <script>$('.chosen-select').chosen();</script>
        <!--<div class="form-links">
          <a href="http://libertadorvirtual.edu.pe">Aula Virtual</a>
        </div>-->
      </section>  
      </div>
      
      <div class="col-md-4"></div>
  </div>    
</div>
        
             
</body>
</html>