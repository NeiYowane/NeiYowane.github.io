<?php
  if(!isset($_COOKIE["sesion"])){
    header("location: login.php");
    die();
  };
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nuevo Evento</title>
</head>

  <!-- Menus SideBar Reference -->
  <?php include("menus.php"); ?>

  <!-- Extra Styles Reference -->
  <link rel="stylesheet" href="styles/extra-styles.css">

  <main>
    <div class="content-wrapper">
      <div class="container">

        <div class="pl-5 pr-5 pt-2 pb-2 rounded">
          <div class="row">
            <div class="col-6 float-start">
              <h3 id="tituloPagina">Nuevo Evento</h3>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <!-- This is some text within a card body. -->
            <form id="formEventosId">

              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="input-titulo">1. Titulo del Evento:</label>
                    <input id="TituloEventoId" name="TituloEventoName" type="text" class="form-control" id="input-titulo" required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <label for="input-imagen" class="form-label">2. Imagen del Evento:</label>
                    <input id="ImagenEventoId" name="ImagenEventoName" class="form-control" type="file" id="input-imagen" required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="input-fecha">3. Fecha del Evento:</label>
                    <input id="FechaEventoId" name="FechaEventoName" type="text" class="form-control" id="input-fecha" required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="input-hora">4. Hora del Evento:</label>
                    <input id="HoraEventoId" name="HoraEventoName" type="text" class="form-control" id="input-hora" required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="input-sinopsis">5. Sinopsis:</label>
                    <textarea class="form-control" id="SinopsisId" name="SinopsisName" rows="3" required></textarea>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="input-observaciones">6. Observaciones:</label>
                    <textarea class="form-control" id="ObservacionesId" name="ObservacionesName" rows="3" required></textarea>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="input-id-escenario">7. Escenario:</label>
                    <select class="form-control" id="SelectEscenarioId" name="SelectEscenarioName" title="Selecciona el escenario">
                    </select>
                    <small class="form-text text-muted">(La Direccion del Evento se generara automaticamente en base al Escenario Seleccionado.)</small>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="mb-3">
                    <label for="input-escenario" class="form-label">8. Imagen del Escenario:</label>
                    <input class="form-control" type="file" id="ImagenEscenarioId" name="ImagenEscenarioName" required>
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label for="input-id-artista">9. Artistas:</label>
                    <select class="form-control" id="SelectArtistaId" name="SelectArtistaName" title="Selecciona los artistas">
                    </select>
                    <small class="form-text text-muted">(Las Etiquetas del Evento se generaran automaticamente en base a los Artistas Seleccionados.)</small>
                  </div>
                </div>
              </div>
              <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> -->
              <button id="btnSiguiente" type="button" class="btn btn-primary">Siguiente</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- JS Scripts Reference -->
  <?php include("scripts.php"); ?>

  <!-- Index JS Reference -->
  <script src="scripts/index.js"></script>
  <script src="scripts/eventos.js" charset="utf-8"></script>

</body>
</html>
