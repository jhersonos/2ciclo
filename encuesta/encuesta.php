<?php 
	include ('../conexion/conexion.php');
	
	$pass=$_POST['pass'];
	//validacion de la contraseña
	$vali="select pass from matriz where pass='$pass'";
	$v=mysql_query($vali,$con);
	$v1=mysql_fetch_array($v);
	$contra=$v1['pass'];
	if ($pass==""||$pass!=$contra) {
		echo"<script language='javascript'>window.location='index.html'; alert('Colocar una Contraseña Valida');</script>";
	}
	//obtencion de ids de la fecha carrera y ciclo
		$sql="select * from matriz where pass='$pass'";
		$rz=mysql_query($sql,$con);
		$fz=mysql_fetch_array($rz);
		$tip=$fz['fecha'];
		$carr=$fz['carrera'];
		$ciclo=$fz['ciclo'];
		$secc=$fz['sec'];
		if ($ciclo=="TIT") {
			$cs="TIT";
		}
		else{
		$cs=$ciclo." ".$secc;
		}
		$sql2="select * from profesor_curso where id_carrera='$carr' and id_secc='$cs'";
		//echo "<br> <br> ".$sql2."<br> <br> ";
		$pz=mysql_query($sql2,$con);
		$rr=mysql_fetch_array($pz);

		$idcarr=$rr['id_carrera'];
		$idcur=$rr['id_curso'];
		$se=$rr['id_secc'];

			

		?>
<!DOCTYPE html>
<html>
<head>
	<title>Encuesta</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div id="mj"></div>

	
		
		<?php 
					$sql3="SELECT p.id,p.foto,c.id as idc,k.nombre,p.nombres,p.ape_paterno,c.curso FROM  profesor_curso pc inner join profe p on p.id=pc.id_profesor inner join cursos c on c.id=pc.id_curso inner join carrera k on k.id=pc.id_carrera WHERE  pc.id_carrera ='$idcarr' AND  pc.id_secc = '$se' ";
					//resultados para mostrar datos de profe y curso
					$resultados=mysql_query($sql3,$con);
					$rs2=mysql_query($sql3,$con);
					$rs3=mysql_query($sql3,$con);
					$p=mysql_fetch_array($rs2);

?>
<nav class="navbar navbar-default">
<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">Encuesta de Satisfacción: <?php echo $p['nombre']." - ".$cs; ?></a>
	</div>	
</div>
</nav>
<p class="pp" style="background: white; color: black; padding: 12px; opacity: .8;">
Califica del 1 al 5 según corresponda, donde 1 es muy malo y 5 muy bueno.
</p>
<div class="top30 containers" id="encu">
<?php
					//echo "<h1>carreras: ".$p['carreras_profesionales']."seccion: ".$cs."</h1>";
					$arrid=array();
					$arridc=array();

		?>
	<input type="hidden" name="matriz" id="matriz" value="<?php echo $fz['id']; ?>">
		<table border="1">
		 <tr>
		 <th width="300">-------</th>
		<?php
				while ($x=mysql_fetch_array($resultados))
					{
						$arrid[]=$x['id'];
						$arridc[]=$x['idc'];
					?>
						<th width="200">
							<?php
								//echo "<img class='img-circle' width='80' height='80' src=../docente/fotos/".$x['foto']."/>";
								if ($x['foto']=="") {
								echo "<img class='img-circle'style='margin-top:20px' width='50' height='50' src='../docente/fotos/none.jpg' /><br><br>";
								}else{
									echo "<img class='img-circle' width='80' height='80' src='../docente/fotos/".$x['foto']."'/>";
								}
								echo $x['nombres']." ".$x['ape_paterno']."<br>";
								echo $x['curso'];
							?>	
						</th>
		<?php
					}
		 ?>
		 </tr>
		 <?php 
		 		if ($tip=="1") {
		 			$const="select * from pregunta where tipo='Tipo 1'";
		 		}else{
		 			$const="select * from pregunta where tipo='Tipo 2'";
		 		}
		 		$resp=mysql_query($const,$con);

		 	while ($rt=mysql_fetch_array($resp)) {
		 ?>
		 	<tr>
		 		<td>
		 			<div class="pre"><?php echo $rt['pregunta'] ?></div>
		 		</td>
		 		<?php
		 		$b=mysql_num_rows($rs2);
				for($a=0;$a<$b;$a++)
					{
					?>
						<td>
							<?php
								echo "<center>"."<input class='form-control num' width='30' type='number' min='1' max='5' lang='".$rt['id']."|".$arrid[$a]."|".$arridc[$a]."'></center>";
							?>	
						</td>
		<?php
					}
		 ?>
		 	</tr>
		 <?php		
		 	}

		  ?>
		  </table>
		 <ol class="breadcrumb" style="text-align:center">
				<label>Comentarios Adicionales</label><textarea placeholder="Siéntete libre de dejarnos un comentario, recuerda que esta encuesta es anónima y nadie podrá identificarte." id="coment" class="form-control"></textarea><br>
  		 		 <li><button class="btn-large btn btn-warning" onclick="send();" type="submit">ENVIAR RESULTADOS</button><br><br></li>
		 </ol>
		  

<script type="text/javascript">
	var rsta=[];
		function send()
		{	

			if (validar()!=false) {
				$.post( 'respuesta.php', { 'cmt':$('#coment').val(),'rs': rsta,'m':$('#matriz').val() } )
				.done(function( data ) {
					if(data==1){
	    				//alert( "Guardado exitosamente " + data );
	    				$('#encu, .navbar, .pp').hide();
	    				$('#mj').html('<center><h1>Se guardo exitosamente.<br>Gracias por tu tiempo.</h1><br><a href="index.html" class="btn btn-default">Volver</a></center>').fadeIn(500);
	  				}
				});
			}
		}
	function reg(a){var re= /^[1-5]$/; return re.test(parseInt(a));}	
	function validar(){
		rsta=[];
		var st=true;
		$('input[type=number]').css('background','white');
		$('input[type=number]').each(function() {
			if (!reg($(this).val())) {
				$(this).css('background','pink');
				alert("Completar Todos los Campos");
				st=false;
				return false; 
			}else{
				rsta.push($(this).attr("lang")+"|"+$(this).val());
			}
		});
		return st;
	}
</script>
</div>
</body>
</html>