<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slick-Test</title>

  <?php include("bak-links.php"); ?>

</head>
<body class="bg-light">

  <?php include("bak-navbar.php"); ?>

  <main>
    <div class="container">

      <!-- Content -->

      <!-- Search Bar -->
      <section class="text-center container">
        <div class="row py-4">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Eventos</h1>
            <p class="lead text-muted">Visualiza los proximos eventos programados.</p>
            <div class="col-lg-12 input-group" style="width:auto;">
              <div class="form-outline" style="width:90%;">
                <input type="search" id="form1" class="form-control" placeholder="Busca por Nombre, Artista ó Lugar..." style="border-radius:0% 0% 0% 0%"></input>
              </div>
              <div class="form-outline" style="width:10%;">
                <button type="button" class="btn btn-primary" style="border-radius:0% 50% 50% 0%; margin-left: -10px">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- / Search Bar -->


      <div class="album pb-4">
        <div class="container">

          <!-- Slick Container -->
          <div class="your-class">

            <!-- Card I -->
            <div class="col p-4">
              <div class="card shadow-sm">
                <img class="card-img-top" width="240" height="240" src="https://source.unsplash.com/random/560x560?sig=1" alt="Thumbnail">
                <div class="card-body">
                  <h5 class="card-title">Titulo del Evento I</h5>
                  <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
                  <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
                  <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
                  <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver Boletos</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Card I -->

            <!-- Card II -->
            <div class="col p-4">
              <div class="card shadow-sm">
                <img class="card-img-top" width="240" height="240" src="https://source.unsplash.com/random/560x560?sig=2" alt="Thumbnail">
                <div class="card-body">
                  <h5 class="card-title">Titulo del Evento II</h5>
                  <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
                  <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
                  <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
                  <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver Boletos</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Card II -->

            <!-- Card III -->
            <div class="col p-4">
              <div class="card shadow-sm">
                <img class="card-img-top" width="240" height="240" src="https://source.unsplash.com/random/560x560?sig=3" alt="Thumbnail">
                <div class="card-body">
                  <h5 class="card-title">Titulo del Evento III</h5>
                  <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
                  <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
                  <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
                  <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver Boletos</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Card III -->

            <!-- Card IV -->
            <div class="col p-4">
              <div class="card shadow-sm">
                <img class="card-img-top" width="240" height="240" src="https://source.unsplash.com/random/560x560?sig=4" alt="Thumbnail">
                <div class="card-body">
                  <h5 class="card-title">Titulo del Evento IV</h5>
                  <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
                  <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
                  <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
                  <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver Boletos</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Card IV -->

            <!-- Card V -->
            <div class="col p-4">
              <div class="card shadow-sm">
                <img class="card-img-top" width="240" height="240" src="https://source.unsplash.com/random/560x560?sig=5" alt="Thumbnail">
                <div class="card-body">
                  <h5 class="card-title">Titulo del Evento V</h5>
                  <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
                  <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
                  <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
                  <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver Boletos</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Card V -->

            <!-- Card VI -->
            <div class="col p-4">
              <div class="card shadow-sm">
                <img class="card-img-top" width="240" height="240" src="https://source.unsplash.com/random/560x560?sig=6" alt="Thumbnail">
                <div class="card-body">
                  <h5 class="card-title">Titulo del Evento VI</h5>
                  <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
                  <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
                  <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
                  <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver Boletos</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Card VI -->

            <!-- Card VII -->
            <div class="col p-4">
              <div class="card shadow-sm">
                <img class="card-img-top" width="240" height="240" src="https://source.unsplash.com/random/560x560?sig=7" alt="Thumbnail">
                <div class="card-body">
                  <h5 class="card-title">Titulo del Evento VI</h5>
                  <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
                  <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
                  <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
                  <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver Boletos</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Card VII -->

            <!-- Card VIII -->
            <div class="col p-4">
              <div class="card shadow-sm">
                <img class="card-img-top" width="240" height="240" src="https://source.unsplash.com/random/560x560?sig=8" alt="Thumbnail">
                <div class="card-body">
                  <h5 class="card-title">Titulo del Evento VIII</h5>
                  <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
                  <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
                  <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
                  <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
                  <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Ver Boletos</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Card VIII -->

          </div>

        </div>
      </div>
      <!-- / Card Album -->

      <!-- / Content -->

      <?php include("bak-footer.php"); ?>

    </div>
  </main>

  <?php include("bak-scripts.php"); ?>

  <script>

  $(document).ready(function(){
    $('.your-class').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 2,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  });

  </script>

</body>
</html>
