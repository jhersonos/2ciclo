<?php include('../conexion/conexion.php'); 
$id=$_REQUEST['id'];
if (isset($id)) {
	$sq="select * from c_laboral where id='$id'";
	$labor = mysql_query($sq,$con);
	$fl = mysql_fetch_array($labor);
}
//echo "<div style='border:1px solid black;'>".$sq."</div>";
?>
<!DOCTYPE html>

<div style="margin-left:15%;margin-top:4%;" class="col-lg-8">
    <div class="well bs-component">   
		<form class="form-horizontal" name="carga" id="carga" onsubmit="return cargas();">
			<fieldset>
					<legend>Carga Laboral</legend><a href="#" style="float:right;margin-top:-59px;" onclick="xcarga();" class="btn btn-button">Ver Cargos</a>
				<div class="col-md-6 inline-block">
	
					<input type="hidden" name="i" value="<?php echo $id; ?>">
						<div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Docente</label>
							<div class="col-lg-10">
								<select name="docente" id="docente" class="form-control">
									<option value="">-- Seleccion Docente --</option>
								<?php 
									$doc="select * from profe";
									$rdoc=mysql_query($doc,$con);
									while ($fdoc=mysql_fetch_array($rdoc)) {	
											if ($fl['docente']==$fdoc['id']) {
												$s="selected ";
											}else{$s="";}
										?>
										<option <?php echo $s;?> value="<?php echo $fdoc['id']; ?>"><?php echo $fdoc['nombres']." ".$fdoc['ape_paterno']; ?></option>
								<?php
									}
								?>
								</select>
	              			</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Carrera</label>
	            			<div class="col-lg-10">
	              				<select name="carrera" id="carrerax" class="form-control">
									<option value="">-- Seleccione Carrera --</option>
								<?php 
									$car="select * from carrera";
									$rcar=mysql_query($car,$con);
									while ($fcar=mysql_fetch_array($rcar)) {	
											if ($fl['carrera']==$fcar['id']) {
												$sc="selected ";
											}else{$sc="";}
										?>
										<option <?php echo $sc; ?> value="<?php echo $fcar['id']; ?>"><?php echo $fcar['nombre']; ?></option>
								<?php
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Ciclo</label>
							<div class="col-lg-10">
								<select name="ciclo" id="ciclo" class="form-control" onchange="lcurso();">
									<option value="">-- Seleccione Ciclo --</option>
								<?php 
									$cic="select * from curso group by cic_id";
									$rcic=mysql_query($cic,$con);
									while ($fcic=mysql_fetch_array($rcic)) {	
										if ($fl['ciclo']==$fcic['cic_id']) {
												$sci="selected ";
											}else{$sci="";}
											?>
										<option <?php echo $sci; ?> value="<?php echo $fcic['cic_id']; ?>"><?php echo $fcic['cic_id']; ?></option>
								<?php
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-group">
				             <label for="inputEmail" class="col-lg-2 control-label">Horas</label>
				             <div class="col-lg-10">
				                <input type="text" maxlength="8" required class="form-control" id="horas" name="horas" value="<?php echo $fl['horas']; ?>">
				              </div>
	         			</div>
					</div>
					<div class="col-md-6 inline-block">	
	          			<div class="form-group">
				             <label for="inputEmail" class="col-lg-2 control-label">Curso</label>
				             <div class="col-lg-10" id="cur">
				                <select name="curso" id="curso" class="form-control">
									<option value="">-- Seleccione Curso --</option>
									<script>
										var ca=$('#carrera').val();
										var ci=$('#ciclo').val();
										$('#cur').load('carga_laboral/curso.php?carrera='+ca+'&ci='+ci+'&curso=<?php echo $fl["curso"] ?>');
									</script>
								</select>
				              </div>
	         			</div>
	         			<div class="form-group">
		                    <label class="col-lg-2 control-label">Fecha</label>
		                    <div class="col-lg-10">
		                        <div>
		                         	Inicio<input type="date" class="form-control" style="height: 30px;" name="fechaini" id="fechaini" value="<?php echo $fl['f_inicio']; ?>" >
		                        </div> 
		                         <div>Fin
		                         	<input type="date" class="form-control" style="height: 30px;" required name="fechafin" id="fechafin" value="<?php echo $fl['f_final']; ?>"> </br>  </br>
		                         </div>     
		                    </div>
	                    </div> 	                 
	         		</div>	         		
	         		<div class="form-group" style="text-align:center;">
	         				<input type="submit" class="btn btn-button" style="color:black" value="Asignar">
	         				
	         			</div>
			</fieldset>
		</form>
	</div>
</div>