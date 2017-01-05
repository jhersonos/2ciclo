<?php 
	include("../conexion/conexion.php");
	$id=$_POST['id'];
	if ($id!="") {
		$sql="delete from reserva where id='$id'";
		$resultado=mysql_query($sql,$con);
	}else{
		//
	}
	
 ?>