<?php include('../conexion/conexion.php');	


$laboratorio=$_POST['laboratorios'];	
$dia=$_POST['dia'];
$fechaini=$_POST['fechaini'];
$fechafin=$_POST['fechafin'];
$horaini=$_POST['horaini'];
$horafin=$_POST['horafin'];
//
$carrera=$_POST['carrera'];
//
$curso=$_POST['txtcurso'];
$profesor=$_POST['txtprofesor'];
$turno=$_POST['turno'];
$ciclo=$_POST['ciclo'];
$seccion=$_POST['seccion'];
$hoy = date("Ymd");
$estado=1;

$rs = mysql_query("select * from reserva where lab='$laboratorio' and turno='$turno' and dia='$dia' and ('$fechaini'<=f_fin) and ('$fechafin'>=f_ini) and (addtime('$horaini','00:00:01')<=h_fin) and (subtime('$horafin','00:00:01')>=h_ini)", $con);
$num = mysql_num_rows($rs);


if($num==0)
{
	$consulta="insert into reserva(lab,dia,f_ini,f_fin,h_ini,h_fin,id_carrera,curso,profe,turno,ciclo,seccion,fecha,estado) 
	values('$laboratorio','$dia', '$fechaini', '$fechafin', '$horaini','$horafin','$carrera','$curso','$profesor','$turno','$ciclo','$seccion','$hoy','$estado')";
	$resultado = mysql_query($consulta,$con);

    echo "1";
}
else
{
    echo "0";
}
?>
