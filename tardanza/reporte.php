<?php 
	include('../conexion/conexion.php');

	$tipo=$_POST['tipo'];
	$profe=$_POST['profe'];
	$falta=$_POST['falta'];
	$obser=$_POST['observacion'];

	$sql="insert into reporte(tipo,profesor,falta,observacion) values('$tipo','$profe','$falta','$obser')";
	$result=mysql_query($sql,$con);

 ?>