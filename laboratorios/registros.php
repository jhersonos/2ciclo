<?php 
session_start();
include('../session.php');
include('../conexion/conexion.php'); 
$q="select * from carrera where tipo_carre=1";
$r=mysql_query($q,$con);
?>


<div class="col-lg-12 jumbotron" style="border:0px;">
             <div class="row">
             	<div class="col-md-2"><h2 style="margin-top:4px">Reservas</h2></div>
                <div class="col-md-2">
                	<select class="form-control" name="dia" id="dia">
                      <option value="">--Seleccione dia --</option> 
                      <option value="1">Lunes</option>
                      <option value="2">Martes</option>
                      <option value="3">Miercoles</option>
                      <option value="4">Jueves</option>
                      <option value="5">Viernes</option>
                      <option value="6">Sábado</option>
                     </select>
                </div>
                <div class="col-md-2">
                	<select class="form-control" name="carrera" id="carrera">
                       <option value="">--Seleccione Carrera</option>             
                       <?php 
                            while ($row=mysql_fetch_array($r)) {
                              echo "<option value=$row[0]>$row[2]</option>";
                            }
                        ?>
                     </select>
                </div>
                <div class="col-md-2">
                	<select class="form-control" name="turno" id="turno">
                       <option value="">-- Turno --</option>
                       <option value="1">Mañana</option>
                       <option value="2">Tarde</option>
                       <option value="3">Noche</option>
                     </select>
                </div>
                <div class="col-md-2">
                	<button name="buscar" class="btn btn-default" onclick="filtrar();">Buscar</button>
                </div>
                <div class="col-md-2 col-offset-md-1">
                	<button class="btn btn-default" onclick="labora();" style="float:right">Ver Horario</button>
                </div>
             </div>
             
            
             
             
<div style="margin-top:20px" id="consulta">
<?php 
  $sql="SELECT r.lab,r.dia,r.f_ini,r.f_fin,r.h_ini,r.h_fin,c.nombre,k.cur_nom,p.nombres,p.ape_paterno,r.profe,r.turno,r.ciclo,r.seccion,r.id from reserva r INNER JOIN carrera c on c.id=r.id_carrera inner join curso k on k.cur_id=r.curso inner join profe p on p.id=r.profe";
  $result = mysql_query($sql,$con); 
    echo "<table border = '1' class='table table-bordered'> \n"; 
    echo "<th>Aula</th><th>Día</th><th>Inicio</th><th>Fin</th><th>H Inicio</th><th>H Término</th><th>Carrera</th><th>Curso</th><th>Profesor</th><th>Turno</th><th>Seccion</th> \n"; 
    while ($row = mysql_fetch_array($result)){ 
            if ($row['dia']==1) {
              $dia="Lunes";
            }elseif ($row['dia']==2) {
              $dia="Martes";
            }elseif ($row['dia']==3) {
              $dia="Miercoles";
            }elseif ($row['dia']==4) {
              $dia="Jueves";
            }elseif ($row['dia']==5) {
              $dia="Viernes";
            }else{$dia="Sabado";}

            if ($row['turno']==1) {
              $tur="Mañana";
            }elseif ($row['turno']==2) {
              $tur="Tarde";
            }else{$tur="Noche";}
?>

      <tr><td><?php echo $row['lab']; ?></td><td><?php echo $dia; ?></td><td><?php echo $row['f_ini'];?></td><td><?php echo $row['f_fin'];?></td><td><?php echo $row['h_ini'];?></td><td><?php echo $row['h_fin'];?></td><td><?php echo $row['nombre'];?></td><td><?php echo $row['cur_nom'];?></td><td><?php echo $row['nombres']." ".$row['ape_paterno'];?></td><td><?php echo $tur;?></td><td><?php echo $row['ciclo']." ".$row['seccion'];?></td><td><a class='btn btn-default' onclick="actreserva(<?php echo $row['id']; ?>);" href='#'>Eliminar</a></td></tr> 
<?php      
    } 
      echo "</table> \n";

 ?>
              </div>
  <div class="col-lg-12 jumbotron" style="border:0px;" id="consulta1">
     <script type="text/javascript">$("#consulta1").hide();</script>
  </div>