<?php
  if(isset($_COOKIE["sesion"])){
    echo '<meta http-equiv="refresh" content="0;url=./" />';
    die();
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control Interno | Iniciar Sesión</title>

  <!-- JQuery JS Core -->
  <script src="../js/jquery-3.6.0.js"></script>

  <!-- Bootstrap JS Core -->
  <script src="../vendors/bootstrap-5.2.0-beta1/js/bootstrap.min.js"></script>

  <!-- Splide JS Core -->
  <script src="../vendors/splide-4.0.7/js/splide.min.js" type="text/javascript"></script>

  <!-- Bootstrap CSS Core -->
  <link href="../vendors/bootstrap-5.2.0-beta1/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome CSS Core -->
  <link href="../vendors/fontawesome-6.1.1/css/all.min.css" rel="stylesheet"/>

  <!-- SPlide Theme CSS Core -->
  <link href="../vendors/splide-4.0.7/css/themes/splide-default.min.css" rel="stylesheet"/>

  <!-- Toastr CSS -->
  <link rel="stylesheet" href="plugins/toastr/toastr.css" >

  <!-- Page Icon -->
  <link rel="icon" type="image/png" href="img/ticket-setting-icon.png" sizes="16x16" />

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>

  <!-- Custom CSS Reference -->
  <link href="styles/signin.css" rel="stylesheet">

</head>
<body class="text-center">
  <main class="form-signin w-100 m-auto">
    <div class="container" style="background-color:#495050;color:white; border-radius:10% 10% 10% 10% / 40% 40% 40% 40%; padding:5px;">
      <h4>Control Administrativo Interno</h4>
    </div>
    <form>
      <br>
      <img class="mb-4" src="img/ticket-setting-icon.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>
      <div class="form-floating">
        <input type="text" class="form-control" id="usuario" placeholder="user">
        <label for="floatingInput">Usuario</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="clave" placeholder="Password" onkeypress="keyInicia()">
        <label for="floatingPassword">Contraseña</label>
      </div>
      <div class="mb-3">
        <a class="w-100 btn btn-lg btn-secondary" type="button" onclick="IniciaSesion()">Iniciar Sesión</a>
      </div>
      <a href=../index.php>Volver a la página</a>
      <p class="mt-4 text-muted">&copy; 2022 RESO Sistemas. Todos los derechos reservados.</p>
    </form>
  </main>
  <?php include("scripts.php"); ?>

  <script src="./vendors/blockui-2.70/jquery.blockUI.js"></script>

  <script type="text/javascript" src="scripts/login.js"></script>

</body>
</html>
