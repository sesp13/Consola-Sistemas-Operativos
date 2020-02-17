<?php

//Obtener directorio actual
function obtenerDirectorioActual(){
	return getcwd();
}

//Creación de archivos y directorios
function crearArchivo($ruta,$nombre){
  $rutaCompleta = $ruta.$nombre;
  if(!is_file($rutaCompleta)){
    $archivo = fopen($rutaCompleta, 'a');
    return 'El archivo ha sido creado';
    fclose($archivo);
  }
  else{
    return 'El archivo ya existe';
  }
}

function crearDirectorio($ruta, $nombre, $permisos){
  $rutaCompleta = $ruta.$nombre;
  if(!is_dir($rutaCompleta)){
    mkdir($rutaCompleta, $permisos);
		return 'Directorio creado';
	}
	else{
    return 'El directorio ya existe';
	}
}

//Eliminación de archivos y directorios
function eliminarArchivo($ruta,$nombre){
  $rutaCompleta = $ruta.$nombre;
  if(is_file($rutaCompleta)){
    unlink($rutaCompleta);
    return 'El archivo ha sido eliminado';
  }
  else{
    return 'El archivo que quieres eliminar no existe';
  }
}
