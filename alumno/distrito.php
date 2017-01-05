<?php 
	include('../conexion/conexion.php');
	$id=$_REQUEST['id'];
	$d=$_REQUEST['d'];
	$sql="select * from ubigeo where dep_id='$id' and pro_id='$d' AND dis_id NOT LIKE  '00'";
	$result=mysql_query($sql,$con);
?>
<select name="distrito" id="distrito" class="form-control">	

<option value="">-- Seleccione Distrito --</option>
<?php
	while ($r=mysql_fetch_array($result)) {
?>
<option value="<?php echo $r['dis_id'] ?>"><?php echo $r['nombre']; ?></option>
<?php
	}
 ?>
 </select>