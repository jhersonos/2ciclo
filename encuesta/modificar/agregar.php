<?php 
session_start();
$u=$_SESSION["usuario"];
$c=$_SESSION["clave"];
if ($u!=""&& $c!="") {
  
}else
{
?>
<script type="text/javascript">
  window.location.href = "../index.php";
  </script>
<?php
}
?>
<?php include('../../conexion/conexion.php'); 

$carre=$_POST['carre'];
$secc=$_POST['secc'];
$ult="select id,nombres,ape_paterno,ape_materno from profe";
$ult1="select id, curso from cursos";
$carrera="select * from carrera where tipo_carre=1";
$xd=mysql_query($ult,$con);
$xd1=mysql_query($ult1,$con);
$xd2=mysql_query($carrera);
?>
<div class="contenedor">
	<form onsubmit="return nuevopc();" class="form-horizontal" name="pc" id="pc">	
	<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Profesor</label>
						<div class="col-lg-10">
							<select class='form-control' name="profe" id="profe">
						<?php
							while ($pc=mysql_fetch_array($xd)) { ?>
										<option value="<?php echo $pc[0]; ?>"><?php echo $pc[1]." ".$pc[2]." ".$pc[3] ?></option>
									<?php 
								}
						 ?>	
						 	</select><br>
              			</div>
	</div>
	<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Carrera</label>
						<div class="col-lg-10">
				<select class="form-control" onchange="load();" name="carrera" id="carreras">
				<option value="">-- Seleccione Carrera --</option>
					<?php 
						while ($pc3=mysql_fetch_array($xd2)) {?>
							<option value="<?php echo $pc3[0];?>"><?php echo $pc3[2]; ?></option>
					<?php	} ?>
				</select><br>
						</div>
	</div>
<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Ciclo</label>
						<div class="col-lg-10">

							<div id="s">			
										<select class='form-control' id="seccion_" name="seccion">
											<option value="">-- Seleccionar Carrera --</option>
										</select>				<br>
							</div>
						</div>
</div>
<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Curso</label>
						<div class="col-lg-10">

							<div id="c">
										<select class='form-control' name="curso" id="curso">
											<option value="">-- Seleccionar Ciclo --</option>
										</select>	<br>	
							</div>
						</div>
</div>						
	 	
	 		<br>
	 		<div style="text-align:center;">
	 		<input class="btn btn-default" type="submit" name="agregar" value="agregar">
	 		<a onclick="ocultar();" class="btn btn-default">Cancelar</a>
	 		</div>
</table>
</form>
</div>