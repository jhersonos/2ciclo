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
	$idc=$_REQUEST['ic'];
	$ns=$_REQUEST['ns'];
	$sql2="select * from matriz where carrera='$idc'";
	$result2=mysql_query($sql2,$con);

 ?>
 <select name="ci" id="ci" class="form-control" onchange="loadcurso();">

						<?php 
							while ($r2=mysql_fetch_array($result2)) {

										$sec=$r2['ciclo'];
									
									if ($ns==$sec) {
										$sel="Selected";
									}else{$sel="";}
								echo "<option ".$sel." value='$sec'>".$sec." ".$r2['sec']."</option>";
							}
						 ?>
</select>