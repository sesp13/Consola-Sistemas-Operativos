<?php
//Nota para pajoy: Siempre que vaya a invocar un directorio poner / al final
//Ejemplo si el directorio es carpeta, la ruta es ./carpeta/ 

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
    $archivo = fopen($rutaCompleta, 'a');
    return 'El archivo ha sido creado';
    fclose($archivo);
  } else {
    return 'El archivo ya existe';
  }
}

function crearDirectorio($ruta, $nombre, $permisos)
{
  $rutaCompleta = substr($ruta . $nombre,1);
  if (!is_dir($rutaCompleta)) {
    mkdir($rutaCompleta, $permisos);
    return 'Directorio creado';
  } else {
    return 'El directorio ya existe';
  }
}

//Eliminación de archivos y directorios
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

function eliminarDirectorio($ruta, $nombre)
{
  $rutaCompleta = $ruta . $nombre;
  if (is_dir($rutaCompleta)) {
    rmdir($rutaCompleta);
    return 'El directorio ha sido eliminado';
  } else {
    return 'El directorio no existe';
  }
}

//Copiar y pegar archivos
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

//Renombrar archivos y directorios
function renombrarArchivo($ruta, $nombreViejo, $nombreNuevo)
{
  $rutaCompleta = $ruta . $nombreViejo;
  $rutaNueva = $ruta . $nombreNuevo;

  if (is_file($rutaCompleta)) {
    rename($rutaCompleta, $rutaNueva);
    return 'El archivo ha sido renombrado';
  } else {
    return 'El archivo que quieres renombrar no existe';
  }
}

function renombrarDirectorio($ruta, $nombreViejo, $nombreNuevo)
{
  $rutaCompleta = $ruta . $nombreViejo;
  $rutaNueva = $ruta . $nombreNuevo;

  if (is_dir($rutaCompleta)) {
    rename($rutaCompleta, $rutaNueva);
    return 'El directorio ha sido renombrado';
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

function moverArchivo($rutaVieja, $rutaNueva, $nombre)
{
  $rutaCompletaVieja = $rutaVieja . $nombre;
  $rutaCompletaNueva = $rutaNueva . $nombre;

  if (is_file($rutaCompletaVieja)) {
    if (is_dir($rutaNueva)) {
      rename($rutaCompletaVieja, $rutaCompletaNueva);
      return 'Archivo movido';
    } else {
      return 'El directorio de destino no existe';
    }
  } else {
    return 'El archivo que quieres mover no existe';
  }
}
