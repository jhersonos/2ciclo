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
$id=$_POST['id'];
$idprofesor=$_POST['p'];
$idcarrera=$_POST['c'];
$idcurso=$_POST['cu'];
$seccion=$_POST['ci'];
$sql="update profesor_curso set id_profesor='$idprofesor',id_carrera='$idcarrera',id_secc='$seccion',id_curso='$idcurso' where id='$id' ";
$resultado=mysql_query($sql,$con);
echo $sql;

?>