<html>
<head>
	<?php 	include('../conexion/conexion.php');
		$id=$_REQUEST['id'];
		$tip=$_REQUEST['tipo'];
		$obs=$_REQUEST['obs'];
		if ($tip=='1') {
			$tipo='Tardanza';
		}if ($tip=='2') {
			$tipo='Falta';
		}if ($tip=='3') {
			$tipo='No toma asistencia';
		}if ($tip=='4') {
			$tipo='No registra notas a la fecha';
		}if ($tip=='5') {
			$tipo='Solicitud de Copias fuera de tiempo';
		}if ($tip=='6') {
			$tipo='No registra avance pragmatico';
		}
		$sql="select * from profe where id='$id'";
		$resul=mysql_query($sql,$con);
		$arr=mysql_fetch_array($resul);
		$nombre=$arr['nombres']." ".$arr['ape_paterno'];

		?>
	<title>Mensaje</title>
</head>
<body>
<table border="0" width="100%">
	<tr>
		<td width="80%">Estimado Profesor:<?php echo $nombre; ?></td><td width="20%" align="center"><img src="../img/logocv.png" alt="No found"></td>
	</tr>
	<tr>
		<td colspan="2">Asunto: <?php echo $tipo; ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo $obs; ?><br><br>a</td>
	</tr>
	<tr>
		<td colspan="2"><b>Secretaria Academica</b></td>
	</tr>
</table>
</body>
</html>