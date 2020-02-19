<!DOCTYPE html>
<html lang="en">
<?php 
include 'php/funciones.php'; 
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
if (!isset ($_SESSION['directorio']) ){
  $_SESSION['directorio'] = obtenerDirectorioActual()."/carpetaDePrueba";
}
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administrador de archivos</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="vendor/SweetAlert/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div class="page-header">
        <h1>Administrador de archivos <small><?php echo $_SESSION["directorio"] ?></small></h1>
      </div>
      <!-- Main Content -->
      <div style="text-align: right;">
      <button type="button" class="btn btn-dark" id = "paste">pegar</button>

      <button type="button" class="btn btn-primary" id = "create-dir">Crear carpeta</button>
        
      <button type="button" class="btn btn-primary" id = "create-file">Crear archivo</button>
      </div>
      <div id="content">

        <table class="table table-sm">

          <tbody>
            <tr>
              <td>
                  <button type="button" class="btn btn-danger" id="return" >
                    Volver
                  </button>
              </td>
            </tr>
            
            <?php 

            $carpetas = verContenidoDirectorio($_SESSION["directorio"],"");
            foreach ($carpetas as $key) {
              if(strcmp($key,".") && strcmp($key,"..")){
              ?>
              <tr>
                <td>
                  <?php 
                  if (!strcmp((string)filetype($_SESSION["directorio"]."/".$key),"dir")) { ?>
                  <button type="button" class="btn btn-link button-folder"><img src="img/dossier-147590_640.png" />
                  <?php echo $key;?>
                  </button>
                <?php }else{ ?>
                  <button type="button" class="btn btn-link"><img src="img/list-2389219_640.png" />
                  <?php echo $key;?>
                  </button>
                <?php } ?>
                </td>                                                 
                <td style="text-align: right;">
                  <button type="button" class="btn btn-info <?php if (!strcmp((string)filetype($_SESSION["directorio"]."/".$key),"dir")) {echo "change-name-dir";}else{echo "change-name-file";} ?>" name ="<?php echo $key;?>" >cambiar nombre</button>
               
                  <button type="button" class="btn btn-danger <?php if (!strcmp((string)filetype($_SESSION["directorio"]."/".$key),"dir")) {echo "delete-dir";}else{echo "delete-file";} ?>" name ="<?php echo $key;?>">Eliminar</button>
              
                  <button type="button" class="btn btn-warning <?php if (!strcmp((string)filetype($_SESSION["directorio"]."/".$key),"dir")) {echo "copy-dir";}else{echo "copy-file";} ?>" name ="<?php echo $key;?>">Copiar</button>
                
              
                  <button type="button" class="btn btn-light cut" name ="<?php echo $key;?>">Cortar</button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Permisos
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item view-info" name ="<?php echo $key;?>">Ver info</a>
                    </div>
                  </div>
                
              </tr>

              <?php 
            }
          }
            ?>
          </tbody>
        </table>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Modal-->
<!-- end Modal-->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/SweetAlert/dist/sweetalert2.all.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/SweetAlert/sweetalert.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>
