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
//pc.id_secc lleva el ciclo y seccion -- Cambiar a solo ciclo para mostrar en editar
$ult="select pc.id,pc.id_profesor,pc.id_curso,p.nombres,p.ape_paterno,p.ape_materno,c.curso,pc.id_secc,c.id from profesor_curso pc inner join profe p on p.id=pc.id_profesor inner join cursos c on c.id=pc.id_curso where pc.id_carrera='$carre' and pc.id_secc='$secc'";
$xd=mysql_query($ult,$con);
if ($carre==""||$secc=="") {
?>

	<center><h2>Seleccione Carrera y ciclo</h2></center>

<?php	
}else{
?>
	<table border="1" width="950" align="center" style="border-radius:10px;">
	<tr><th>Profesor</th><th>Curso</th><th>Ciclo</th><th>-</th><th>-</th></tr>
	<?php 
		while ($pc=mysql_fetch_array($xd)) { ?>
			<tr>
				<td>
						<input type="hidden" value="<?php echo $pc[1]; ?>">
						<input class="form-control" readonly="true" style="background:white;" value="<?php echo $pc[3]." ".$pc[4]; ?>">
				</td> 	
				<td>		
						<input type="hidden" value="<?php echo $pc[2];?>">
						<input type="text" readonly="true" style="background:white;" class="form-control" value="<?php echo $pc[6];?>">
				</td>
				<td>		
						<input type="hidden" value="<?php echo $pc[7];?>">
						<input type="text" readonly="true" style="background:white;" class="form-control" value="<?php echo $pc[7]; ?>">
					</select>	
				</td>
				<td>
					<a onclick="delpc(<?php echo $pc[0] ?>);" class="btn btn-default" href="#">Eliminar</a>
				</td>
				<td>
					<!--Mostrar contendido de actualizar.php con actualizar() enviando id por actpc()-->
					<a href="#" class="btn btn-default" onclick="actualizar(<?php echo $pc[0];?>,'<?php echo $pc[7]; ?>');cus(<?php echo trim($pc[8]); ?>);">Editar</a>
				</td>
			</tr>
		<?php 
			}
	 ?>
	 <tr>
	 	<td align="center" colspan="5" style="padding:5px;">
	 	<input class="btn btn-default" type="submit" name="Agregar" onclick="agregar();" value="Agregar">
	 	<a href="home.php" class="btn btn-default">Cancelar</a>
	 	</td>
	 </tr>
</table>
<?php } ?>