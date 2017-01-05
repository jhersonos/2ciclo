<?php 
	include('../conexion/conexion.php');
	$id=$_REQUEST['id'];

	$sql="select * from ubigeo where dep_id='$id' and dis_id='00' AND pro_id NOT LIKE  '00'";
	$result=mysql_query($sql,$con);
?>
<select name="provincia" id="provincia" class="form-control" onchange="dist();">	
<option value="">-- Seleccione Provincia --</option>
<?php
	while ($r=mysql_fetch_array($result)) {
?>
<option value="<?php echo $r['pro_id'] ?>"><?php echo $r['nombre']; ?></option>
<?php
	}
 ?>
 </select>