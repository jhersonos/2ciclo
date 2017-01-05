<?php include('../conexion/conexion.php'); 
	$ca=$_REQUEST['ca'];
	$ci=$_REQUEST['ci'];
	$cu=$_REQUEST['cu'];
	$p=$_REQUEST['p'];
	if ($ca!="" && $ci!="" && $cu!="" && $p!="") {
		//$sql="select * from c_laboral where docente='$p' and carrera='$ca' and ciclo='$ci' and curso='$cu'";	
		 $sql="select c.cur_id,l.id,d.nombres,d.ape_paterno,k.nombre,c.cic_id,c.cur_nom,l.f_inicio,l.f_final,l.horas from c_laboral l inner join profe d on d.id=l.docente inner join carrera k on k.id=l.carrera inner join curso c on c.cur_id=l.curso where l.docente='$p' and l.carrera='$ca' and l.curso='$cu'";
	}elseif ($p!="" && $ci=="" && $cu=="" && $ca!="") {
		 $sql="select c.cur_id,l.id,d.nombres,d.ape_paterno,k.nombre,c.cic_id,c.cur_nom,l.f_inicio,l.f_final,l.horas from c_laboral l inner join profe d on d.id=l.docente inner join carrera k on k.id=l.carrera inner join curso c on c.cur_id=l.curso where l.docente='$p' and l.carrera='$ca'";
		//echo $ca." ".$ci." ".$cu;
	}elseif ($p!="" && $ca!="" && $ci!="" && $cu=="") {
		 $sql="select c.cur_id,l.id,d.nombres,d.ape_paterno,k.nombre,c.cic_id,c.cur_nom,l.f_inicio,l.f_final,l.horas from c_laboral l inner join profe d on d.id=l.docente inner join carrera k on k.id=l.carrera inner join curso c on c.cur_id=l.curso where l.docente='$p'and l.carrera='$ca' and l.ciclo='$ci'";
	}elseif ($ca!="" && $p=="" && $ci=="" && $cu=="") {
		 $sql="select c.cur_id,l.id,d.nombres,d.ape_paterno,k.nombre,c.cic_id,c.cur_nom,l.f_inicio,l.f_final,l.horas from c_laboral l inner join profe d on d.id=l.docente inner join carrera k on k.id=l.carrera inner join curso c on c.cur_id=l.curso where l.carrera='$ca'";
	}elseif ($ca!="" && $ci!="" && $cu=="" && $p=="") {
		 $sql="select c.cur_id,l.id,d.nombres,d.ape_paterno,k.nombre,c.cic_id,c.cur_nom,l.f_inicio,l.f_final,l.horas from c_laboral l inner join profe d on d.id=l.docente inner join carrera k on k.id=l.carrera inner join curso c on c.cur_id=l.curso where l.carrera='$ca' and l.ciclo='$ci'";
	}elseif ($p!="" && $ci!="" && $cu=="" && $ca==""){
		 $sql="select c.cur_id,l.id,d.nombres,d.ape_paterno,k.nombre,c.cic_id,c.cur_nom,l.f_inicio,l.f_final,l.horas from c_laboral l inner join profe d on d.id=l.docente inner join carrera k on k.id=l.carrera inner join curso c on c.cur_id=l.curso where l.docente='$p' and l.ciclo='$ci'";
	}else{
		 $sql="select c.cur_id,l.id,d.nombres,d.ape_paterno,k.nombre,c.cic_id,c.cur_nom,l.f_inicio,l.f_final,l.horas from c_laboral l inner join profe d on d.id=l.docente inner join carrera k on k.id=l.carrera inner join curso c on c.cur_id=l.curso";	
	}
?>


	<h2>Cargas Laborales</h2>
	<table border = '1' class='table table-bordered'>
		<tr><th>Docente</th><th>Carrera</th><th>Ciclo</th><th>Curso</th><th>Fecha inicio</th><th>Fecha Final</th><th>Horas</th><th>--</th></tr>
	<?php 
		
		$result=mysql_query($sql,$con);

		while ($r=mysql_fetch_array($result)) {?>
		
		<tr><td><?php echo $r['nombres']." ".$r['ape_paterno']; ?></td><td><?php echo $r['nombre']; ?></td><td><?php echo $r['cic_id']; ?></td><td><?php echo $r['cur_nom']; ?></td><td><?php echo $r['f_inicio']; ?></td><td><?php echo $r['f_final']; ?></td><td><?php echo $r['horas']; ?></td><td align="center"><a class='btn btn-default' onclick="actlaboral(<?php echo $r['id'] ?>,<?php echo $r['cur_id']; ?>);" href='#'>Editar</a></td></tr>

	<?php 
		}
	?>
	</table>
