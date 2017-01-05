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
	$idci=$_REQUEST['ci'];
	//id curso para selected del curso
	$c=$_POST['c'];
	$sql2="select * from curso where car_id='$idc' and cic_id='$idci'";
	$result=mysql_query($sql2,$con);

 ?>
<input type="hidden" id="xd">
<select class='form-control' name="cu" id="cu">
					<?php while ($pc2=mysql_fetch_array($result)) { 
							$cur=$pc2['cur_id'];
							if ($cur==$c) {
								$sel="Selected";
							}else{$sel="";}
						?>
						<option <?php echo $sel." ".$c; ?> value="<?php echo $pc2['cur_id'];?>"><?php echo $pc2['cur_nom']; ?></option>
						<?php } ?>
</select>	