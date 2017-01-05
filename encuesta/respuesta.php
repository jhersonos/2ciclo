<?php include('../conexion/conexion.php'); 

$mat=$_POST['m'];
$arr_=$_POST['rs'];
$cmt =$_POST['cmt'];

if($mat !="" && $arr_ !=0 && $cmt !=""){

for ($i=0; $i < count($arr_); $i++) { 
	$ro=explode("|",$arr_[$i]);
	$cons="insert into respuesta(id_matriz,id_profesor,id_pregunta,id_curso,valor,cmt) values('$mat','$ro[1]','$ro[0]','$ro[2]','$ro[3]', '$cmt')";
	$respt=mysql_query($cons);
}
echo 1;
}else{
echo "e";
}

?>