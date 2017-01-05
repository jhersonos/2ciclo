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
<?php include('../../conexion/conexion.php');
$idprofe=$_POST['profe'];
$idcarre=$_POST['carrera'];
$idcurso=$_POST['curso'];
$sec=$_POST['seccion'];
echo $sec;
$sql="insert into profesor_curso(id_profesor,id_carrera,id_secc,id_curso) values('$idprofe','$idcarre','$sec','$idcurso')";
$resultado=mysql_query($sql,$con);


?>