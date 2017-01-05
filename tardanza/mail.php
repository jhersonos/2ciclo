<?php 
	include('../conexion/conexion.php');
	require 'PHPMailerAutoload.php';
 
	$id=$_REQUEST['id'];
	$tip=$_REQUEST['tipo'];
	$obs=$_REQUEST['obs'];
	if ($tip=='1') {
		$tipo='Tardanza';
	}if ($tip=='2') {
		$tipo='Falta';
	}if ($tip=='3') {
		$tipo='No toma asistencia';
	}if ($tip=='4') {
		$tipo='No registra notas a la fecha';
	}if ($tip=='5') {
		$tipo='Solicitud de Copias fuera de tiempo';
	}if ($tip=='6') {
		$tipo='No registra avance pragmatico';
	}
	$sql="select * from profe where id='$id'";
	$resul=mysql_query($sql,$con);
	$arr=mysql_fetch_array($resul);
	$correo=$arr['correo'];
	$nombre=$arr['nombres']." ".$arr['ape_paterno'];

//Crear una instancia de PHPMailer
$mail = new PHPMailer();
//Definir que vamos a usar SMTP
$mail->IsSMTP();
//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
// 0 = off (producción)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug  = 2;
//Ahora definimos gmail como servidor que aloja nuestro SMTP
$mail->Host       = 'smtp.gmail.com';
//El puerto será el 587 ya que usamos encriptación TLS
$mail->Port       = 587;
//Definmos la seguridad como TLS
$mail->SMTPSecure = 'tls';
//Tenemos que usar gmail autenticados, así que esto a TRUE
$mail->SMTPAuth   = true;
//Definimos la cuenta que vamos a usar. Dirección completa de la misma
$mail->Username   = "jherson.jose.os@gmail.com";
//Introducimos nuestra contraseña de gmail
$mail->Password   = "kkan123456";
//Definimos el remitente (dirección y, opcionalmente, nombre)
$mail->SetFrom('jherson.jose.os@gmail.com', 'Jherson');
//Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
$mail->AddReplyTo('jherson.jose.os@gmail.com','El de la réplica');
//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
$mail->AddAddress($correo, 'El Destinatario');
//Definimos el tema del email
$mail->Subject = 'Asunto:'.$tipo;
//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
//$mail->MsgHTML('Estimado'.' '.$nombre);
$mail->MsgHTML('<table border="0" width="100%"><tr><td width="80%">Estimado Profesor:'.$nombre.'</td><td width="20%" align="center"><img src="../img/logocv.png" alt="No found"></td></tr><tr><td colspan="2">Asunto: '.$tipo.'</td></tr><tr><td colspan="2">'.$obs.'</td></tr><tr><td colspan="2"><b>Secretaria Academica</b></td></tr></table>');
//file_get_contents('index.php'), dirname('index.php')
//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
$mail->AltBody = 'This is a plain-text message body';
//Enviamos el correo
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} else {
  echo "<span style='color:red;'>Enviado!</span>";
}
?>