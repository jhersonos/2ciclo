			<?php 
				include('../conexion/conexion.php');
				$id=$_POST['id'];
				$consulta="select cl.*,c.cur_nom,p.ape_paterno,p.ape_materno,p.nombres,cr.nombre from c_laboral cl inner join curso c on c.cur_id=cl.curso inner join profe p on p.id=cl.docente inner join carrera cr on cr.id=cl.carrera where cl.docente='$id'";
				$res=mysql_query($consulta,$con);
				//$r=mysql_fetch_array($res);
			 ?>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="border:0px;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h4>Detalles</h4>
			</div>
			<div class="modal-body" style="border:0px;">
				<table width="100%" class="table table-striped">
				<tr>
					<th>Docente</th><th>Carrera</th><th>Ciclo</th><th>Curso</th><th>Fecha Inicio</th><th>Fecha Fin</th><th>Horas</th>
				</tr>
				
				<?php while ($r=mysql_fetch_array($res)) {
					# code...
				 ?>
					
					<tr>	
						<td>
							<?php echo $r['nombres']." ".$r['ape_paterno']." ".$r['ape_materno']; ?>
						</td>
					
						<td>
							<?php echo $r['nombre']; ?>
						</td>
				
						<td>
							<?php echo $r['ciclo']; ?>
						</td>

						<td>
							<?php echo $r['cur_nom']; ?>
						</td>

						<td>
							<?php echo $r['f_inicio']; ?>
						</td>

						<td>
							<?php echo $r['f_final'];?>
						</td>

						<td>
							<?php echo $r['horas']; ?>
						</td>
					</tr>				
					<?php } ?>
					
				</table>
			</div>
			<div class="modal-footer" style="border:0px;">
				<button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
			</div>
		</div>
	</div>
