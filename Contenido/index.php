<?php

echo 'Hola amigos'.'<br>';

function crearDirectorio($ruta, $nombre, $permisos)
{
  $rutaCompleta = $ruta . $nombre;
  if (!is_dir($rutaCompleta)) {
    mkdir($rutaCompleta, $permisos);
    return 'Directorio creado';
  } else {
    return 'El directorio ya existe';
  }
}
echo crearDirectorio('./', 'directorio', 0777);
?>