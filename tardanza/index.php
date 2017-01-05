<?php include('../conexion/conexion.php');
	$c="select * from profe order by ape_paterno";
	$result=mysql_query($c,$con); ?>

	
		<div class="col-md-6" style="background-color:white;color:black;margin-left:25%;margin-top:50px;border-radius:10px;">
			<form method="POST" name="reporte" onsubmit="return report();" id="reporte">
			<center><img src="img/logocv.png" alt="no found" width="200" style="margin-top: 10px;"></center></br>

					 
	
				<div class="col-md-5 inline-block">
				<div class="form-group">
					<label style="font-size:15px;color:black solid;">Tipo de Reporte</label><br>
					<label style="font-size:13px;color:black;">Debes seleccionar el tipo de reporte</label><br>
					<div style="width:250px;">
						  <select name="tipo" id="tipo" required class="form-control">
						  		<option value="">-- Seleccion Tipo --</option>
						  		<option value="1">Tardanza</option>
						  		<option value="2">Falta</option>
						  		<option value="3">No toma Asistencia</option>
						  		<option value="4">No registra Notas a la fecha</option>
						  		<option value="5">Solicitud de Copias fuera de tiempo</option>
						  		<option value="6">No registra avance pragmatico</option>
						  </select>
					</div>
				</div>
				</div> 
				<div class="col-md-5">
				<div class="form-group">
						<label style="color:black;">Nombre del docente que sera reportado</label><br>
						<label style="font-size:13px;color:black;">Seleccionar el nombre del docente que sera reportado</label>
					<div style="width:250px;">
						<select id="profe" name="profe" data-placeholder="Profesor" class="chosen-select form-control input-lg">
					          	<option>--Selecionar Profesor--</option>
					          	<?php while ($f=mysql_fetch_array($result)) { ?>
					          	<option value="<?php echo $f['id']; ?>"><?php echo $f['ape_paterno'].", ".$f['nombres']; ?></option>
					            <?php } ?>
				        </select>
						<script>$('.chosen-select').chosen();</script>
					</div>
				</div><br>
				</div>
				
				<div class="form-group">
					<label style="color:black;">El docente que falto Aviso</label><br>
					<label style="font-size:13px;color:black;">Indicar si el docente Aviso que no Asistira</label><br>
					<label><input type="radio" name="falta" value="si">Si</label><br>
				  	<label><input type="radio" name="falta" value="no">No</label><br>
				</div>
				<div class="form-group">
					<label style="color:black;">Observaciones </label><br>
					<label style="font-size:13px;color:black;">Debe indicar la cantidad de minutos de tardanza o el nombre del docente si no esta en la lista</label>
					<textarea name="observacion" style="width: 585px;" class="form-control" id="obs" placeholder="Digita las observaciones que tienes respecto al docente"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" onclick="mail();" class="btn btn-button">Reportar</button>
				</div>
				
			</form>
		</div>
	
