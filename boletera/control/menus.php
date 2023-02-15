<?php
  require_once("Backend/Usuarios/Usuarios.php");
  $Usuarios = new Usuarios();
  $ListaMenuPadre = $Usuarios->MenuPadre();
 ?>

<!-- Page Icon -->
<link rel="icon" type="image/png" href="img/ticket-setting-icon.png" sizes="16x16" />

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<!-- Font Awesome FREE 6.1.2-->
<!-- <link rel="stylesheet" href="plugins/fontawesome-free-6.1.2-web/css/all.min.css"> -->
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">

<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

<!-- iCheck -->
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<!-- JQVMap -->
<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<!-- OverlayScrollbars -->
<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<!-- Date Range picker -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<!-- summernote -->
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

<!-- Animate CSS -->
<link rel="stylesheet" href="plugins/animate/animate.min.css" >

<!-- FancyBox CSS -->
<link rel="stylesheet" href="plugins/fancyapps-4.0.30/fancybox.css" >
<link rel="stylesheet" href="plugins/fancyapps-4.0.30/panzoom.css">

<!-- Splide Theme CSS Core -->
<link rel="stylesheet" href="plugins/splide-4.0.7/css/themes/splide-default.min.css"/>

<!-- RowReorder CSS Core -->
<link rel="stylesheet" href="plugins/datatables-rowreorder/css/rowReorder.dataTables.min.css"/>

<link href="plugins/select_2/select2/css/select2.min.css" rel="stylesheet" type="text/css">
<link href="plugins/select_2/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.jqueryui.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="plugins/toastr/toastr.min.css">

<link rel="stylesheet" href="plugins/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="plugins/bootstrap-multiselect-master/dist/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="plugins/bootstrap-multiselect-master/docs/css/bootstrap-example.min.css">
<link rel="stylesheet" href="plugins/bootstrap-multiselect-master/docs/css/prettify.min.css">
</head>

<style>
  .InputPattern:placeholder-shown {
       border: 0.2px solid #cacaca;
     }

  input:invalid {
       border: 1px solid red;
   }

   .InputPattern:valid {
     border: 0.2px solid #cacaca;
   }
</style>

<!-- Buttons CSS Reference -->
<link rel="stylesheet" href="styles/buttons.css">

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/ticket-setting-icon.png" alt="AdminLTELogo" height="96" width="96">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Inicio</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-cogs"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href='ListaBitacora.php' class='dropdown-item dropdown-footer'>
            <i class="nav-icon fas fa-clipboard-list"></i>&nbsp;&nbsp;&nbsp;Bitácora
          </a>
          <a href='logout.php' class='dropdown-item dropdown-footer'>
            <i class="nav-icon fa-solid fa-door-open"></i>&nbsp;&nbsp;&nbsp;Cerrar Sesión
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/ticket-setting-icon.png" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-light">Control Interno</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/perfil.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrador</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class='nav-item'>
            <a href='ListaArtistas.php' class='nav-link'>
              <i class="nav-icon fas fa-user-music"></i>
              <p>Artistas</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='ListaGeneros.php' class='nav-link'>
              <i class="nav-icon fas fa-music"></i>
              <p>Géneros</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='ListaEscenarios.php' class='nav-link'>
              <i class="nav-icon fa-solid fa-location-dot"></i>
              <p>Escenarios</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='ListaTipoEscenarios.php' class='nav-link'>
              <i class="nav-icon fa-solid fa-shapes"></i>
              <p>Tipos de Escenarios</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='ListaBanderas.php' class='nav-link'>
              <i class="nav-icon fa-solid fa-flag-pennant"></i>
              <p>Banderas</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='ListaEventos.php' class='nav-link'>
              <i class="nav-icon fa-solid fa-calendar-circle-plus"></i>
              <p>Eventos</p>
            </a>
          </li>

          <!-- <li class='nav-item'>
            <a href='plantilla.php' class='nav-link'>
              <i class="nav-icon fa-solid fa-loveseat"></i>
              <p>Áreas</p>
            </a>
          </li> -->

          <!-- <li class='nav-item'>
            <a href='plantilla.php' class='nav-link'>
              <i class="nav-icon fa-solid fa-circle-dollar"></i>
              <p>Precios</p>
            </a>
          </li> -->

          <li class='nav-item'>
            <a href='usuarios.php' class='nav-link'>
              <i class="nav-icon fa-solid fa-users"></i>
              <p>Usuarios Internos</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='perfiles.php' class='nav-link'>
              <i class="nav-icon fa-solid fa-address-card"></i>
              <p>Perfiles</p>
            </a>
          </li>

          <li class='nav-item'>
            <a href='permisos.php' class='nav-link'>
              <i class="nav-icon fa-solid fa-key"></i>
              <p>Permisos</p>
            </a>
          </li>

          <!-- <?php
          for ($i=0; $i < sizeof($ListaMenuPadre); $i++) {
            $id_menuPadre = $ListaMenuPadre[$i]["id_menu"];
            $DescripcionPadre = $ListaMenuPadre[$i]["Descripcion"];
            $URLPadre = $ListaMenuPadre[$i]["URL"];
            $ArgumentosPadre = $ListaMenuPadre[$i]["Argumentos"];

            $Usuarios = new Usuarios();
            $ListaMenuHijo = $Usuarios->MenuHijo($id_menuPadre);
            $menuHijo = "";

            echo "
              <li class='nav-item'>
                <a href='$URLPadre' class='nav-link'>
                  <i class='nav-icon $ArgumentosPadre'></i>
                  <p>
                    $DescripcionPadre
                    <i class='right fas fa-angle-down'></i>
                  </p>
                </a>
                <ul class='nav nav-treeview'>
                ";
                for ($y=0; $y < sizeof($ListaMenuHijo); $y++) {
                  $id_menuHijo = $ListaMenuHijo[$y]["id_menu"];
                  $DescripcionHijo = $ListaMenuHijo[$y]["Descripcion"];
                  $URLHijo = $ListaMenuHijo[$y]["URL"];
                  $ArgumentosHijo = $ListaMenuHijo[$y]["Argumentos"];

                  $menuHijo .= "<li><a href='$URLHijo'>$DescripcionHijo</a></li>";

                  echo"
                    <li class='nav-item'>
                      <a href='$URLHijo' class='nav-link'>
                        <i class='far fa-circle nav-icon'></i>
                        <p>$DescripcionHijo</p>
                      </a>
                    </li>";
                }
                  echo"
                </ul>
              </li>
            ";
          }
          ?> -->

        </ul>
      </nav>

    </div>

  </aside>
