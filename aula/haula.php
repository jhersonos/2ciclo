<?php
	include('ainc.php');
	include('../conexion/conexion.php');

	$fec=$_POST['fec'];
	$lab=$_POST['lab'];
	$tur=$_POST['tur'];
	$pab=$_POST['pabe'];
	$t=0;
	if ($tur==1) {
		$t=50;
	}elseif ($tur==2) {
		$t=45;
	}elseif ($tur==3) {
		$t=45;
	}

	
	$consulta="SELECT r.id_carrera,r.profe,r.f_ini,r.f_fin,r.ciclo,r.seccion,r.dia,r.curso,r.h_ini,r.h_fin,r.lab,timediff(r.h_fin,r.h_ini) as resta FROM reserva r inner join aula a on a.id=r.lab WHERE r.Turno='$tur' and r.dia='$lab' and '$fec' between r.f_ini and r.f_fin and a.pabe='$pab' order by a.piso ";
	$resultado=mysql_query($consulta,$con);

?>
	<table align="center" class="table table-bordered" border="1px">
		<tbody>
			<tr>
				<th width="10">Hora</th>
				<?php
					$aul="select * from aula where pabe='$pab'";
					$ra=mysql_query($aul,$con);
					while ($raula=mysql_fetch_array($ra)) {?>
						<th width="250">
							<?php echo $raula['nombre']; ?>
							<br>
							<span class="letra"><?php echo $raula['descrip']; ?></span>
						</th>
					<?php
					}
				 ?>
			</tr>
			<tr>
				<td class="v">capacidad</td>
				<?php
					$cap="select * from aula where pabe='$pab'";
					$rc=mysql_query($cap,$con);
					while ($rr=mysql_fetch_array($rc)) {?>
						<td width="250" class="v">
							<?php echo $rr['cap'];?>
							
							
						</td>
					<?php
					}
				 ?>
			</tr>
			<tr>
				<td>
				<?php
                	switch ($tur) {
						case '1':
							echo "<div class='hora img-rounded'><span>8:00 / 8:45</span></div>".
                                 "<div class='hora img-rounded'><span>8:45 / 9:30</span></div>".
                                 "<div class='hora img-rounded'><span>9:30 / 10:15</span></div>".
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
					<?php
						$aul2="select * from aula where pabe='$pab'";
						$ra2=mysql_query($aul2,$con);
						while ($raula2=mysql_fetch_array($ra2)) {
								$l=$raula2['id'];
							?>
							<td class="rev">
								<?php 
									$sq="select r.id_carrera,p.nombres,p.ape_paterno,r.f_ini,r.f_fin,r.ciclo,r.seccion,r.dia,c.cur_nom, r.h_ini,r.h_fin,timediff(r.h_fin,r.h_ini) as resta FROM reserva r inner join curso c on c.cur_id=r.curso inner join profe p on p.id=r.profe inner join aula a on a.id=r.lab WHERE r.Turno='$tur' and dia='$lab' and r.lab='$l' and '$fec' between r.f_ini and r.f_fin and a.pabe='$pab'";
									//$sq="SELECT r.id_carrera,r.profe,r.f_ini,r.f_fin,r.ciclo,r.seccion,r.dia,r.curso,r.h_ini,r.h_fin,r.lab,timediff(r.h_fin,r.h_ini) as resta FROM reserva r inner join aula a on a.id=r.lab WHERE Turno='$tur' and dia='$lab' and lab='$l' and '$fec' between f_ini and f_fin and a.pabe='$pab'";
									$rsq=mysql_query($sq,$con);
									$k=mysql_fetch_array($rsq);
									$xs=mysql_num_rows($rsq);
									if ($xs>0) {
										echo "<div class='img-rounded bloquea t".round(_min($k['resta'])/$t)." bg".$k['id_carrera'].toph($k['h_ini'],$tur)."'><span>".$k['cur_nom']."<br>".$k['nombres']." ".$k['ape_paterno']."<br>".$k['ciclo']." ".$k['seccion']."<br>".f1($k['f_ini'])." - ".f1($k['f_fin'])."</span></div>";
									}
																
								 ?>
							</td>
							
						<?php
						}
					 ?>


					
			</tr>
		</tbody>
	</table>