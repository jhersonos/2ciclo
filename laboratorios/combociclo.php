<?php 
	include('../conexion/conexion.php');

	$id=$_REQUEST['carre'];
	$sql2="select * from curso where car_id='$id' group by cic_id";
	$result2=mysql_query($sql2,$con);
 ?>
	<select name="ciclo" id="ciclo" class="form-control" onchange="ccurso();">
                        <option value="">-- Seleccione Ciclo --</option>
                        <?php while ($rci=mysql_fetch_array($result2)) {?>
                        	
                        	<option value="<?php echo $rci['cic_id'] ?>" ><?php echo $rci['cic_id']; ?></option>

                        <?php	
                        } ?>
    </select>

