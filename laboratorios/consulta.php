<?php 
session_start();
include('../conexion/conexion.php'); 
$u=$_SESSION["usuario"];
$c=$_SESSION["clave"];
if ($u!=""&& $c!="") {
  
}else
{
?>
<script type="text/javascript">
  window.location.href = "index.php";
  </script>
<?php
}
$dia=$_REQUEST['dia'];
$turno=$_REQUEST['turno'];
$carrera=$_REQUEST['carrera'];

if ($dia != "" && $turno != "" && $carrera != "") {
 $sql="SELECT r.lab,r.dia,r.f_ini,r.f_fin,r.h_ini,r.h_fin,c.nombre,k.cur_nom,p.nombres,p.ape_paterno,r.profe,r.turno,r.ciclo,r.seccion,r.id from reserva r INNER JOIN carrera c on c.id=r.id_carrera inner join curso k on k.cur_id=r.curso inner join profe p on p.id=r.profe where r.id_carrera='$carrera' and r.dia='$dia' and r.turno='$turno'";
}elseif ($dia != "" && $turno == "" && $carrera == "") {
 $sql="SELECT r.lab,r.dia,r.f_ini,r.f_fin,r.h_ini,r.h_fin,c.nombre,k.cur_nom,p.nombres,p.ape_paterno,r.profe,r.turno,r.ciclo,r.seccion,r.id from reserva r INNER JOIN carrera c on c.id=r.id_carrera inner join curso k on k.cur_id=r.curso inner join profe p on p.id=r.profe where r.dia='$dia'";
}elseif ($dia == "" && $turno != "" && $carrera == "") {
 $sql="SELECT r.lab,r.dia,r.f_ini,r.f_fin,r.h_ini,r.h_fin,c.nombre,k.cur_nom,p.nombres,p.ape_paterno,r.profe,r.turno,r.ciclo,r.seccion,r.id from reserva r INNER JOIN carrera c on c.id=r.id_carrera inner join curso k on k.cur_id=r.curso inner join profe p on p.id=r.profe where r.turno='$turno'";
}elseif ($dia == "" && $turno == "" && $carrera != "") {
 $sql="SELECT r.lab,r.dia,r.f_ini,r.f_fin,r.h_ini,r.h_fin,c.nombre,k.cur_nom,p.nombres,p.ape_paterno,r.profe,r.turno,r.ciclo,r.seccion,r.id from reserva r INNER JOIN carrera c on c.id=r.id_carrera inner join curso k on k.cur_id=r.curso inner join profe p on p.id=r.profe where r.id_carrera='$carrera'";
}else{
 $sql="SELECT r.lab,r.dia,r.f_ini,r.f_fin,r.h_ini,r.h_fin,c.nombre,k.cur_nom,p.nombres,p.ape_paterno,r.profe,r.turno,r.ciclo,r.seccion,r.id from reserva r INNER JOIN carrera c on c.id=r.id_carrera inner join curso k on k.cur_id=r.curso inner join profe p on p.id=r.profe where r.id_carrera='$carrera' and r.dia='$dia' and r.turno='$turno'";
}
$r=mysql_query($sql,$con);


?>


            <div class="jumbotron" id="consulta1" style="Border-radius:10px;opacity:0.9;border:0px"></div>
             <?php 
              echo "<table border = '1' class='table table-bordered'> \n"; 
              echo "<th>Aula</th><th>Día</th><th>Inicio</th><th>Fin</th><th>H Inicio</th><th>H Término</th><th>Carrera</th><th>Curso</th><th>Profesor</th><th>Turno</th><th>Seccion</th> \n"; 
              while ($row = mysql_fetch_array($r)){ 
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