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

	$ac="Registrar";
	$id = $_REQUEST['id'];


	if (isset($id)){
		$ac="Actualizar";        
		$sql = "SELECT * FROM profe where id = '$id'"; 
		$result = mysql_query($sql,$con);
		$f = mysql_fetch_array($result);
    $cur=explode(",",$f['curso']);
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Actalización de Datos</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/chosen.css">
    <link rel="stylesheet" href="../css/chosen.min.css">
  
	  <script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="../js/index.js"></script>
    <script type="text/javascript" src="../js/chosen.jquery.js"></script>
    
</head>

<body>

<div class="top30 container">

<center>
<div id="msj" class="mesj"></div>
</center>
<div class="well bs-component" id="contenedor">
<!--Modal-->
<button id="est" class="btn btn-info" style="float:right;" data-toggle="modal" data-target="#ventana">Estado</button>
  
  <?php if (isset($id)){?>
    <script>$("#est").show();</script>
  <?php
    }else{?>
    <script>$("#est").hide();</script>
    <?php
    }
  ?>
<div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="baja" onsubmit="return bajon();">
        <div class="modal-header" style="border:0px;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h4>¿Desea dar de baja al Docente?</h4>
          <label><input type="radio" name="estado" value="0">Si</label><br>
          <label><input type="radio" name="estado" value="1" checked="true">No</label>
        </div>
        <div class="modal-body" style="border:0px;">
            Observaciones:<br>
            <textarea placeholder="Digite el motivo u observacion por la cual dara de baja al Docente" name="obs" style="width: 541px;height: 78px;border-radius: 5px;"></textarea>
            <input type="hidden" name="id" value="<?php echo $id; ?>" >
          
        </div>
        <div class="modal-footer" style="border:0px;">
          <button type="submit" class="btn btn-primary">Aceptar</button>
          <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
        </div>
      </form> 
    </div>
  </div>
</div>
<!---->
	<form class="form-horizontal" id="fcontacto" onsubmit="return addcontact();">
		<input type="hidden" name="id" value="<?php echo $id; ?>" >
		<fieldset>
			<legend>Ingresa tu información</legend>
				<div class="col-md-6">
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Nombre</label>
						<div class="col-lg-10">
							<input type="text" value="<?php echo $f['nombres'];?>" required class="form-control" id="nombre" name="txtnombre">
              			</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Apellido</label>
            <div class="col-lg-10">
              				<input type="text" value="<?php echo $f['ape_paterno'];?>" required class="form-control" id="apellidopa" name="txtapellidopa">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Materno</label>
						<div class="col-lg-10">
							<input type="text" value="<?php echo $f['ape_materno'];?>" required class="form-control" id="apellidoma" name="txtapellidoma">
						</div>
					</div>
          <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">DNI</label>
             <div class="col-lg-10">
                <input type="text" maxlength="8" value="<?php echo $f['dni'];?>" required class="form-control" id="dni" name="txtdni">
              </div>
         </div>
          <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">Género</label>
             <div class="col-lg-10">
                <select name="genero" id="generos" class="form-control">
                  <option>-- Seleccione Genero --</option>
                  <option <?php if ($f['genero']=='M') {
                          echo "selected";
                        } ?> value="M">Masculino</option>
                  <option <?php if ($f['genero']=='F') {
                          echo "selected";
                        } ?> value="F">Femenino</option>
                </select>
              </div>
         </div>
          <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">Fecha Nac</label>
             <div class="col-lg-10">
                <input style="height: 47px;" class="form-control" type="date" name="fechanac" value="<?php echo $f['fec_nac'];?>">
              </div>
         </div>
          <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">Telefono</label>
             <div class="col-lg-10">
                <input type="text" maxlength="9" value="<?php echo $f['telefono'];?>" required class="form-control" id="telefono" name="txttelefono">
              </div>
         </div>

          <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">Celular</label>
             <div class="col-lg-10">
                <input type="text" value="<?php echo $f['celular'];?>" required class="form-control" id="celular" name="txtcelular">
              </div>
         </div>
         <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">Correo</label>
             <div class="col-lg-10">
                <input type="text" value="<?php echo $f['correo'];?>" required class="form-control" id="correo" name="txtcorreo">
              </div>
         </div>
        <!----> </div>
         <div class="col-md-6">
          <!---->
         <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">Direccion</label>
             <div class="col-lg-10">
                <input type="text" value="<?php echo $f['direccion'];?>" required class="form-control" id="direccion" name="txtdireccion">
              </div>
         </div>
         <!--********************************************************************************-->
         
       <div class="form-group">
       <label for="inputEmail" class="col-lg-2 control-label">Curso</label>
          &nbsp;&nbsp;&nbsp;
          <select data-placeholder="Seleccione Cursos" style="width:350px;" multiple class="chosen-select" name="curso[]" id="curso">
          <?php 
            $sqlc="select * from curso group by cur_nom";
            $rc=mysql_query($sqlc,$con);

            while ($rowc=mysql_fetch_array($rc)) {
              $ss="";
               foreach ($cur as $k) {
                    if ($k==$rowc['cur_id']) {
                      $ss="selected";
                    }
                }


              echo "<option ".$ss." value='".$rowc['cur_id']."'>".$rowc['cur_nom']."</option>";
            }
           ?>
          </select>
          <script>    
              $('.chosen-select').chosen();
         </script>
        </div>

         <!--**********************************************************************************-->
          <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">Foto</label>
             <div class="col-lg-10">
                 <input type="file" class="form-control" id="foto" name="foto">
              </div>
                <?php 
                    if ($f['foto']!="") {
                      echo "<img class='img-circle' style='margin-left:145px;' width='80px' height='80px' src='fotos/".$f['foto']."' />";

                    }
                 ?>
         </div>
          <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">Grado</label>
             <div class="col-lg-10">
                <select name="grado" id="grado" class="form-control">
                  <option>-- Seleccione Grado --</option>
                  <option <?php if ($f['grado']=='tecnico') {
                          echo "selected";
                        } ?> value="tecnico" >Tecnico</option>
                  <option <?php if ($f['grado']=='bachiller') {
                          echo "selected";
                        } ?> value="bachiller">Bachiller</option>
                  <option <?php if ($f['grado']=='licenciatura') {
                          echo "selected";
                        } ?> value="licenciatura">Licenciatura</option>      
                  <option <?php if ($f['grado']=='maestria') {
                          echo "selected";
                        } ?> value="maestria">Maestria</option>
                  <option <?php if ($f['grado']=='doctorado') {
                          echo "selected";
                        } ?> value="doctorado">Doctorado</option>
                </select>
              </div>
         </div>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Tarifa</label>
            <div class="col-lg-10">
                      <input type="text" value="<?php echo $f['tarifa'];?>" required class="form-control" id="tarifa" name="txttarifa">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Planilla</label>
            <div class="col-lg-10">
                      <label><input type="checkbox" name="contrato" value="1"></label>
            </div>
          </div>
          <div class="form-group">
             <label for="inputEmail" class="col-lg-2 control-label">CV</label>
             <div class="col-lg-10">
                <input type="file"  class="form-control" id="cv" name="cv" />
              </div>
         </div>
         <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <a href="index.php" class="btn btn-default">Cancelar</a>
                      <button type="submit" class="btn btn-primary" ><?php  echo $ac; ?></button>
                    </div>
          </div>
       </div>
          </fieldset>  
    </form>
</div>
</div>

</body>
</html>