<?php
//Nota para pajoy: Siempre que vaya a invocar un directorio poner / al final
//Ejemplo si el directorio es carpeta, la ruta es ./carpeta/ 
error_reporting(E_ERROR | E_PARSE);
//Obtener directorio actual
function obtenerDirectorioActual()
{
  return getcwd();
}

//Obtener directorio padre
function obtenerPadre($ruta, $nombre)
{
  $rutaCompleta = $ruta . $nombre;
  if (is_dir($rutaCompleta)) {
    return dirname($rutaCompleta);
  } else {
    return 'El directorio no existe';
  }
}

//Obtener el contenido de un directorio
function verContenidoDirectorio($ruta, $nombre)
{
  $rutaCompleta = $ruta . $nombre;
  return scandir($rutaCompleta);
}

//Creación de archivos y directorios


function crearArchivo($ruta, $nombre)
{
  $rutaCompleta = $ruta . $nombre;
  if (!is_file($rutaCompleta)) {
    try {
      $archivo = fopen($rutaCompleta, 'a');
      fclose($archivo);
      if(!strcmp($archivo,"1")){
        return 'El archivo ha sido creado';
      }else{
        return 'ocurrio un error';
      }
    } catch (Exception $th) {
      return "Error";
    }
  } else {
    return 'El archivo ya existe';
  }
}

//Los permisos se escriben como 0 777 o lo que desees
function crearDirectorio($ruta, $nombre, $permisos)
{
  $rutaCompleta = "/".$ruta . $nombre;
  if (!is_dir($rutaCompleta)) {
    try {
      $a = mkdir($rutaCompleta, $permisos);
      if(!strcmp($a,"1")){
        return 'Se creó la carpeta';
      }else{
        return 'ocurrio un error';
      }
    } catch (Exception $th) {
      return "Error";
    }
  } else {
    return 'El directorio ya existe';
  }
}

//Eliminación de archivos y directorios

//ELiminar directorio
function eliminarDirectorio($ruta,$nombre){
  $rutaCompleta = $ruta.$nombre;
  if(is_dir($rutaCompleta)){
    exec("rm -R $rutaCompleta");
    return 'Directorio eliminado';
  }else{
    return 'EL directorio que quieres eliminar no existe';
  }  
}

//ELiminar archivo
function eliminarArchivo($ruta, $nombre)
{
  $rutaCompleta = $ruta . $nombre;
  if (is_file($rutaCompleta)) {
    unlink($rutaCompleta);
    return 'El archivo ha sido eliminado';
  } else {
    return 'El archivo que quieres eliminar no existe';
  }
}

//Copiar y pegar archivos
//NOTA ESTA FUNCIÓN NO HA SIDO PROBADA EN LINUX AÚN
//Nota si el archivo en la ruta nueva ya existe, es sobreescrito
function copiarPegarArchivo($rutaVieja, $rutaNueva, $nombre)
{
  $rutaCompletaVieja = $rutaVieja . $nombre;
  $rutaCompletaNueva = $rutaNueva . $nombre;

  if (is_file($rutaCompletaVieja)) {
    if (is_dir($rutaNueva)) {
      copy($rutaCompletaVieja, $rutaCompletaNueva);
      return 'Archivo copiado';
    } else {
      return 'El directorio de destino no existe';
    }
  } else {
    return 'El archivo que quieres copiar no existe';
  }
}

//Copia y pega un directorio, ojo con los permisos
function copiarPegarDirectorio($rutaVieja,$rutaNueva,$nombre){
  $rutaCompletaVieja = $rutaVieja.$nombre;
  $rutaCompletaNueva = $rutaNueva.$nombre;
  if(is_dir($rutaCompletaVieja)){
    if(is_dir($rutaNueva)){
      exec("cp -R $rutaCompletaVieja $rutaCompletaNueva");
      return 'Directorio copiado';
    }else{
      return 'El directorio de destino no existe';
    }
  }else{
    return 'EL directorio que quieres copiar no existe';
  }
}

//Renombrar archivos y directorios
function renombrarArchivo($ruta, $nombreViejo, $nombreNuevo)
{
  $rutaCompleta = $ruta . $nombreViejo;
  $rutaNueva = $ruta . $nombreNuevo;

  if (is_file($rutaCompleta)) {
    if(!is_dir($rutaNueva) && !is_file($rutaNueva)){
      rename($rutaCompleta, $rutaNueva);
      return 'El archivo ha sido renombrado';
    }else{
      return 'Ya existe un elemento con el nombre que intentas poner';
    }
  } else {
    return 'El archivo que quieres renombrar no existe';
  }
}

function renombrarDirectorio($ruta, $nombreViejo, $nombreNuevo)
{
  $rutaCompleta = $ruta . $nombreViejo;
  $rutaNueva = $ruta . $nombreNuevo;

  if (is_dir($rutaCompleta)) {
    if(!is_dir($rutaNueva) && !is_file($rutaNueva)){
      rename($rutaCompleta, $rutaNueva);
      return 'El directorio ha sido renombrado';
    }else{
      return 'Ya existe un elemento con el nombre que intentas poner';
    }
  } else {
    return 'El directorio que quieres renombrar no existe';
  }
}

//Obtener permisos de un archivo
function verPermisosArchivo($ruta, $nombre)
{
  $rutaCompleta = $ruta . $nombre;

  if (is_file($rutaCompleta)) {
    clearstatcache();
    return substr(sprintf("%o", fileperms($rutaCompleta)), -4);
  } else {
    return 'El archivo no existe';
  }
}

//Obtiene el número del propietario.
function verPropietario($ruta, $nombre)
{
  $rutaCompleta = $ruta . $nombre;

  if (is_file($rutaCompleta)) {
    return fileowner($rutaCompleta);
  } else {
    return 'El archivo no existe';
  }
}

//Obtiene el número del grupo
function verGrupo($ruta, $nombre)
{
  $rutaCompleta = $ruta . $nombre;

  if (is_file($rutaCompleta)) {
    return filegroup($rutaCompleta);
  } else {
    return 'El archivo no existe';
  }
}

//Mover archivos o directorios, funciona para ambos
function moverFichero($rutaVieja, $rutaNueva, $nombre)
{
  $rutaCompletaVieja = $rutaVieja . $nombre;
  $rutaCompletaNueva = $rutaNueva . $nombre;

  if (is_file($rutaCompletaVieja) || is_dir($rutaCompletaVieja)) {
    if (is_dir($rutaNueva)) {
      rename($rutaCompletaVieja, $rutaCompletaNueva);
      return 'Fichero movido';
    } else {
      return 'El directorio de destino no existe';
    }
  } else {
    return 'El fichero que quieres mover no existe';
  }
}

//Obtiene los permisos de un archivo o directorio
function verInformacionDePermisos($ruta,$nombre){
  $rutaCompleta = $ruta.$nombre;
  if(is_file($rutaCompleta) || is_dir($rutaCompleta)){
    clearstatcache();
    return substr(sprintf("%o", fileperms($rutaCompleta)), -4); 
  }
  else{
    return 'El fichero no existe';
  }
}

//Ver propietario de archivo
function verPropietarioPrueba($ruta, $nombre)
{
  $rutaCompleta = $ruta . $nombre;

  if(is_file($rutaCompleta)){
    $a  = posix_getpwuid(fileowner($rutaCompleta));
    return array_shift($a);
  } else {
    return 'El archivo no existe';
  }
}