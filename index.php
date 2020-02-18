<!DOCTYPE html>
<html lang="en">
<?php 
include 'php/funciones.php'; 
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
if (!isset ($_SESSION['directorio']) ){
  $_SESSION['directorio'] = "/";
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
      <button href=""data-toggle="modal" data-target="#modal-crear-carpeta" type="button" class="btn btn-primary">Crear carpeta</button>
        
      <button href=""data-toggle="modal" data-target="#modal-crear-archivo" type="button" class="btn btn-primary">Crear archivo</button>
      </div>
      <div id="content">

        <table class="table table-sm">
          <thead>
            <tr>
              <th scope="col">Carpeta</th>
            </tr>
          </thead>
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
  <div class="modal fade" id="modal-crear-carpeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Nombre de la carpeta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input type="text" class="form-control" id="name-dir">
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button class="btn btn-primary" id = "create-dir">Crear</button>
      </div>
    </div>
  </div>
</div>
  <div class="modal fade" id="modal-crear-archivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Nombre del archivo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <input type="text" class="form-control" id="name-file">
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button class="btn btn-primary" id = "create-file">Crear</button>
      </div>
    </div>
  </div>
</div>
<!-- end Modal-->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>
