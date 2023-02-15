<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendario</title>

  <?php include("module-styles.php"); ?>

</head>
<body class="bg-light">

  <?php include("module-navbar.php"); ?>

  <!-- Mobile NavBar Reference -->
  <?php include("module-mobilenav.php"); ?>

  <main>

    <?php include("module-secnav.php"); ?>

    <div class="container">

      <!-- Search Bar -->
      <section class="text-center container">
        <div class="row py-4">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Calendario</h1>
            <p class="lead text-muted">Enterate de los proximos eventos ordenados por fecha.</p>
            <?php include("module-search-bar.php"); ?>
          </div>
        </div>
      </section>
      <!-- / Search Bar -->

    </div>

      <div class="album pb-4">

          <!-- Slick Container -->
          <div class="your-class">

            <!-- Monthly Calendar -->
            <div class="col p-2">
            <div class="card">
              <div class="card-body">
                <h2 class="display-6 fw-bold text-center mb-4">Julio 2022</h2>
                <div class="row row-cols-1 row-cols-md-4 g-4">

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento I</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Martes 17, 16:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?concert,music" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento II</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Martes 17, 20:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?stage,music" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento III</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Miercoles 20, 14:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?audience,music" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento IV</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Viernes 22, 10:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?festival,music" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento V</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Lunes 25, 12:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?song,music" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
           </div>
            <!-- / Monthly Calendar -->

            <!-- Monthly Calendar -->
            <div class="col p-2">
            <div class="card">
              <div class="card-body">
                <h2 class="display-6 fw-bold text-center mb-4">Agosto 2022</h2>
                <div class="row row-cols-1 row-cols-md-4 g-4">

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento I</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Martes 17, 16:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?concert" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento II</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Martes 17, 20:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?stage" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento III</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Miercoles 20, 14:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?audience" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento IV</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Viernes 22, 10:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?festival" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento V</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Lunes 25, 12:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?song" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
           </div>
            <!-- / Monthly Calendar -->

            <!-- Monthly Calendar -->
            <div class="col p-2">
            <div class="card">
              <div class="card-body">
                <h2 class="display-6 fw-bold text-center mb-4">Septiembre 2022</h2>
                <div class="row row-cols-1 row-cols-md-4 g-4">

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento I</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Martes 17, 16:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?concert" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento II</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Martes 17, 20:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?stage" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento III</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Miercoles 20, 14:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?audience" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento IV</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Viernes 22, 10:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?festival" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-7">
                          <div class="card-body">
                            <h5 class="card-title">Evento V</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Lunes 25, 12:00</h6>
                            <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</a>
                          </div>
                        </div>
                        <div class="col-5">
                          <img src="https://source.unsplash.com/random/480x480/?song" class="img-fluid rounded-end" alt="...">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            </div>
            <!-- / Monthly Calendar -->

          </div>
          <!-- / Slick Container -->

      </div>
      <!-- / Card Album -->

      <?php include("module-footer.php"); ?>

  </main>

  <?php include("module-scripts.php"); ?>

  <script>

    $(document).ready(function(){
      $('.your-class').slick({
        centerMode: true,
        centerPadding: '20px',
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
      });
    });

  </script>

</body>
</html>
