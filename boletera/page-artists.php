<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artistas</title>

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
            <h1 class="fw-light">Artistas</h1>
            <p class="lead text-muted">Conoce a nuestros artistas afiliados.</p>
            <?php include("module-search-bar.php"); ?>
          </div>
        </div>
      </section>
      <!-- / Search Bar -->

    </div>

      <!-- Card Album -->
      <div class="album pb-4">

          <!-- Slick Container -->
          <div class="your-class" id="ArtistContainer">

          </div>
          <!-- / Slick Container -->

      </div>
      <!-- / Card Album -->

      <!-- Artist Tables -->
      <div class="container px-md-5">
        <div class="container px-md-5">

          <div class="collapse" id="collapseExample">
            <div class="card card-body" id="cardTable">
              <div class="text-center pb-4">
                <h5 class="card-title">Eventos de [Artista]</h5>
                <h6 class="card-subtitle mb-2 text-muted">([0] Resultados)</h6>
              </div>
              <div class="table-responsive">
                <table class="table table-striped" id="artistEvents">
                  <thead>
                    <tr>
                      <th scope="col">TITULO</th>
                      <th scope="col">FECHA</th>
                      <th scope="col">LUGAR</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Titulo I</th>
                      <td>27 de Julio, 2022</td>
                      <td>Coliseo Centenario, Torreón</td>
                      <td><a href="#" class="link-primary"><b>Ver Evento</b></a></td>
                    </tr>
                    <tr>
                      <th scope="row">Titulo II</th>
                      <td>[Fecha Evento]</td>
                      <td>[Lugar Evento]</td>
                      <td class="text-muted">No Disponible</td>
                    </tr>
                    <tr>
                      <th scope="row">Titulo III</th>
                      <td>[Fecha Evento]</td>
                      <td>[Lugar Evento]</td>
                      <td class="text-muted">No Disponible</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- / Artist Tables -->

      <?php include("module-footer.php"); ?>

  </main>

  <?php include("module-scripts.php"); ?>

  <script src="scripts/index.js" charset="utf-8"></script>
  <script src="scripts/Artistas.js" charset="utf-8"></script>

  <!-- Collapse Button & Scroll to Table -->
  <script>
    const collapseElementList = document.querySelectorAll('.collapse')

    function myFunction(){
      // document.getElementById("endTable").scrollIntoView();
      $('html,body').animate({ scrollTop: 9999 },'fast');
    }

  </script>


</body>
</html>
