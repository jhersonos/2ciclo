<?php 
	include('../conexion/conexion.php');
	$doc=$_POST['docente'];
	$car=$_POST['carrera'];
	$ciclo=$_POST['ciclo'];
	$curso=$_POST['curso'];
	$fini=$_POST['fechaini'];
	$ffin=$_POST['fechafin'];
	$hora=$_POST['horas'];
	$fecha=date("Ymd");
	$estado=1;
	$id=$_POST['i'];

	if ($id != "") {
		$sql="update c_laboral set docente='$doc', carrera='$car',ciclo='$ciclo', curso='$curso',f_inicio='$fini', f_final='$ffin',horas='$hora' where id='$id'";
	}else{
	$sql="insert into c_laboral (docente,carrera,ciclo,curso,f_inicio,f_final,horas,fecha,estado) values('$doc','$car','$ciclo','$curso','$fini','$ffin','$hora','$fecha','$estado')";
}
	$result=mysql_query($sql,$con);
 ?>