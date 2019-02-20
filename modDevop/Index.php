<?php 

session_start();

if ($_SESSION['keyDevop'] == "" || $_SESSION['keyDevop'] == null) {
  header("Location:../");
} else {
  include '../modelos/rutasAmig.php';
  include '../modelos/devop.modelo.php';
  $devop = new Developer();
  $keyDevop = $_SESSION['keyDevop'];
  $tkseg = $_SESSION['tokSeg'];
  $dataSis = $devop -> datSistem();
  $datDev = $devop -> devDet(base64_encode($keyDevop));
  $dataDir = $devop -> directRegister();
  $dataDoc = $devop -> docentRegister();
  $dataAdm = $devop -> adminsRegister();
  $dataCor = $devop -> cordinRegister();
    
?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SitutBack</title>

  
  <link href="<?php echo SERVERURL; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <link href="<?php echo SERVERURL; ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>vistas/css/animate.css">
  <link href="<?php echo SERVERURL; ?>assets/css/styles.css" rel="stylesheet">
  <link href="<?php echo SERVERURL; ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
  <script src="<?php echo SERVERURL; ?>assets/vendor/jquery/jquery.min.js"></script>

  <script src="<?php echo SERVERURL; ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo SERVERURL; ?>vistas/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?php echo SERVERURL; ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

</head>

<body id="page-top">

  <div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo SERVERURLCOR; ?>Home/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-user-graduate"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SITUT <sup>v.1</div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active text-center">
        <a class="nav-link text-center" href="<?php echo SERVERURLCOR; ?>Home/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Panel de control</span></a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Opciones
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Ajustes</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Selecciona:</h6>
            <a class="collapse-item" data-backdrop="false" data-toggle="modal" data-target="#confContCor" href="#">Contraseña</a>
            <a class="collapse-item" data-backdrop="false" data-toggle="modal" data-target="#confDatCor" href="#">Datos</a>
            <a class="collapse-item" data-backdrop="false" data-toggle="modal" data-target="#confFotPerf" href="#">Foto</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Soporte</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Selecciona:</h6>
            <!-- <a class="collapse-item" href="<?php echo SERVERURLCOR; ?>RepProblem/">Reportar un problema</a>
            <a class="collapse-item" href="<?php echo SERVERURLCOR; ?>MyReports/">Reportes enviados</a> -->
          </div>
        </div>
      </li>

      <div id="cont-oc" class=" animated">
        <hr class="sidebar-divider" id="hrocul">
      
        <div class="sidebar-heading" id="tagDir">
          Directorio
        </div>

        <li class="nav-item" id="dirAdm">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataAdmins" aria-expanded="true" aria-controls="dataAdmins">
            <i class="fas fa-fw fa-folder"></i>
            <span>Administradores</span>
          </a>
          <div id="dataAdmins" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Selecciona</h6>
                <?php 
                  while ($datAdm = $dataAdm -> fetch(PDO::FETCH_OBJ)) {
                ?>
                  <a class="collapse-item text-capitalize" href="<?php echo SERVERURLDEV; ?>ProfileUsr/<?php echo base64_encode($datAdm->id_administrador); ?>/adm/">
                    <?php echo $datAdm -> nombre_c; ?>
                  </a>
                  <div class="collapse-divider"></div>
                <?php
                  }
                ?>
                <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item" id="dirCor">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataCord" aria-expanded="true" aria-controls="dataCord">
            <i class="fas fa-fw fa-folder"></i>
            <span>Coordinadores</span>
          </a>
          <div id="dataCord" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Selecciona</h6>
                <?php 
                  while ($datCor = $dataCor -> fetch(PDO::FETCH_OBJ)) {
                ?>
                  <a class="collapse-item text-capitalize" href="<?php echo SERVERURLDEV; ?>ProfileUsr/<?php echo base64_encode($datCor->id_coordinador); ?>/adm/">
                    <?php echo $datCor -> nombre_c_cor; ?>
                  </a>
                  <div class="collapse-divider"></div>
                <?php
                  }
                ?>
                <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item" id="dirDir">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataDirect" aria-expanded="true" aria-controls="dataDirect">
            <i class="fas fa-fw fa-folder"></i>
            <span>Directores</span>
          </a>
          <div id="dataDirect" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Selecciona</h6>
              <?php 
                while ($datDir = $dataDir -> fetch(PDO::FETCH_OBJ)) {
              ?>
                <a class="collapse-item text-capitalize" href="<?php echo SERVERURLDEV; ?>ProfileUsr/<?php echo base64_encode($dataDoc->id_docente); ?>/dir/">
                  <?php echo $datDir -> nombre_c_dir; ?>
                </a>
                <div class="collapse-divider"></div>
              <?php
                }
              ?>
            </div>
          </div>
        </li>
        <li class="nav-item" id="dirDoc">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dataDocentes" aria-expanded="true" aria-controls="dataDocentes">
            <i class="fas fa-fw fa-folder"></i>
            <span>Docentes</span>
          </a>
          <div id="dataDocentes" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Selecciona</h6>
                <?php 
                  while ($datDoc = $dataDoc -> fetch(PDO::FETCH_OBJ)) {
                ?>
                  <a class="collapse-item text-capitalize" href="<?php echo SERVERURLDEV; ?>ProfileUsr/<?php echo base64_encode($datDoc->id_docente); ?>/doc/">
                    <?php echo $datDoc -> nombre_c_doc; ?>
                  </a>
                  <div class="collapse-divider"></div>
                <?php
                  }
                ?>
                <div class="collapse-divider"></div>
            </div>
          </div>
        </li>
      </div>

      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
 -->
      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <h4>
              Bienvenido desarrollador.
            </h4>
          </div>

          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow d-sm-none">
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize font-weight-bold">
                  <?php echo $datDev -> user_devop; ?>
                </span>
                  <img src='<?php echo SERVERURL; ?>vistas/img/icous.png' class="img-profile rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Mi actividad
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>


        <?php 
          if (isset($_GET['view'])) {
              $views = explode("/", $_GET['view']);
              if (is_file('dev/'.$views[0].'.php')) { {}
                  include 'dev/'.$views[0].'.php';
              } else {
                  include 'dev/Index.php';
              }
          } else {
              include 'dev/Index.php';
          }
        ?>
      

        

      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> 
              <i class="fas fa-copyright mr-2"></i>
              Situt <b>v <?php echo $dataSis->version_sistem; ?></b> -- MA 
              <script type="text/javascript">
                document.write(new Date().getFullYear());
              </script>
            </span>
          </div>
        </div>
      </footer>

    </div>

  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Esta seguro de cerrar sesion?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body text-center">
          Seleccione salir para continuar...
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-dark" href="<?php echo SERVERURLDEV; ?>dev/Logout.php">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo SERVERURL; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo SERVERURL; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo SERVERURL; ?>assets/js/sb-admin-2.min.js"></script>


  <script src="<?php echo SERVERURLDEV; ?>dev/js/devop.js"></script>

  
</body>

</html>

<?php   
  // } else {
  //   header("Location:".SERVERURLDEV."dev/Logout.php");
  // }
}

?>