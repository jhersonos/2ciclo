<?php 
include('../session.php');
include('../conexion/conexion.php'); 

$id = $_REQUEST['id'];
if (isset($id)){       
	$sql = "SELECT * FROM reserva r inner join carrera c on c.id=r.id_carrera  WHERE r.id = '$id'"; 
	$result = mysql_query($sql,$con);
	$f = mysql_fetch_array($result);
}

?>

<div style="margin-left:25%" class="col-lg-6">
            <div class="well bs-component">
              <form class="form-horizontal" id="freserva" onsubmit="return save();">
                <fieldset>
                  <legend>Reserva de Laboratorio / Aula</legend>
                  <!--carrera combobox-->
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Grupo</label>
                    <div class="col-lg-10">
                      <select required onchange="mostrarc(this.value,0)" class='form-control'>
                        <option value="">-- Seleccione carrera --</option>
                        <option <?php if ($f['tipo_carre']=='Profesional') {
                          echo "selected";
                        } ?> value="Profesional">Profesional</option>
                        <option <?php if ($f['tipo_carre']=='Extension') {
                          echo "selected";
                        } ?> value="Extension">Extension</option>
                      </select>
                    </div>
                  </div>
                  <div id="carrera" class="form-group">
                    <?php if($f['tipo_carre']!="") {
                      ?>
                        <script type="text/javascript">mostrarc("<?php echo $f['tipo_carre']; ?>","<?php echo $f['id_carrera']; ?>")</script>
                      <?php

                      }
                     ?>
                  </div>
                 <script>$(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); </script>
                  <div class="form-group">
                      <label for="inputPassword" class="col-lg-2 control-label">Profesor</label>
                      <div class="col-lg-10">
                          <?php 
                            $sp="select * from profe";
                            $resp=mysql_query($sp,$con);          
                           ?>
                           <select name="txtprofesor" id="inputPassword" data-placeholder="Profesor" class="chosen-select form-control">
                           <!--<select name="txtprofesor" id="inputPassword" class="form-control">-->
                            <option value="">-- Seleccione profesor --</option>                             
                             <?php 
                                while ($rp=mysql_fetch_array($resp)) {
                                  $nombre=$rp['nombres']." ".$rp['ape_paterno'];
                                  $s="";
                                  if ($f['profe']==$nombre) {
                                    $s="selected";
                                  }
                              ?>
                                  <option <?php echo $s; ?> value="<?php echo $rp['id']?>"><?php echo $nombre ?></option>
                               <?php 
                             }
                              ?>
                           </select>
                      </div>
                  </div>
               
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Ciclo</label>
                    <div class="col-md-4" id="cic">
                      <select name="ciclo" id="ciclo" class="form-control">
                        <option value="">-- Seleccione Ciclo --</option>
                      </select>                      
                   </div>
                    <label class="col-lg-2 control-label">Seccion</label>   
                    <div class="col-md-4">              
                      <input type="text" style="text-transform:uppercase;" required value="<?php echo $f['seccion'];?>" class="form-control" id="inputEmail" placeholder="seccion" name="seccion">
                       </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Curso</label>
                    <div class="col-lg-10" id="cur">
                      <select name="txtcurso" id="curso" class="form-control">
                        <option value="">-- Seleccione curso --</option>
                      </select>
                    </div>

                   </div>	
               
                  <!--turno-->
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Turno</label>
                    <div class="col-lg-10">
                      <select name="turno" required class="form-control" id="select" onchange="horas(this.value);">
                        <option value="">-- Seleccione Turno --</option>
                        <option <?php if ($f['turno']==1) {
                          echo "selected";
                        } ?> value="1">Mañana</option>
                        <option <?php if ($f['turno']==2) {
                          echo "selected";
                        } ?> value="2">Tarde</option>
                        <option <?php if ($f['turno']==3) {
                          echo "selected";
                        } ?> value="3">Noche</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Reservar</label>
                    <div class="col-lg-10">
                      <div class="col-md-6"><input type="radio" name="radio" value="1" onclick="tipo();">Laboratorio</div>
                      <div class="col-md-6"><input type="radio" name="radio" value="2" onclick="tipo1();">Aula</div>
                    </div>
                  </div>
                  <!---->
          <div class="form-group" id="aula">
          
          </div>

          <!---->
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Dia</label>
                    <div class="col-lg-10">
                      <select required name="dia" class='form-control'>
                        <option value="">-- Seleccione Dia --</option>
                        <option <?php if ($f['dia']==1) {
                          echo "selected";
                        } ?> value="1">Lunes</option>
                        <option <?php if ($f['dia']==2) {
                          echo "selected";
                        } ?> value="2">Martes</option>
                        <option <?php if ($f['dia']==3) {
                          echo "selected";
                        } ?> value="3">Miercoles</option>
                        <option <?php if ($f['dia']==4) {
                          echo "selected";
                        } ?> value="4">Jueves</option>
                        <option <?php if ($f['dia']==5) {
                          echo "selected";
                        } ?> value="5">Viernes</option>
                        <option <?php if ($f['dia']==6) {
                          echo "selected";
                        } ?> value="6">Sabado</option>
                        <option <?php if ($f['dia']==7) {
                          echo "selected";
                        } ?> value="7">Domingo</option>
                      </select>
                    </div>
                  </div>
                  <!---->
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Fecha</label>
                    <div class="col-lg-10">
                        <div class="col-md-5">
                         Inicio<input type="date" class="form-control" style="height: 38px;" name="fechaini" id="fechaini" value="<?php echo $f['f_ini']; ?>">
                        </div> 
                         <div class="col-md-5">Fin
                         <input type="date" class="form-control" style="height: 38px;" required name="fechafin" id="fechafin" value="<?php echo $f['f_fin']; ?>"> </br>  </br>
                         </div>     
                    </div>
                    </div> 
                    <div class="form-group">                   
                    <label class="col-lg-2 control-label">Hora</label>
                    <div class="col-lg-10" id="tiempo">
                          Inicio&nbsp;
                            <select name="horaini" id="hini" class="form-control" required>
                              <option>-- Seleccionar --</option>
                            </select>   
                          Fin&nbsp; &nbsp;
                            <select name="horafin" id="hfin" class="form-control" required>
                              <option>-- Seleccionar --</option>
                            </select> 
                            <?php if ($f['turno']!="") {
                              ?>
                              <script type="text/javascript">horas("<?php echo $f['turno']; ?>")</script>
                              <?php
                            } 
                            ?>                                  
                    </div>
                   </div>
                   <br>

                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <a class="btn btn-default" href="home.php">Volver</a>
                      <button type="submit" class="btn btn-primary" >Reservar</button>
                    </div>
                  </div>
                </fieldset>
              </form>
            <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
          </div>
