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
<?php 

	include('../../conexion/conexion.php');

$id=$_POST['idpc'];
$ns=$_POST['ns'];
$sql="select * from profesor_curso where id='$id'";
$resultado=mysql_query($sql,$con);
$datos=mysql_fetch_array($resultado);
$idpro=$datos['id_profesor'];
$idcarre=$datos['id_carrera'];
$idcur=$datos['id_curso'];
//recibe ciclo y seccion -- cambiar a solo ciclo
echo $idsec=$datos['id_secc'];
$profesor="select * from profe";
$p=mysql_query($profesor,$con);
$ca="select * from carrera where tipo_carre=1";
$car=mysql_query($ca,$con);
$curso="select * from curso";
$c=mysql_query($curso,$con);
$matriz="select * from matriz"; 
$mm=mysql_query($matriz,$con);
?>
<div class="contenedor">
<form class="form-horizontal x" method="POST"  name="actpc" id="actpc" onsubmit="return actualizarpc();">
		<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Profesor</label>
						<div class="col-lg-10">
							<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
							<select name="p" id="p" class="form-control">
								<?php while ($ep=mysql_fetch_array($p)) {?>
									
										<option <?php if ($ep['id']==$idpro) {
											echo "selected";
										} ?> value="<?php echo $ep['id'];?>"><?php echo $ep['nombres']." ".$ep['ape_paterno'];  ?></option>
									
								<?php } ?>
							</select>
						</div>	
		</div>				
			<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Carrera</label>
						<div class="col-lg-10">

							<select name="c" id="c" class="form-control" onchange="loadciclo();">
								<?php while ($ec=mysql_fetch_array($car)) { ?>

											<option <?php if ($ec['id']==$idcarre) {
											echo "selected";
										} ?> value="<?php echo $ec['id']; ?>"><?php echo $ec['nombre']; ?></option>
								<?php	} ?>
							</select>
						</div>
			</div>						
<div class="form-group">
	<label for="inputEmail" class="col-lg-2 control-label">Ciclo</label>
			<div class="col-lg-10">
				<div id="cic">
					<select name="ci" id="ci" class="form-control">
						<option value="">-- Seleccione Carrera --</option>
					</select>
									<script>
										$('#ci').load('encuesta/modificar/actciclo.php',{ic:'<?php echo $idcarre; ?>',ns:'<?php echo trim($ns); ?>'})	
									</script>
				</div>			
			</div>
</div>

<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Curso</label>
							<div class="col-lg-10">				
								<div id="cur">
									<select name="cu" id="cu" class="form-control">
										<option value="">-- Seleccionar Curso --</option>
									</select>
									<script>
									$('#cur').load('encuesta/modificar/actcurso.php',{ic:'<?php echo $idcarre; ?>',ci:'<?php echo $idsec; ?>'})
									</script>	
								</div>
							</div>
			</div>				
			<div style="text-align:center;">
				<input class="btn btn-default" type="submit" name="actualizar" value="actualizar">
				<a onclick="oc();" class="btn btn-default">Cancelar</a>
			</div>
		
</form>
</div>