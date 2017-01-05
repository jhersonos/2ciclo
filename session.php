<?php
session_start();
$u=$_SESSION["usuario"];
$c=$_SESSION["clave"];
if ($u!=""&& $c!="") {
}else{
	header("Location: index.php");
	die();
}
?>