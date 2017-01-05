<?php
	include('inc.php');
	include('../conexion/conexion.php');

	$lab=$_POST['lab'];
	$tur=$_POST['tur'];
	$t=0;
	if ($tur==1) {
		$t=50;
	}elseif ($tur==2) {
		$t=45;
	}elseif ($tur==3) {
		$t=45;
	}

	$fec=$_POST['fec'];

	//$consulta="select r.id_carrera,p.nombres,p.ape_paterno,r.f_ini,r.f_fin,r.ciclo,r.seccion,r.dia,c.cur_nom, r.h_ini,r.h_fin,timediff(r.h_fin,r.h_ini) as resta FROM reserva r inner join curso c on c.cur_id=r.curso inner join profe p on p.id=r.profe WHERE r.Turno='$tur' and r.lab='$lab' and '$fec' between r.f_ini and r.f_fin";
	$consulta="SELECT r.id_carrera, r.curso, p.nombres, p.ape_paterno, r.f_ini, r.f_fin, r.ciclo, r.seccion, r.dia, r.h_ini, r.h_fin, TIMEDIFF( r.h_fin, r.h_ini ) AS resta
				FROM reserva r
				INNER JOIN profe p ON p.id = r.profe
				WHERE r.Turno =  '$tur'
				AND r.lab =  '$lab'
				AND  '$fec' between r.f_ini and r.f_fin
				LIMIT 0 , 30";

	$arr=array();
	$resultado=$cn->query($consulta); //mysql_query($consulta,$con);
	if ($resultado->num_rows>0) {
		while($fila = mysqli_fetch_array($resultado)) {
			$arr[]=$fila;
		}
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<table align="center" class="table table-bordered" border="1px">
		<tbody>
			<tr>
				<th width="10">Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
			</tr>
			<tr>
				<td>
				<?php
                	switch ($tur) {
						case '1':
							echo "<div class='hora img-rounded'><span>8:00 / 8:45</span></div>".
                                 "<div class='hora img-rounded'><span>8:45 / 9:30</span></div>".
                                 "<div class='hora img-rounded'><span>9:30 / 10:15</span></div>".
                                 "<div class='hora img-rounded'><span>10:15 / 11:00</span></div>".
                                 "<div class='hora img-rounded'><span>11:00 / 11:45</span></div>".
                                 "<div class='hora img-rounded'><span>11:45 / 12:30</span></div>";
							break;
                        case '2':
							echo "<div class='hora img-rounded'><span>2:00 / 2:45</span></div>".
                                 "<div class='hora img-rounded'><span>2:45 / 3:30</span></div>".
                                 "<div class='hora img-rounded'><span>3:30 / 4:15</span></div>".
								 "<div class='hora img-rounded'><span>4:15 / 5:00</span></div>".
                                 "<div class='hora img-rounded'><span>5:00 / 5:45</span></div>";
							break;
						
						case '3':
							echo "<div class='hora img-rounded'><span>6:00 / 6:45</span></div>".
                                 "<div class='hora img-rounded'><span>6:45 / 7:30</span></div>".
                                 "<div class='hora img-rounded'><span>7:30 / 8:15</span></div>".
                                 "<div class='hora img-rounded'><span>8:30 / 9:15</span></div>".
                                 "<div class='hora img-rounded'><span>9:15 / 10:00</span></div>";
							break;
					}
				?>
				</td> 
				<td class="rev">
				<?php
					foreach ($arr as $k) {
						if($k['dia']==1) {
							if ($k['curso']!="") {
								$ic=$k['curso'];
								$sc="select * from curso where cur_id='$ic'";
								$rc=mysql_query($sc,$con);
								$fc=mysql_fetch_array($rc);
								$nc=$fc['cur_nom'];
							}else{
								$ica=$k['id_carrera'];
								$sca="select * from carrera where id='$ica'";
								$rca=mysql_query($sca,$con);
								$fca=mysql_fetch_array($rca);
								$nc=$fca['nombre'];
							}	
						echo "<div class='img-rounded bloque t".round(_min($k['resta'])/$t)." bg".$k['id_carrera'].toph($k['h_ini'],$tur)."'><span>".$nc."<br>".$k['nombres']." ".$k['ape_paterno']."<br>".$k['ciclo']." ".$k['seccion']."<br>".f1($k['f_ini'])." - ".f1($k['f_fin'])."</span></div>";				
						}
					}
				?>
				</td>
				<td class="rev">
				<?php
                	foreach ($arr as $k) {
						if ($k['dia']==2) {
							if ($k['curso']!="") {
								$ic=$k['curso'];
								$sc="select * from curso where cur_id='$ic'";
								$rc=mysql_query($sc,$con);
								$fc=mysql_fetch_array($rc);
								$nc=$fc['cur_nom'];
							}else{
								$ica=$k['id_carrera'];
								$sca="select * from carrera where id='$ica'";
								$rca=mysql_query($sca,$con);
								$fca=mysql_fetch_array($rca);
								$nc=$fca['nombre'];
							}	
						echo "<div class='img-rounded bloque t".round(_min($k['resta'])/$t)." bg".$k['id_carrera'].toph($k['h_ini'],$tur)."'><span>".$nc."<br>".$k['nombres']." ".$k['ape_paterno']."<br>".$k['ciclo']." ".$k['seccion']."<br>".f1($k['f_ini'])." - ".f1($k['f_fin'])."</span></div>"; 
						}
				} 
				?>
                </td>
				<td class="rev">
				<?php
                	foreach ($arr as $k) {
						if ($k['dia']==3) {
							if ($k['curso']!="") {
								$ic=$k['curso'];
								$sc="select * from curso where cur_id='$ic'";
								$rc=mysql_query($sc,$con);
								$fc=mysql_fetch_array($rc);
								$nc=$fc['cur_nom'];
							}else{
								$ica=$k['id_carrera'];
								$sca="select * from carrera where id='$ica'";
								$rca=mysql_query($sca,$con);
								$fca=mysql_fetch_array($rca);
								$nc=$fca['nombre'];
							}	
						echo "<div class='img-rounded bloque t".round(_min($k['resta'])/$t)." bg".$k['id_carrera'].toph($k['h_ini'],$tur)."'><span>".$nc."<br>".$k['nombres']." ".$k['ape_paterno']."<br>".$k['ciclo']." ".$k['seccion']."<br>".f1($k['f_ini'])." - ".f1($k['f_fin'])."</span></div>"; 
						}
					} 
				?>
                </td>
				<td class="rev">
				<?php
                	foreach ($arr as $k) {
						if ($k['dia']==4) {
							if ($k['curso']!="") {
								$ic=$k['curso'];
								$sc="select * from curso where cur_id='$ic'";
								$rc=mysql_query($sc,$con);
								$fc=mysql_fetch_array($rc);
								$nc=$fc['cur_nom'];
							}else{
								$ica=$k['id_carrera'];
								$sca="select * from carrera where id='$ica'";
								$rca=mysql_query($sca,$con);
								$fca=mysql_fetch_array($rca);
								$nc=$fca['nombre'];
							}	
						echo "<div class='img-rounded bloque t".round(_min($k['resta'])/$t)." bg".$k['id_carrera'].toph($k['h_ini'],$tur)."'><span>".$nc."<br>".$k['nombres']." ".$k['ape_paterno']."<br>".$k['ciclo']." ".$k['seccion']."<br>".f1($k['f_ini'])." - ".f1($k['f_fin'])."</span></div>"; 
						}
					}
				?>
                </td>
				<td class="rev">
				<?php
                	foreach ($arr as $k) {
						if ($k['dia']==5) {
							if ($k['curso']!="") {
								$ic=$k['curso'];
								$sc="select * from curso where cur_id='$ic'";
								$rc=mysql_query($sc,$con);
								$fc=mysql_fetch_array($rc);
								$nc=$fc['cur_nom'];
							}else{
								$ica=$k['id_carrera'];
								$sca="select * from carrera where id='$ica'";
								$rca=mysql_query($sca,$con);
								$fca=mysql_fetch_array($rca);
								$nc=$fca['nombre'];
							}	
						echo "<div class='img-rounded bloque t".round(_min($k['resta'])/$t)." bg".$k['id_carrera'].toph($k['h_ini'],$tur)."'><span>".$nc."<br>".$k['nombres']." ".$k['ape_paterno']."<br>".$k['ciclo']." ".$k['seccion']."<br>".f1($k['f_ini'])." - ".f1($k['f_fin'])."</span></div>"; 
						}
					}
				?>
                </td>
				<td class="rev">
				<?php
                	foreach ($arr as $k) {
						if ($k['dia']==6) {
							if ($k['curso']!="") {
								$ic=$k['curso'];
								$sc="select * from curso where cur_id='$ic'";
								$rc=mysql_query($sc,$con);
								$fc=mysql_fetch_array($rc);
								$nc=$fc['cur_nom'];
							}else{
								$ica=$k['id_carrera'];
								$sca="select * from carrera where id='$ica'";
								$rca=mysql_query($sca,$con);
								$fca=mysql_fetch_array($rca);
								$nc=$fca['nombre'];
							}	
						echo "<div class='img-rounded bloque t".round(_min($k['resta'])/$t)." bg".$k['id_carrera'].toph($k['h_ini'],$tur)."'><span>".$nc."<br>".$k['nombres']." ".$k['ape_paterno']."<br>".$k['ciclo']." ".$k['seccion']."<br>".f1($k['f_ini'])." - ".f1($k['f_fin'])."</span></div>"; 
						}
					}  ?>
				</td>
			</tr>
		</tbody>
	</table>