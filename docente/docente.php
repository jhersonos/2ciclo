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
<?php include('../conexion/conexion.php'); ?>
<div class="jumbotron" id="generaldoc" style="padding: 30px 40px;">
	
		<div class="form-inline" style="margin-bottom: 25px;">
		  <div class="form-group">
		    <label for="exampleInputName2">INFO DOCENTE</label>
		    <input style="margin-left: 15px;" type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre">
		  </div>
		  <div class="form-group">
		    <input style="margin-left: 15px;" type="text" class="form-control" id="ape" name="ape" placeholder="Ingrese Apellido">
		  </div>
		  <div class="form-group">
		    <select  style="margin-left: 15px;" class="form-control" id="trat">
		    	<label for="exampleInputName2">Trato</label>
    			<option value="">Todos</option>
    			<option value="1">Planilla</option>
    			<option value="0">Por fuera</option>
    		</select>
		  </div>
		  <button style="margin-left: 15px;" type="submit" onclick="buscarprofe();" class="btn btn-default">BUSCAR</button>
		</div>

<div id="contedoc">
</div>
</div>