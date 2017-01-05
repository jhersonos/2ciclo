<?php include('../conexion/conexion.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Alumno</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<meta http-equiv="Content-Type" content="text/html" />
	<link rel="stylesheet" href="../css/chosen.css">
    <link rel="stylesheet" href="../css/chosen.min.css">
<script type="text/javascript" src="../js/chosen.jquery.js"></script>
</head>
<body>
<div class="col-md-8" style="background-color:white;color:black;margin-left:15%;margin-top:50px;border-radius:10px;">
	<form action="POST" name="Alumno" onsubmit="return savealu();" id="Alumno">
	<div class="col-md-6 inline-block">
		<div class="form-group">
			<h2>Registro Alumno</h2>
		</div>
		<div class="form-group">
		  <label>Nombre</label>
		  <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Nombres">
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Apellido paterno</label>
		  <input type="text" name="paterno" class="form-control" id="exampleInputEmail1" placeholder="Apellido paterno">
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Apellido Materno</label>
		  <input type="text" name="materno" class="form-control" id="exampleInputEmail1" placeholder="Apellido Materno">
		</div>
		<!--<div class="form-group">
		  <label for="exampleInputEmail1">Codigo</label>
		  <input type="text" name="codigo" class="form-control" id="exampleInputEmail1" placeholder="Codigo">
		</div>-->
		<div class="form-group">
		  <label for="exampleInputEmail1">Foto</label>
		  <input type="file" name="foto" class="form-control" id="exampleInputEmail1" placeholder="Apellido Materno">
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Fecha Nacimiento</label>
		  <input type="date" name="fecnac" class="form-control" id="exampleInputEmail1">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Departamento</label>
		  	<select name="departamento" id="departamento" class="form-control" onchange="provi();">
		  		<option>-- Seleccione departamento --</option>
		  		<?php 
		  			$sql="select * from ubigeo where pro_id='00' and dis_id='00'";
		  			$d=mysql_query($sql,$con);
		  			while ($rd=mysql_fetch_array($d)) {	?>
		  			<option value="<?php echo $rd['dep_id']; ?>"><?php echo $rd['nombre']; ?></option>
		  		<?php		
		  			}
		  		 ?>
		  	</select>
		 </div>
		 <div class="form-group" id="provi">
		 	<select name="provincia" id="provincia" class="form-control" onchange="distrito();">
		 		<option value="">-- Seleccione provincia --</option>
		 	</select>
		 </div>
		  <div class="form-group" id="dist">
		 	<select name="distrito" id="distrito" class="form-control">
		 		<option value="">-- Seleccione Distrito --</option>
		 	</select>
		 </div>	
		 <div class="form-group">
			  <label for="exampleInputEmail1">DNI</label>
			  <input type="text" name="dni" class="form-control" id="exampleInputEmail1" placeholder="dni">
		</div>	
	</div>
	<div class="col-md-6 inline-block">
			<div class="form-group" style="margin-top:67px;">
			  <label for="exampleInputEmail1">Direccion</label>
			  <input type="text" name="direccion" class="form-control" id="exampleInputEmail1" placeholder="direccion">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">Colegio</label>
			  <input type="text" name="colegio" class="form-control" id="exampleInputEmail1" placeholder="Colegio">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">Email</label>
			  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="email">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">Nro. Emergencia</label>
			  <input type="text" name="emergencia" class="form-control" id="exampleInputEmail1" placeholder="Nro emergencia">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">Apoderado</label>
			  <input type="text" name="apoderado" class="form-control" id="exampleInputEmail1" placeholder="Apoderado">
			</div>
			<!--<div class="form-group">
			  <label for="exampleInputEmail1">Apoderado</label>
			  <input type="text" name="apoderado2" class="form-control" id="exampleInputEmail1" placeholder="Apoderado">
			</div>-->
			<div class="form-group">
			  <label for="exampleInputEmail1">Partida Nacimiento</label>
			  <input type="file" name="parnac" class="form-control" id="exampleInputEmail1" placeholder="Partida Nacimiento">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">Certificado Estudio</label>
			  <input type="file" name="certificado" class="form-control" id="exampleInputEmail1">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail1">Referencia</label><br>
			  <div class="col-md-5 inline-block">
				  <label><input type="checkbox" value="1" name="check[]">---</label><br>
				  <label><input type="checkbox" value="2" name="check[]">---</label><br>
				  <label><input type="checkbox" value="3" name="check[]">---</label><br>
			  </div>
			  <div class="col-md-5 inline-block">
			  	  <label><input type="checkbox" value="4" name="check[]">---</label><br>
				  <label><input type="checkbox" value="5" name="check[]">---</label><br>
				  <label><input type="checkbox" value="6" name="check[]">---</label><br>
			  </div>
			</div>
		</div>
		<div class="col-md-12" style="text-align:center;">
				<input type="submit" class="btn btn-button" value="Registrarse">
				<a href="#" class="btn btn-button" style="color:black;">Cancelar</a>	
		</div>
	</form>		
</div>		
</body>
</html>