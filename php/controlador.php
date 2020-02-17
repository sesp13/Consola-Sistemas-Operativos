<?php  
include 'funciones.php'; 
session_start();
$method = $_GET['method'];
if(!strcmp($method,"modRuta")){
	$id = $_POST['id'];
	$_SESSION["directorio"] = $_SESSION["directorio"]."/".$id;
	echo $id;
}elseif (!strcmp($method,"return")) {
	$dirAnt = obtenerPadre($_SESSION["directorio"],"");
	if(strcmp($dirAnt,"El directorio no existe")){
		$_SESSION["directorio"] = $dirAnt;
		echo "1";
	}else{
		echo $dirAnt;
	}
}
?>