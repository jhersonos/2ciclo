<?php  include('../conexion/conexion.php'); 
	
echo $id=$_POST['id'];
$estado=$_POST['estado'];
$obs=$_POST['obs'];

echo $update="update profe set observacion='$obs', estado='$estado'  where id='$id'";
$resu=mysql_query($update,$con);
?>