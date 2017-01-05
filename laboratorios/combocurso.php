	<?php 

	include('../conexion/conexion.php');
	$idc=$_REQUEST['carre'];
	$idci=$_REQUEST['ciclo'];

	$sql2="select * from curso where car_id='$idc' and cic_id='$idci'";
	$result=mysql_query($sql2,$con);

	 ?>
	<select class='form-control' name="txtcurso" id="curso">
					<option value="">-- Seleccione Curso --</option>
					<?php 
					while ($pc2=mysql_fetch_array($result)) { ?>

						<option value="<?php echo $pc2['cur_id'];?>"><?php echo $pc2['cur_nom']; ?></option>
						
						<?php } ?>
	</select>	