<?php 
session_start();
$u=$_SESSION["usuario"];
$c=$_SESSION["clave"];

if ($u!=""&& $c!="") {
  
}else{

	header("Location: ../index.php");
	die();
}
 
	include('../conexion/conexion.php');

	$n=$_POST['nombre'];
	$a=$_POST['ape'];
	$t=$_POST['trat'];
	$w="";
	if($t!=""){
		$w=" contrato='$t' and ";
	}
	if ($n!="" && $a=="") {
		$sql="select * from profe where $w nombres like '%$n%' and estado='1'";	
	}elseif ($a!="" && $n=="") {
		$sql="select * from profe where $w ape_paterno like '%$a%' and estado='1'";	
	}else{
		$sql="select * from profe where $w nombres like '%$n%' and ape_paterno like '%$a%' and estado='1'";	
	}

	//echo $sql;
	
	$result=mysql_query($sql,$con);
	$cant = mysql_num_rows($result);
 ?>
 	<h5>Se hallaron <?php echo $cant; ?> registros</h5>
 	<table align="center" class='table table-bordered'>
 		<tr>
 			<th>N°</th>
 			<th>Nombres</th>
 			<th>Apellidos</th>
 			<th>Celular</th>
 			<th>DNI</th>
 			<th>Mail</th>
 			<th>Planilla</th>
 			<th>x hora</th>
 		</tr>
 		<?php 
 			$i = 0;
 			while ($r=mysql_fetch_array($result)) {	$i++; ?>
 			<tr>
 				<td><?php echo $i; ?></td>
 				<td><?php echo $r['nombres'] ?></td>
				<td><?php echo $r['ape_paterno']." ".$r['ape_materno'] ?></td>
				<td><?php echo $r['celular'] ?></td>
				<td><?php echo $r['dni'] ?></td>
				<td><?php echo $r['correo'] ?></td>
				<td><?php  if($r['contrato']){ echo "Sí"; }else{ echo "No"; } ?></td>
				<td><?php echo $r['tarifa'] ?></td>
 			</tr>		
 		<?php
 			}
 		 ?>
 	</table>