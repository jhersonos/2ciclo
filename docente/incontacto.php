<?php include('../conexion/conexion.php'); 
	
$id=$_REQUEST['id'];

$nombre=$_POST['txtnombre'];
$paterno=$_POST['txtapellidopa'];
$materno=$_POST['txtapellidoma'];
$dni=$_POST['txtdni'];
$genero=$_POST['genero'];
$nacimiento=$_POST['fechanac'];
$telefono=$_POST['txttelefono'];
$celular=$_POST['txtcelular'];
$correo=$_POST['txtcorreo'];
$direc=$_POST['txtdireccion'];
$cont=$_POST['contrato'];
//$curso=$_POST['curso'];
	$curso=implode(",",$_POST['curso']);			
$tarifa=$_POST['txttarifa'];

$extf=pathinfo($_FILES['foto']['name'],PATHINFO_EXTENSION);
$extc=pathinfo($_FILES['cv']['name'],PATHINFO_EXTENSION);
$grado=$_POST['grado'];
$microtf=round(microtime(true)*1000);
$microtc=round(microtime(true)*1000);
$pathf="fotos/";
$pathc="cv/";
$foto=$microtf.".".$extf;
$cv=$microtc.".".$extc;

$hoy = date("Ymd");
$estado=1;

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
	
	
if ($extc!="") {
	if ($extc=="doc"||$extc=="docx"||$extc=="ppt" || $extc=="pdf" || $extc=="pptx") {
		if(move_uploaded_file($_FILES['cv']['tmp_name'], $pathc.$microtc.".".$extc)) {
			$_cv=" cv='$cv',";
		}else{
			echo "No se cargo el archivo.";
			exit();
		}
	}else{
		echo "Formato invalido";
		exit();
	}
}

if ($id != "") {
	$update="update profe set nombres='$nombre', ape_paterno='$paterno', ape_materno='$materno', genero='$genero',fec_nac='$nacimiento', dni='$dni',telefono='$telefono', celular='$celular',direccion='$direc',correo='$correo',curso='$curso',grado='$grado',tarifa='$tarifa',contrato='$cont',".$_foto.$_cv."fecha='$hoy',estado='$estado' where id='$id'";
	$resu=mysql_query($update,$con);
	echo "Se Actualizo Correctamente.";
}else{
	$c="select dni from profe where dni=$dni";
	$r=mysql_query($c,$con);
	$fx=mysql_num_rows($r);
		if ($fx==1){
			echo "Usted ya esta registrado, Por favor Actualize sus datos";
		}else{
		echo $consulta="insert into profe(nombres,ape_paterno,ape_materno,genero,fec_nac,dni,telefono,celular,direccion,correo,curso,grado,foto,cv,tarifa,contrato,fecha,estado) 
	values('$nombre','$paterno','$materno','$genero','$nacimiento','$dni','$telefono','$celular','$direc','$correo','$curso','$grado','$foto','$cv','$tarifa','$cont','$hoy','$estado')";
		$resu=mysql_query($consulta,$con);
		echo "Se Registro Correctamente.";

		}
}
	

	


?>