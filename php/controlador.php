<?php  
include 'funciones.php'; 
session_start();
$method = $_GET['method'];
if(!strcmp($method,"modRuta")){
	$id = $_POST['id'];
	$_SESSION["directorio"] = $_SESSION["directorio"]."/".$id;
	echo "1";
}elseif (!strcmp($method,"return")) {
	$dirAnt = obtenerPadre($_SESSION["directorio"],"");
	if(strcmp($dirAnt,"El directorio no existe")){
		$_SESSION["directorio"] = $dirAnt;
		echo "1";
	}else{
		echo $dirAnt;
	}
}elseif (!strcmp($method,"crearCarpeta")) {
	$nombre = "/".$_POST['nombre'];
	$ruta = $_SESSION["directorio"];
	$metodo = crearDirectorio($ruta, $nombre."/");
	echo $metodo;
}elseif (!strcmp($method,"crearArchivo")) {
	$nombre = "/".$_POST['nombre'];
	$ruta = $_SESSION["directorio"];
	$metodo = crearArchivo($ruta, $nombre);
	echo $metodo;
}
?>