<?php 

	include('../conexion/conexion.php');
	$idc=$_REQUEST['carrera'];
	$idci=$_REQUEST['ci'];
	$idcu=$_POST['curso'];
	if ($idc == "" || $idci == "") {
		$sql2="select * from curso";	
	}else{
	$sql2="select * from curso where car_id='$idc' and cic_id='$idci'";
}
	$result=mysql_query($sql2,$con);

	 ?>
	<select class='form-control' name="curso" id="curso">
					<option value="">-- Seleccione Curso --</option>
					<?php 
					while ($pc2=mysql_fetch_array($result)) { 
						if ($idcu==$pc2['cur_id']) {
							$x="selected";
						}else{$x="";}
						?>

						<option <?php echo $x; ?> value="<?php echo $pc2['cur_id'];?>"><?php echo $pc2['cur_nom']; ?></option>
						
						<?php } ?>
	</select>	