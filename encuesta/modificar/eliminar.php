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
$id=$_POST['idpc'];
if ($id!="") {
	$sql="delete from profesor_curso where id='$id'";
	$resultado=mysql_query($sql,$con);
	echo "1";
}else{
	echo "0";
}



?>