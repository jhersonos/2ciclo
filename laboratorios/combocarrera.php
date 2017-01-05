<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include('../conexion/conexion.php');
$tipo=$_REQUEST['tipo'];
if ($tipo=="profesional") {
  $t=1;
}else{
  $t=2;
}
$idc=$_REQUEST['id'];

  $consulta="select * from carrera where tipo_carre='$t'";
                     $resultado=mysql_query($consulta,$con);
                        
                      echo "<label for='inputEmail' class='col-lg-2 control-label'>Carrera</label><div class='col-lg-10'><select required name='carrera' class='form-control' id='carre' onchange='cload();'>";
                      ?>
                      
                      <option value="">--Seleccione carrera--</option><?php
                      while($fila=mysql_fetch_array($resultado)){
                      		if ($fila['id']==$idc) {
                      			$s='selected';
                      		}else{
                      			$s="";
                      		}
                          echo "<option ".$s." value='".$fila['id']."'>".$fila['nombre']."</option>";

                      }
                      echo "</select></div><br>";
                      ?>