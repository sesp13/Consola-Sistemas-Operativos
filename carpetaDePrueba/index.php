<?php

echo 'Hola Pajoy!!!'.'<br>';
//Métodos útiles para el SO

// *********** CREAR  *****************

// Crear archivos
// fopen( 'nombre de un archivo', permiso)

// fopen('archivo1.txt', 'a') or die('SE ha producido un error');

//Los permisos pueden ser a, o c podemos ver la documentación si se crea. El archivo se crea en la ubicación actual

//Crear directorios
// mkdir(rutadelacarpeta, permisos en numeros con un 0 adelante)

// mkdir('./carpetaExpreimentalParaBorrar', 0777);


// *********** CAMBIAR NOMBRE *******************

//archivo
// rename('archivo.txt', 'Archivo.txt');

//carpeta
// rename('carpetaExpreimental', 'CarpetaExpreimental');

//*************** ELIMINAR *****************

//Archivo
// unlink('archivo1.txt');

//Directorio
// rmdir('carpetaExpreimentalParaBorrar');

//Copiar y pegar
//Nombre del archivo, destino ya sea un nombre nuevo, o una ruta y el nombre del
//nuevo en esa ruta, si el archivo de destino ya existe es sobreescrito

// copy('Archivo.txt', './CarpetaExpreimental/nuevoArchivo.txt');

//VER INFORMACION DE PERMISOS
//Número sacado a lo mula
// echo fileperms('Archivo.txt').'<br>'; 
//Número en octal
// echo substr(sprintf("%o", fileperms("Archivo.txt")), -4); 


//CAMBIAR PERMISOS
// echo chmod('Archivo.txt', 0664);
// clearstatcache();
// echo substr(sprintf("%o", fileperms("Archivo.txt")), -4); 

//MOVER ARCHIVOS
//Para mover archivos usamos rename, especificando las rutas
rename('archivo1.txt', './carpetaExpreimental/archivo1.txt');


?>