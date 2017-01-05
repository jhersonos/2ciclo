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
<?php 
	include('../../conexion/conexion.php');
	$idc=$_REQUEST['carre'];
	$sql2="select * from matriz where carrera='$idc'";
	$result2=mysql_query($sql2,$con);

 ?>
 <select name="secc" id="secc" class="form-control custom" style="margin-left:5px;top:5px;">
						<?php 
							while ($r2=mysql_fetch_array($result2)) {
								if ($r2['ciclo']=="TIT") {
									$sec="TIT";
								}
								else{
									$sec=$r2['ciclo']." ".$r2['sec'];
								}
								echo "<option value='$sec'>".$r2['ciclo']." ".$r2['sec']."</option>";
							}
						 ?>
</select>