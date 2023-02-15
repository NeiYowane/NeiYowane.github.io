<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Titulo del Evento</title>

  <?php include("module-styles.php"); ?>

</head>
<body class="bg-light">

  <?php include("module-navbar.php"); ?>

  <main>
    <div class="container">

      <!-- Content -->
      <section class="text-center container">
        <div class="row py-4">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Titulo del Evento</h1>
            <h4 class="fw-light">Nombre del Artista/Grupo</h4>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-4 mx-auto">

            <!-- Column I -->
            <div class="col">
              <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                  <div class="card">
                    <div class="card-header"><i class="fa-solid fa-image"></i>&nbsp;&nbsp;Imagen:</div>
                    <div class="card-body my-auto">
                      <figure class="figure">
                        <div div class="zoom">
                          <img src="https://source.unsplash.com/random/560x560/?concert" class="figure-img img-fluid rounded" alt="...">
                        </div>
                      </figure>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="d-grid gap-2">
                    <a href="page-stage-preview.php" type="button" class="btn btn-primary">Conseguir Boletos</a>
                    <button class="btn btn-primary" type="button">Añadir a Favoritos</button>
                  </div>
                </div>
                <div class="col">
                  <div class="card text-bg-success">
                    <div class="card-body">
                      <h5 class="card-title">¡Boletos Disponibles! &nbsp; <i class="fa-solid fa-circle-check"></i></h5>
                    </div>
                    <div class="card-footer">
                      Ultima Comprobacion: Hace 1 min.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Column I -->

            <!-- Column II -->
            <div class="col">
              <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                  <div class="card">
                    <div class="card-header"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;Fecha:</div>
                    <div class="card-body">
                      <h5 class="card-title">Viernes, 15 de Julio</h5>
                      <h6 class="card-subtitle mb-2 text-muted">2022</h6>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <div class="card-header"><i class="fa-regular fa-clock"></i>&nbsp;&nbsp;Hora:</div>
                    <div class="card-body">
                      <h5 class="card-title">9:00PM</h5>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <div class="card-header"><i class="fa-solid fa-location-crosshairs"></i>&nbsp;&nbsp;Lugar:</div>
                    <div class="card-body">
                      <h5 class="card-title">Teatro Nazas</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Torreón, Coahuila</h6>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <div class="card-header"><i class="fa-solid fa-book-open-reader"></i>&nbsp;&nbsp;Sinopsis:</div>
                    <div class="card-body">
                      <p class="card-text">Uno de los conciertos mas esperados, mijares sinfónico acompañados de la orquesta filarmónica del desierto, sin duda un evento de gala que no te puedes perder.</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <div class="card-header"><i class="fa-solid fa-tags"></i>&nbsp;&nbsp;Etiquetas:</div>
                    <div class="card-body">
                      <span class="badge text-bg-warning">Musical</span>
                      <span class="badge text-bg-warning">Rock</span>
                      <span class="badge text-bg-warning">Pop</span>
                      <span class="badge text-bg-warning">Cultural</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Column II -->

            <!-- Column III -->
            <div class="col">
              <div class="row row-cols-1 row-cols-md-1 g-4">
                <div class="col">
                  <div class="card">
                    <div class="card-header"><i class="fa-regular fa-map"></i>&nbsp;&nbsp;Mapa:</div>
                    <div class="card-body">
                      <figure class="figure">
                        <div class="zoom">
                          <img src="img/test-media/test-stage-01.png" class="figure-img img-fluid rounded" alt="...">
                        </div>
                      </figure>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <div class="card-header"><i class="fa-solid fa-eye"></i>&nbsp;&nbsp;Observaciones:</div>
                    <div class="card-body">
                      <p class="card-text">Uso obligatorio de cubrebocas.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Column III -->

          </div>
        </div>
      </section>
      <!-- / Content -->

      <?php include("module-footer.php"); ?>

    </div>
  </main>

  <?php include("module-scripts.php"); ?>

</body>
</html>
