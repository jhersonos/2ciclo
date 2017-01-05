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
	$idci=$_REQUEST['ci'];
	$sql2="select * from curso where car_id='$idc' and cic_id='$idci'";
	$result=mysql_query($sql2,$con);

 ?>
<select class='form-control' name="curso" id="curso">
					<?php while ($pc2=mysql_fetch_array($result)) { ?>
						<option value="<?php echo $pc2['cur_id'];?>"><?php echo $pc2['cur_nom']; ?></option>
						<?php } ?>
</select><br>	