<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Favoritos</title>

  <!-- Styles Module CSS Reference -->
  <?php include("module-styles.php"); ?>

</head>
<body class="bg-light">

  <!-- Top NavBar Reference -->
  <?php include("module-navbar.php"); ?>

  <main>
    <div class="container">

      <!-- Content -->
      <section class="py-4 text-center container">
        <div class="row py-4">
          <div class="col-lg-6 col-md-10 mx-auto">
            <h1 class="fw-light">Favoritos</h1>
            <p class="lead text-muted">Todos tus eventos guardados en un solo lugar.</p>
            <hr>

            <div class="row row-cols-1 g-4">

              <div class="col text-start">
                <div class="row g-0">
                  <div class="col-3">
                    <figure class="figure">
                      <div>
                        <img src="https://source.unsplash.com/random/560x560/?concert" class="figure-img img-fluid rounded" alt="...">
                      </div>
                    </figure>
                  </div>
                  <div class="col-1">
                  </div>
                  <div class="col-8 ml-4">
                    <h5 class="card-title">Evento Favorito I</h5>
                    <p>
                      <small class="text-muted">21 de Julio, 2022</small>
                    </p>
                    <div class="">
                      <a href="#" type="button" class="btn btn-sm btn-primary mr-4">Ver Detalles</a>
                      <a href="#" type="button" class="btn btn-sm btn-outline-secondary ml-4">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col text-start">
                <div class="row g-0">
                  <div class="col-3">
                    <figure class="figure">
                      <div>
                        <img src="https://source.unsplash.com/random/560x560/?concert,stage" class="figure-img img-fluid rounded" alt="...">
                      </div>
                    </figure>
                  </div>
                  <div class="col-1">
                  </div>
                  <div class="col-8 ml-4">
                    <h5 class="card-title">Evento Favorito II</h5>
                    <p>
                      <small class="text-muted">21 de Julio, 2022</small>
                    </p>
                    <div class="">
                      <a href="#" type="button" class="btn btn-sm btn-primary mr-4">Ver Detalles</a>
                      <a href="#" type="button" class="btn btn-sm btn-outline-secondary ml-4">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col text-start">
                <div class="row g-0">
                  <div class="col-3">
                    <figure class="figure">
                      <div>
                        <img src="https://source.unsplash.com/random/560x560/?concert,music" class="figure-img img-fluid rounded" alt="...">
                      </div>
                    </figure>
                  </div>
                  <div class="col-1">
                  </div>
                  <div class="col-8 ml-4">
                    <h5 class="card-title">Evento Favorito III</h5>
                    <p>
                      <small class="text-muted">21 de Julio, 2022</small>
                    </p>
                    <div class="">
                      <a href="#" type="button" class="btn btn-sm btn-primary mr-4">Ver Detalles</a>
                      <a href="#" type="button" class="btn btn-sm btn-outline-secondary ml-4">Eliminar</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </section>
    </div>
    <!-- / Content -->

    <!-- Bottom Footer Reference -->
    <?php include("module-footer.php"); ?>

  </main>

  <!-- JS Scripts References -->
  <?php include("module-scripts.php"); ?>

</body>
</html>
