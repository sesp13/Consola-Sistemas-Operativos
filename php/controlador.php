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
	$nombre =$_POST['nombre'];
	$ruta = $_SESSION["directorio"];
	$metodo = crearDirectorio($ruta, '/'.$nombre, 0777);
	echo $metodo;
}elseif (!strcmp($method,"crearArchivo")) {
	$nombre = "/".$_POST['nombre'];
	$ruta = $_SESSION["directorio"];
	$metodo = crearArchivo($ruta, $nombre);
	echo $metodo;
}elseif(!strcmp($method,"cambiarNombreCarpeta")){
	$nombreViejo = $_POST['nombreViejo'];
	$nombreNuevo = $_POST['nombreNuevo'];
	$ruta = $_SESSION["directorio"];
	$metodo = renombrarDirectorio($ruta.'/', $nombreViejo, $nombreNuevo);
	echo $metodo;
	
}elseif (!strcmp($method,"eliminarCarpeta")) {
	$nombre = "/".$_POST['carpeta'];
	$ruta = $_SESSION["directorio"];
	$metodo = eliminarDirectorio($ruta, $nombre);
	echo $metodo;
}elseif (!strcmp($method,"eliminarArchivo")) {
	$nombre = "/".$_POST['archivo'];
	$ruta = $_SESSION["directorio"];
	$metodo = eliminarArchivo($ruta, $nombre);
	echo $metodo;
}elseif (!strcmp($method,"cambiarNombreArchivo")) {
	$nombreViejo = $_POST['nombreViejo'];
	$nombreNuevo = $_POST['nombreNuevo'];
	$ruta = $_SESSION["directorio"];
	$metodo = renombrarArchivo($ruta.'/', $nombreViejo, $nombreNuevo);
	echo $metodo;
}elseif (!strcmp($method,"copiarArchivo")) {
	$ruta = $_SESSION["directorio"];
	$nombre = "/".$_POST['archivo'];
	$_SESSION["rutaCopiada"] = $ruta;
	$_SESSION["nombreElentoCopiado"] = $nombre;
	$_SESSION["CP"] = 'copiarArchivo';
	echo $_SESSION["rutaCopiada"].$_SESSION["nombreElentoCopiado"];
}elseif (!strcmp($method,"pegar")) {
	$rutaNueva = $_SESSION["directorio"];
	$rutaVieja = $_SESSION["rutaCopiada"];
	$archivo = $_SESSION["nombreElentoCopiado"];
	$accion = $_SESSION["CP"];
	if(!strcmp($accion,"copiarArchivo")){
		$metodo = copiarPegarArchivo($rutaVieja, $rutaNueva, $archivo);
	}elseif (!strcmp($accion,"cortar")) {
		$metodo = moverFichero($rutaVieja, $rutaNueva, $archivo);
	}elseif (!strcmp($accion,"copiarCarpeta")) {
		$metodo = copiarPegarDirectorio($rutaVieja, $rutaNueva, $archivo);
	}else{
		$metodo = "Error";
	}
	$_SESSION["rutaCopiada"] = "";
	$_SESSION["nombreElentoCopiado"] = "";
	$_SESSION["CP"] = "";
	echo $metodo;
}elseif (!strcmp($method,"cortar")) {
	$ruta = $_SESSION["directorio"];
	$nombre = "/".$_POST['archivo'];
	$_SESSION["rutaCopiada"] = $ruta;
	$_SESSION["nombreElentoCopiado"] = $nombre;
	$_SESSION["CP"] = 'cortar';
	echo $_SESSION["rutaCopiada"].$_SESSION["nombreElentoCopiado"];
}elseif (!strcmp($method,"verInfoPermisos")) {
	$ruta = $_SESSION["directorio"];
	$nombre = "/".$_POST['elemento'];
	$_SESSION["rutaCambiarPermisos"] = $ruta;
	$_SESSION["nombreCambiarPermisos"] = $nombre;
	$metodo = verInformacionDePermisos($ruta, $nombre);
	echo $metodo;
}elseif (!strcmp($method,"copiarCarpeta")) {
	$ruta = $_SESSION["directorio"];
	$nombre = "/".$_POST['carpeta'];
	$_SESSION["rutaCopiada"] = $ruta;
	$_SESSION["nombreElentoCopiado"] = $nombre;
	$_SESSION["CP"] = 'copiarCarpeta';
	echo $_SESSION["rutaCopiada"].$_SESSION["nombreElentoCopiado"];
}elseif (!strcmp($method,"cambiarPermisos")) {
	$ruta = $_SESSION["rutaCambiarPermisos"];
	$nombre = $_SESSION["nombreCambiarPermisos"];
	$_SESSION["rutaCambiarPermisos"] = "";
	$_SESSION["nombreCambiarPermisos"] = "";
	$permisos = intval("0".$_POST['permisos']);
	$metodo = cambiarPermisos($ruta, $nombre, $permisos);
	echo $metodo;
}elseif (!strcmp($method,"cambiarUsuario")) {
	$ruta = $_SESSION["directorio"];
	$nombre = "/".$_POST['elemento'];
	$usuario = $_POST['usuario'];
	$metodo = cambiarPropietario($ruta, $nombre, $usuario);
	$usuarioFinal = verPropietarioFichero($ruta, $nombre);
	echo $usuarioFinal;
}
?>