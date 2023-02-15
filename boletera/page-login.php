<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>

  <?php include("module-styles.php"); ?>

  <!-- Custom CSS Reference -->
  <link href="styles/signin.css" rel="stylesheet">

</head>
<body class="text-center">
  <main class="form-signin w-100 m-auto">
    <form>
      <img class="mb-3" width="72" height="72" src="img/ticket-icon/ticket-icon.png" alt="page-icon">
      <h5 class="mb-3 fw-normal">RESO Boletos</h5>
      <h3 class="mb-3 fw-normal"><strong>Iniciar Sesión</strong></h3>
      <hr>
      <div class="text-start">
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="E-mail">
          <label for="floatingInput">Correo Electrónico</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Contraseña</label>
        </div>
      </div>
      <div class="checkbox mb-3">
        <small>Al continuar con la siguiente página, aceptas los términos y condiciones y comprendes que la información se usará como se describe en nuestras políticas de privacidad.</small>
      </div>
      <button class="w-100 btn btn-lg btn-primary mb-4 rounded-pill" type="submit">Iniciar Sesión</button>
      <small>¿Eres nuev@ en RESO Boletos? <strong><a href="page-register.php"><u>Regístrate Aqui</u></a></strong></small>
      <p class="mt-4 mb-3 text-muted">&copy; 2022 RESO Sistemas. Todos los derechos reservados.</p>
    </form>
  </main>
</body>
</html>
