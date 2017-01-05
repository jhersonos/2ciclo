<?php 
	include('../conexion/conexion.php');

	$nombre=$_POST['nombre'];
	$paterno=$_POST['paterno'];
	$materno=$_POST['materno'];
	//
	$pathf="foto/";
	$extf=pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);
	$microtf=round(microtime(true)*1000);
	$foto=$microtf.".".$extf;
	if ($extf!="") {
	if ($extf == "jpg" || $extf == "jpeg" || $extf == "png" || $extf == "bmp") {	
		if(move_uploaded_file($_FILES['foto']['tmp_name'], $pathf.$microtf.".".$extf)) {
			$_foto=" foto='$foto',";
		}else{
			echo "No se cargo el archivo.";
			exit();
		}
	}else{
			echo "Formato invalido";
			exit();
		}
	}
	//
	$fc=$_POST['fecnac'];
	$dep=$_POST['departamento'];
	$provi=$_POST['provincia'];
	$dis=$_POST['distrito'];
	$iddistrito=$dep."-".$provi."-".$dis;
	$dni=$_POST['dni'];
	$dire=$_POST['direccion'];
	$email=$_POST['email'];
	$emergencia=$_POST['emergencia'];
	$apoderado=$_POST['apoderado'];
	//
	$extp=pathinfo($_FILES['parnac']['name'],PATHINFO_EXTENSION);
	$microtp=round(microtime(true)*1000);
	$pathp="partida_nacimiento/";
	$partNac=$microtp.".".$extp;
	if ($extp!="") {
	if ($extp == "jpg" || $extp == "jpeg" || $extp == "png" || $extp == "pdf" || $extp=="doc"||$extp=="docx") {	
		if(move_uploaded_file($_FILES['parnac']['tmp_name'], $pathp.$microtp.".".$extp)) {
			$_foto=" parnac='$parnac',";
		}else{
			echo "No se cargo el archivo.";
			exit();
		}
	}else{
		echo "Formato invalido";
		exit();
	}
}
	//
	$extc=pathinfo($_FILES['certificado']['name'],PATHINFO_EXTENSION);
	$microtc=round(microtime(true)*1000);
	$pathc="certificado/";
	$certi=$microtc.".".$extc;
	if ($extf!="") {
	if ($extc == "jpg" || $extc == "jpeg" || $extc == "png" || $extc == "pdf" || $extc=="doc"||$extc=="docx") {	
		if(move_uploaded_file($_FILES['certificado']['tmp_name'], $pathc.$microtc.".".$extc)) {
			$_foto=" certificado='$certi',";
		}else{
			echo "No se cargo el archivo.";
			exit();
		}
	}else{
		echo "Formato invalido";
		exit();
	}
}
	//
	$cole=$_POST['colegio'];

	if(isset($_POST['check'])){
			$ref=implode(",",$_POST['check']);			
	}
else{
	$ref=0;
}
	$hoy = date("Ymd");
	$estado=1;
	echo $sql="insert into alumno(alu_nom,alu_pat,alu_mat,foto,alu_fecnac,id_distrito,alu_dni,alu_dir,alu_email,alu_cole,alu_emergencia,alu_apo1,alu_parnac,alu_certi,id_ref,fecha,estado) values('$nombre','$paterno','$materno','$foto','$fc','$iddistrito','$dni','$dire','$email','$cole','$emergencia','$apoderado','$partNac','$certi','$ref','$hoy','$estado')";
	$a=mysql_query($sql,$con);
 ?>