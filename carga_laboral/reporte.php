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
	
		//echo $sql="select p.*, SUM(cl.horas) as horas, (SUM(cl.horas) * p.tarifa) as gana from profe p inner join c_laboral cl on cl.docente = p.id where p.nombres like '%%' and p.ape_paterno like '%%' and p.estado='1' and (CURDATE() BETWEEN cl.f_inicio and cl.f_final) GROUP BY p.id";	
		
			$sql="SELECT p.*, SUM( cl.horas ) AS horas, (SUM( cl.horas ) * p.tarifa) AS gana FROM c_laboral cl INNER JOIN profe p ON p.id = cl.docente WHERE p.estado =  '1' AND (CURDATE( ) BETWEEN cl.f_inicio AND cl.f_final)	GROUP BY cl.docente";
		
	
	$result=mysql_query($sql,$con);
	$cant = mysql_num_rows($result);
 ?>
 <div class="jumbotron">
 	<h5>Se hallaron <?php echo $cant; ?> registros</h5>
 	<table align="center" class='table table-bordered' style="border-radius:10px;">
 		<tr>
 			<th>N°</th>
 			<th>Docente</th>
 			<th>Planilla</th>
 			<th>Horas</th>
 			<th>tarifa</th>
 			<th>--</th>
 			<!--<th>DNI</th>
 			<th>Mail</th>
 			<th>Planilla</th>
 			<th>x hora</th>-->
 		</tr>
 		<?php 
 			$i = 0;
 			while ($r=mysql_fetch_array($result)) {	$i++; ?>
 			<tr>
 				<td><?php echo $i; ?></td>
 				<td><?php echo $r['ape_paterno']." ".$r['ape_materno']." ".$r['nombres']; ?></td>
 				<td><?php  if($r['contrato']){ echo "Sí"; }else{ echo "No"; } ?></td>
				<td><?php echo $r['horas'] ?></td>
				<td><?php echo $r['gana'] ?></td>
				<td align="center">
					<a class="btn btn-info" id="xpo" data-toggle="modal" onclick="det('<?php echo $r[id]; ?>');" href="carga_laboral/pop.php" data-target="#ventana" >Detalle</a>
				</td>
 			</tr>		
 		<?php
 			}
 		 ?>
 	</table>
</div> 
<div id="pop" class="modal face" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>






