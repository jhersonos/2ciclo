<?php
	$host="localhost";
	$user="root";
	$pw="123";
	$db="procesos";

	$con=mysql_connect($host,$user,$pw) or die("Hubo un problema al conectar");
	mysql_select_db($db,$con) or die("Hubo un error en la bd");
	
	$cn = mysqli_connect($host, $user, $pw, $db);
	
	mysql_query("set names 'utf8'");
	ini_set('display_errors','On');
	date_default_timezone_set("America/Lima");

	/*
	$host="libertador2013.ipowermysql.com";
	$user="libertador15";
	$pw="osxdeveloper";
	$db="procesos";

	$con=mysql_connect($host,$user,$pw) or die("Hubo un problema al conectar");
	mysql_select_db($db,$con) or die("Hubo un error en la bd");
	
	$cn = mysqli_connect($host, $user, $pw, $db);
	
	mysql_query("set names 'utf8'");
	ini_set('display_errors','On');
	date_default_timezone_set("America/Lima");


	*/
?>