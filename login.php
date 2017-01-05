<?php 
session_start();
include('conexion/conexion.php'); 

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

$sql="select usuario, clave from usuario";
$result=mysql_query($sql,$con);
$r=mysql_fetch_array($result);
if ($usuario==$r['usuario'] && $clave==$r['clave']) {	
	$_SESSION["usuario"] = $usuario;
	$_SESSION["clave"] = $clave;
	header("Location: home.php");
	die();
}else{
	header("Location: index.php");
	die();
}
?>