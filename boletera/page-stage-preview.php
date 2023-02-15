<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selección de Asientos</title>

  <!-- Styles CSS Reference -->
  <?php include("module-styles.php"); ?>

  <!-- List Groups CSS -->
  <link rel="stylesheet" href="styles/list-groups.css" />

  <style>
    div.gfg {
      overflow: auto;
      text-align:justify;
      max-height: 400px;
    }
    #main{
      max-height: 100%;
      margin: auto;
    }
  </style>

</head>
<body class="bg-light">

  <!-- Top NavBar Reference -->
  <?php include("module-navbar.php"); ?>

  <main>

    <div class="container" id="main">

      <!-- Content -->
      <section class="text-center container">
        <div class="row py-4">
          <div class="mx-auto">
            <h1 class="fw-light">Titulo del Evento</h1>
            <h4 class="fw-light">Nombre del Artista/Grupo | Fecha del Evento | Lugar del Evento</h4>
          </div>
        </div>

        <div class="row mx-auto g-4">

          <!-- Stage Column -->
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header">
                Escenario
              </div>
            </div>
            <figure class="figure">
              <img src="img/test-media/test-stage-02.png" class="figure-img img-fluid rounded" alt="...">
            </figure>
          </div>
          <!-- / Stage Column -->

          <!-- Column I -->
          <div class="col-12 col-md-6">
            <div class="card">
              <div class="card-header">
                Secciones
              </div>
            </div>
            <div class="gfg">
              <div class="list-group list-group-checkable gap-2 border-0 w-auto">
                <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios1" value="" checked>
                <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios1">
                  Sección A
                  <span class="d-block small opacity-50">Descripción I.</span>
                </label>

                <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios2" value="">
                <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios2">
                  Sección B
                  <span class="d-block small opacity-50">Descripción II.</span>
                </label>

                <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios3" value="">
                <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios3">
                  Sección C
                  <span class="d-block small opacity-50">Descripción III.</span>
                </label>

                <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios4" value="" disabled>
                <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios4">
                  Sección D
                  <span class="d-block small opacity-50">Sin boletos disponibles.</span>
                </label>

                <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios5" value="">
                <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios5">
                  Sección E
                  <span class="d-block small opacity-50">Descripción IV.</span>
                </label>

                <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios6" value="">
                <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios6">
                  Sección F
                  <span class="d-block small opacity-50">Descripción V.</span>
                </label>

                <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios7" value="">
                <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios7">
                  Sección G
                  <span class="d-block small opacity-50">Descripción V.</span>
                </label>

                <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios8" value="">
                <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios8">
                  Sección H
                  <span class="d-block small opacity-50">Descripción V.</span>
                </label>

                <input class="list-group-item-check pe-none" type="radio" name="listGroupCheckableRadios" id="listGroupCheckableRadios9" value="">
                <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios9">
                  Sección I
                  <span class="d-block small opacity-50">Descripción V.</span>
                </label>
              </div>
            </div>
          </div>
          <!-- / Column I -->

        </div>

      </section>
    </div>

    <?php include("module-footer.php"); ?>

  </main>

  <?php include("module-scripts.php"); ?>

</body>
</html>
