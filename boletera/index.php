<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RESO Boletos</title>

  <!-- Styles CSS Reference -->
  <?php include("module-styles.php"); ?>

  <style>
    .primaryIcons i{
      color: #ee9f22;
    }
  </style>

</head>
<body class="bg-light">

  <main>
    <!-- Top NavBar Reference -->
    <?php include("module-navbar.php"); ?>

    <!-- Mobile NavBar Reference -->
    <?php include("module-mobilenav.php"); ?>

    <!-- Splide -->
    <section id="main-slider" class="splide" aria-label="My Awesome Gallery">
      <div class="splide__track">
        <ul class="splide__list">
          <li class="splide__slide">
            <img
              src="https://source.unsplash.com/random/1920x730/?concert"
              alt=""
            />
          </li>
          <li class="splide__slide">
            <img
              src="https://source.unsplash.com/random/1920x730/?stage"
              alt=""
            />
          </li>
          <li class="splide__slide">
            <img
              src="https://source.unsplash.com/random/1920x730/?audience"
              alt=""
            />
          </li>
        </ul>
      </div>

      <div class="splide__progress">
        <div class="splide__progress__bar">
        </div>
      </div>
    </section>
    <!-- / Splide -->

    <!-- Secondary NavBar Reference -->
    <?php include("module-secnav.php"); ?>

    <div class="container">

      <!-- Search Bar -->
      <section class="text-center container">
        <div class="row py-4">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Eventos</h1>
            <p class="lead text-muted">Visualiza los proximos eventos programados.</p>
            <?php include("module-search-bar.php"); ?>
          </div>
        </div>
      </section>
      <!-- / Search Bar -->

    </div>

    <!-- Slick Container -->
    <div class="album pb-4">
      <div class="your-class h-100">

        <!-- Card I -->
        <div class="col mx-1">
          <div class="card shadow-sm">
            <div class="zoomEvent">
              <img class="card-img-top" width="560" height="400" src="https://source.unsplash.com/random/560x500/?concert" alt="Thumbnail">
            </div>
            <div class="card-body primaryIcons">
              <h5 class="card-title">Mi Evento</h5>
              <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;15 de Julio del 2022<br></small>
              <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Teatro Nazas<br></small>
              <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;Torreón, Coahuila<br></small>
              <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;Musical<br></small>
              <br>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="page-event-details.php" type="button" class="btn btn-sm btn-outline-secondary">Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Card I -->

        <!-- Card II -->
        <div class="col mx-1">
          <div class="card shadow-sm">
            <div class="zoomEvent">
              <img class="card-img-top" width="560" height="400" src="https://source.unsplash.com/random/560x500/?stage" alt="Thumbnail">
            </div>
            <div class="card-body">
              <h5 class="card-title">Titulo del Evento II</h5>
              <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
              <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
              <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
              <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
              <br>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="page-event-details.php" type="button" class="btn btn-sm btn-outline-secondary">Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Card II -->

        <!-- Card III -->
        <div class="col mx-1">
          <div class="card shadow-sm">
            <div class="zoomEvent">
              <img class="card-img-top" width="560" height="400" src="https://source.unsplash.com/random/560x500/?theater" alt="Thumbnail">
            </div>
            <div class="card-body">
              <h5 class="card-title">Titulo del Evento III</h5>
              <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
              <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
              <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
              <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
              <br>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="page-event-details.php" type="button" class="btn btn-sm btn-outline-secondary">Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Card III -->

        <!-- Card IV -->
        <div class="col mx-1">
          <div class="card shadow-sm">
            <div class="zoomEvent">
              <img class="card-img-top" width="560" height="400" src="https://source.unsplash.com/random/560x500/?event" alt="Thumbnail">
            </div>
            <div class="card-body">
              <h5 class="card-title">Titulo del Evento IV</h5>
              <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
              <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
              <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
              <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
              <br>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="page-event-details.php" type="button" class="btn btn-sm btn-outline-secondary">Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Card IV -->

        <!-- Card V -->
        <div class="col mx-1">
          <div class="card shadow-sm">
            <div class="zoomEvent">
              <img class="card-img-top" width="560" height="400" src="https://source.unsplash.com/random/560x500/?musical" alt="Thumbnail">
            </div>
            <div class="card-body">
              <h5 class="card-title">Titulo del Evento V</h5>
              <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
              <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
              <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
              <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
              <br>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="page-event-details.php" type="button" class="btn btn-sm btn-outline-secondary">Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Card V -->

        <!-- Card VI -->
        <div class="col mx-1">
          <div class="card shadow-sm">
            <div class="zoomEvent">
              <img class="card-img-top" width="560" height="400" src="https://source.unsplash.com/random/560x500/?musical-instruments" alt="Thumbnail">
            </div>
            <div class="card-body">
              <h5 class="card-title">Titulo del Evento VI</h5>
              <small class="text-muted"><i class="fa-regular fa-calendar"></i>&nbsp;&nbsp;[Fecha del Evento]<br></small>
              <small class="text-muted"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;[Ubicacion del Evento]<br></small>
              <small class="text-muted"><i class="far fa-building"></i>&nbsp;&nbsp;[Ciudad del Evento]<br></small>
              <small class="text-muted"><i class="fas fa-tags"></i>&nbsp;&nbsp;[Categoria del Evento]<br></small>
              <br>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="page-event-details.php" type="button" class="btn btn-sm btn-outline-secondary">Ver Detalles</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Card VI -->

      </div>
    </div>
    <!-- / Slick Container -->

      <!-- Popular Events Slick -->
      <?php include("module-popular-events.php"); ?>

      <!-- Recommended Artists Slick -->
      <?php include("module-recommended-artists.php"); ?>

      <!-- Bottom Footer Ref -->
      <?php include("module-footer.php"); ?>

  </main>

  <!-- JS Scripts References -->
  <?php include("module-scripts.php"); ?>

  <script>

    // SPlide JS Script
    var splide = new Splide("#main-slider", {
      width: screen.width,
      heightRatio : 0.38,
      pagination: true,
      cover: true,
      autoplay: true,
      resetProgress: true,
      rewind: true
    });
    splide.mount();

    $(document).ready(function(){
      $('.your-class').slick({
        centerMode: true,
        centerPadding: '40px',
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 4000,
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
        ]
      });
    });

    $(document).ready(function(){
      $('.popular-events').slick({
        centerMode: true,
        centerPadding: '40px',

        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
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
        ]
      });
    });

    $(document).ready(function(){
      $('.recommended-artists').slick({
        centerMode: true,
        centerPadding: '80px',
        autoplay: true,
        autoplaySpeed: 4000,

        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
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
        ]
      });
    });

  </script>

</body>
</html>
