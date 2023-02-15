<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Cuenta</title>

  <!-- Styles Module CSS Reference -->
  <?php include("module-styles.php"); ?>

</head>
<body class="bg-light">

  <!-- Top NavBar Reference -->
  <?php include("module-navbar.php"); ?>

  <main>
    <div class="container">

      <!-- row-cols-1 row-cols-md-2 g-4 -->
      <!-- Content -->
      <div class="row my-4">
        <div class="col-12 col-md-4 my-2">

          <div class="card text-start">
            <div class="row g-0">
              <div class="col-md-3">
                <img src="img/default-profile-picture.jpg" alt="..." class=" img-fluid rounded-circle p-3">
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h5 class="card-title">¡Hola de nuevo, Usuario!</h5>
                  <p class="card-text text-muted">usuario@correo.com</p>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-12 col-md-8 my-2">
          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs" id="settings-list" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#description" role="tab" aria-controls="description" aria-selected="true">Información Personal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#history" role="tab" aria-controls="history" aria-selected="false">Contacto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#deals" role="tab" aria-controls="deals" aria-selected="false">Seguridad</a>
                </li>
              </ul>
            </div>
            <div class="card-body">

              <div class="tab-content mt-3">
                <div class="tab-pane active" id="description" role="tabpanel">
                    <h2 class="card-title">Información Personal</h2>
                    <p class="card-text">Verifica tus detalles personales.</p>
                    <hr>
                  <div class="mb-3">
                    <label for="UserName" class="form-label text-muted">Nombre(s):</label>
                    <input type="text" class="form-control" id="UserName" value="Nombre">
                  </div>
                  <div class="mb-3">
                    <label for="UserLastName" class="form-label text-muted">Apellido(s):</label>
                    <input type="text" class="form-control" id="UserLastName" value="Apellido">
                  </div>
                  <button class="btn btn-primary" type="submit">Actualizar Información</button>
                  <button class="btn btn-outline-secondary" type="submit">Actualizar Imagen de Perfil</button>
                </div>

                <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
                    <h2 class="card-title">Contacto</h2></h2>
                    <p class="card-text">De que manera podemos contactarte.</p>
                    <hr>
                  <div class="mb-3">
                    <label for="Email" class="form-label text-muted">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="Email" value="usuario@correo.com">
                  </div>
                  <div class="mb-3">
                    <label for="PhoneNumber" class="form-label text-muted">Número Telefónico:</label>
                    <input type="text" class="form-control" id="PhoneNumber" value="8714251598">
                  </div>
                  <button class="btn btn-primary" type="submit">Actualizar Contactos</button>
                </div>

                <div class="tab-pane" id="deals" role="tabpanel" aria-labelledby="deals-tab">
                    <h2 class="card-title">Seguridad</h2>
                    <p class="card-text">Actualiza periodicamente tus credenciales.</p>
                    <hr>
                  <div class="mb-3">
                    <label for="OldPassword" class="form-label text-muted">Contraseña Anterior:</label>
                    <input type="password" class="form-control" id="OldPassword" placeholder="Contraseña">
                  </div>
                  <div class="mb-3">
                    <label for="NewPassword" class="form-label text-muted">Nueva Contraseña:</label>
                    <input type="password" class="form-control" id="NewPassword" placeholder="Contraseña">
                  </div>
                  <button class="btn btn-primary" type="submit">Actualizar Contraseña</button>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- / Content -->

      <!-- Bottom Footer Reference -->
      <?php include("module-footer.php"); ?>

    </div>
  </main>

  <!-- JS Scripts References -->
  <?php include("module-scripts.php"); ?>

  <script>
    $("#settings-list a").on("click", function (e) {
      e.preventDefault();
      $(this).tab("show");
    });
  </script>

</body>
</html>
