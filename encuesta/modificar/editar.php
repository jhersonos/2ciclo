<?php 
session_start();
$u=$_SESSION["usuario"];
$c=$_SESSION["clave"];
if ($u!=""&& $c!="") {
  
}else
{
?>
<script type="text/javascript">
  window.location.href = "../index.php";
  </script>
<?php
}
?>
<?php include('../../conexion/conexion.php'); ?>
<?php 
	$sql="select * from carrera where tipo_carre=1";
	$result=mysql_query($sql);
	
 ?>
<div class="jumbotron" id="general">
		
		<!--<div class="navbar-header">
			<a class="navbar-brand" href="#">Modificar</a>
		</div>-->
		<div class="collapse navbar-collapse" id="dropdown">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<select onchange="loadsec();" name="carre" id="carre" class="form-control custom" style="top:5px;">
						<option value="">-- Seleccione Carrera --</option>
						<?php 
							while ($r=mysql_fetch_array($result)) {
								echo "<option value='$r[0]'>$r[2]</option>";
							}
						 ?>
					</select>
				</li>
				<li id="seccion" class="dropdown">
					<select name="secc" id="secc" class="form-control custom" style="margin-left:5px;top:5px;">
					</select>
				</li>
				<li class="dropdown">
                    <!--<a href="#" class="dropdown-toggle" >Buscar</a>-->
                    <button onclick="buscarpc();" style="margin-left:10px;margin-top:8px;" name="buscar" class="btn btn-default">Buscar</button>
				</li>
			</ul>
			<!--<ul class="nav navbar-nav" style="float:right;">	
				<li class="dropdown">
					<a href="../reservar.php" class="btn btn-default">Volver</a>
				</li>
				<li class="dropdown">	
					<a href="../salir.php" class="btn btn-default">Salir</a>
				</li>
			</ul>-->
			
		</div>



	<div class="jumbotron" id="conte2" style="border:0px;">

	</div>
	<div class="jumbotron" id="editar" style="border:0px;">
		
	</div>
	<div class="jumbotron" id="editar2" style="border:0px;">
		
	</div>
	<script type="text/javascript">$("#editar").hide();</script>
</div>