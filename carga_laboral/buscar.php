<?php include('../conexion/conexion.php'); ?>
	<div class="jumbotron" style="margin-top:10px;">
		<div style="margin-top: -17px;">
		<div class="col-md-2 inline-block">
			<span style="color:white;font-size:20px;">Buscar Cargo</span>
		</div>
		<div class="col-md-2 inline-block">
			<select name="profe" id="profe" class="form-control">
				<option value="">-- Seleccionar Profesor --</option>
				<?php 
					$p="select * from profe group by nombres";
					$rp=mysql_query($p,$con);
					while ($pr=mysql_fetch_array($rp)) {?>
						<option value="<?php echo $pr['id'] ?>"><?php echo $pr['nombres']." ".$pr['ape_paterno']; ?></option>
					<?php
					}
				 ?>
			</select>
		</div>
		<div class="col-md-2 inline-block">
			<select name="carrera" id="carrera" class="form-control">
				<option value="">-- Seleccione Carrera --</option>
				<?php 
					$c="select * from carrera";
					$rc=mysql_query($c,$con);
					while ($fc=mysql_fetch_array($rc)) {?>
					<option value="<?php echo $fc['id'] ?>"><?php echo $fc['nombre']; ?></option>	
				<?php
					}
				 ?>
			</select>
		</div>
		<div class="col-md-2 inline-block">
			<select name="ciclo" id="ciclo" class="form-control" onchange="lcurso();">
				<option value="">-- Selecione Ciclo --</option>
				<?php 
					$ci="select cic_id from curso group by cic_id";
					$rci=mysql_query($ci);
					while ($fci=mysql_fetch_array($rci)) { ?>
						<option value="<?php echo $fci['cic_id']; ?>"><?php echo $fci['cic_id']; ?></option>
				<?php		
					}
				 ?>
			</select>
		</div>
		<div class="col-md-2 inline-block" id="cur">
			<select name="curso" id="curso" class="form-control">
				<option value="">-- Seleccione Curso --</option>
			</select>
		</div>	
		<div class="col-md-2 inline-block">
			<a href="#" class="btn btn-button" onclick="buscarc();">Buscar</a>
		</div>
	</div>
	</div>	
	<div id="buscar" class="jumbotron">
		<script type="text/javascript">$('#buscar').hide();</script>
	</div>
