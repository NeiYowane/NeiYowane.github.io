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
  <title>Eventos</title>
</head>

  <!-- Menus SideBar Reference -->
  <?php include("menus.php"); ?>

  <!-- Extra Styles Reference -->
  <link rel="stylesheet" href="styles/extra-styles.css">

  <style>

    .tooltip {
      position: absolute;
      z-index: 1070;
    }

    .tooltip.fade.in {
      display: flex;
      top: -40px;
      left: -60px;
      bottom: 100%;
    }

  </style>

  <main>
    <div class="content-wrapper">
      <div class="container">

        <div class="px-2 px-md-5 py-2">
          <div class="row">
            <div class="col-6 py-2">
              <h2>Eventos</h2>
            </div>

            <div class="col-6 py-3 d-flex flex-row-reverse">
              <button type="button" class="btn btn-primary btn-new" data-toggle="tooltip" data-placement="top" title="Nuevo Evento" id="btnNuevoEvento" onclick="OpenModal('')"><i class="fa-solid fa-plus"></i></button>
            </div>

          </div>

          <div class="row">

            <!-- Example Event Placeholder I -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="card-title"><b>Titulo Evento I</b></h5>
                      <h6 class="text-muted">Estado: &nbsp;&nbsp;<span class="badge badge-success">Activo</span></h6>
                    </div>
                    <button type="button" class="btn btn-light" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa-solid fa-up-right-and-down-left-from-center"></i></button>
                  </div>

                  <div class="collapse" id="collapseExample">
                    <div class="row">
                      <div class="col-md-6">
                        <form>
                          <div class="form-group">
                            <label>Fecha:</label>
                            <input type="text" class="form-control" value="28/07/2022" disabled>
                          </div>
                          <div class="form-group">
                            <label>Hora:</label>
                            <input type="text" class="form-control" value="20:00" disabled>
                          </div>
                          <div class="form-group">
                            <label>Escenario:</label>
                            <input type="text" class="form-control" value="Coliseo Centenario" disabled>
                          </div>
                        </form>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Áreas: (Totales)</label>
                              <input type="text" class="form-control" value="5" disabled>
                            </div>
                            <div class="form-group">
                              <label>Asientos: (Totales)</label>
                              <input type="text" class="form-control" value="1,250" disabled>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Subáreas: (Totales)</label>
                              <input type="text" class="form-control" value="25" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Sinopsis:</label>
                          <textarea class="form-control" rows="3" disabled>Uno de los conciertos mas esperados, mijares sinfónico acompañados de la orquesta filarmónica del desierto, sin duda un evento de gala que no te puedes perder.</textarea>
                        </div>
                        <div class="form-group">
                          <label>Observaciones:</label>
                          <textarea class="form-control" rows="3" disabled>Uso obligatorio de cubrebocas.</textarea>
                        </div>
                        <div class="form-group">
                          <label>Etiquetas:</label>
                          <div>
                            <span class="badge badge-light">Musical</span>
                            <span class="badge badge-light">Pop</span>
                            <span class="badge badge-light">Rock</span>
                            <span class="badge badge-light">Cultural</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="#" class="card-link opcionEditar">Editar</a>
                  <a href="#" class="card-link">Ver Imagen</a>
                  <a href="#" class="card-link">Ver Mapa</a>
                  <a href="#" class="card-link">Desactivar</a>
                </div>
              </div>
            </div>
            <!-- / Example Event Placeholder I -->

            <!-- Example Event Placeholder II -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="card-title"><b>[Titulo-Evento]</b></h5>
                      <h6 class="text-muted">Estado: &nbsp;&nbsp;<span class="badge badge-danger">Inactivo</span></h6>
                    </div>
                    <button type="button" class="btn btn-light" data-toggle="collapse" data-target="#event-2" aria-expanded="false" aria-controls="event-2"><i class="fa-solid fa-up-right-and-down-left-from-center"></i></button>
                  </div>

                  <div class="collapse" id="event-2">
                    <div class="row">
                      <div class="col-md-6">
                        <form>
                          <div class="form-group">
                            <label>Fecha:</label>
                            <input type="text" class="form-control" value="[Fecha-Evento]" disabled>
                          </div>
                          <div class="form-group">
                            <label>Hora:</label>
                            <input type="text" class="form-control" value="[Hora-Evento]" disabled>
                          </div>
                          <div class="form-group">
                            <label>Escenario:</label>
                            <input type="text" class="form-control" value="[Escenario-Evento]" disabled>
                          </div>
                        </form>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Áreas: (Totales)</label>
                              <input type="text" class="form-control" value="[Areas-Evento]" disabled>
                            </div>
                            <div class="form-group">
                              <label>Asientos: (Totales)</label>
                              <input type="text" class="form-control" value="[Asientos-Evento]" disabled>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Subáreas: (Totales)</label>
                              <input type="text" class="form-control" value="[Subareas-Evento]" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Sinopsis:</label>
                          <textarea class="form-control" rows="3" disabled>[Sinopsis-Evento]</textarea>
                        </div>
                        <div class="form-group">
                          <label>Observaciones:</label>
                          <textarea class="form-control" rows="3" disabled>[Observaciones-Evento]</textarea>
                        </div>
                        <div class="form-group">
                          <label>Etiquetas:</label>
                          <div>
                            <span class="badge badge-light">[Etiqueta-I]</span>
                            <span class="badge badge-light">[Etiqueta-II]</span>
                            <span class="badge badge-light">[Etiqueta-III]</span>
                            <span class="badge badge-light">[Etiqueta-IV]</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="#" class="card-link">Editar</a>
                  <a href="#" class="card-link">Ver Imagen</a>
                  <a href="#" class="card-link">Ver Mapa</a>
                  <a href="#" class="card-link">Desactivar</a>
                </div>
              </div>
            </div>
            <!-- / Example Event Placeholder II -->

            <!-- Example Event Placeholder III -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="card-title"><b>[Titulo-Evento]</b></h5>
                      <h6 class="text-muted">Estado: &nbsp;&nbsp;<span class="badge badge-danger">Inactivo</span></h6>
                    </div>
                    <button type="button" class="btn btn-light" data-toggle="collapse" data-target="#event-3" aria-expanded="false" aria-controls="event-3"><i class="fa-solid fa-up-right-and-down-left-from-center"></i></button>
                  </div>

                  <div class="collapse" id="event-3">
                    <div class="row">
                      <div class="col-md-6">
                        <form>
                          <div class="form-group">
                            <label>Fecha:</label>
                            <input type="text" class="form-control" value="[Fecha-Evento]" disabled>
                          </div>
                          <div class="form-group">
                            <label>Hora:</label>
                            <input type="text" class="form-control" value="[Hora-Evento]" disabled>
                          </div>
                          <div class="form-group">
                            <label>Escenario:</label>
                            <input type="text" class="form-control" value="[Escenario-Evento]" disabled>
                          </div>
                        </form>
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label>Áreas: (Totales)</label>
                              <input type="text" class="form-control" value="[Areas-Evento]" disabled>
                            </div>
                            <div class="form-group">
                              <label>Asientos: (Totales)</label>
                              <input type="text" class="form-control" value="[Asientos-Evento]" disabled>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label>Subáreas: (Totales)</label>
                              <input type="text" class="form-control" value="[Subareas-Evento]" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Sinopsis:</label>
                          <textarea class="form-control" rows="3" disabled>[Sinopsis-Evento]</textarea>
                        </div>
                        <div class="form-group">
                          <label>Observaciones:</label>
                          <textarea class="form-control" rows="3" disabled>[Observaciones-Evento]</textarea>
                        </div>
                        <div class="form-group">
                          <label>Etiquetas:</label>
                          <div>
                            <span class="badge badge-light">[Etiqueta-I]</span>
                            <span class="badge badge-light">[Etiqueta-II]</span>
                            <span class="badge badge-light">[Etiqueta-III]</span>
                            <span class="badge badge-light">[Etiqueta-IV]</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="#" class="card-link">Editar</a>
                  <a href="#" class="card-link">Ver Imagen</a>
                  <a href="#" class="card-link">Ver Mapa</a>
                  <a href="#" class="card-link">Desactivar</a>
                </div>
              </div>
            </div>
            <!-- / Example Event Placeholder III -->
            <!-- Example Event Placeholder IV -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5 class="card-title"><b>[Titulo-Evento]</b></h5>
                      <h6 class="text-muted">Estado: &nbsp;&nbsp;<span class="badge badge-danger">Inactivo</span></h6>
                    </div>
                    <button type="button" class="btn btn-light" data-toggle="collapse" data-target="#event-4" aria-expanded="false" aria-controls="event-4"><i class="fa-solid fa-up-right-and-down-left-from-center"></i></button>
                  </div>

                  <div class="collapse" id="event-4">
                    <div class="row">
                      <div class="col-md-6">
                        <form>
                          <div class="form-group">
                            <label>Fecha:</label>
                            <input type="text" class="form-control" value="[Fecha-Evento]" disabled>
                          </div>
                          <div class="form-group">
                            <label>Hora:</label>
                            <input type="text" class="form-control" value="[Hora-Evento]" disabled>
                          </div>
                          <div class="form-group">
                            <label>Escenario:</label>
                            <input type="text" class="form-control" value="[Escenario-Evento]" disabled>
                          </div>
                        </form>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Áreas: (Totales)</label>
                              <input type="text" class="form-control" value="[Areas-Evento]" disabled>
                            </div>
                            <div class="form-group">
                              <label>Asientos: (Totales)</label>
                              <input type="text" class="form-control" value="[Asientos-Evento]" disabled>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Subáreas: (Totales)</label>
                              <input type="text" class="form-control" value="[Subareas-Evento]" disabled>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Sinopsis:</label>
                          <textarea class="form-control" rows="3" disabled>[Sinopsis-Evento]</textarea>
                        </div>
                        <div class="form-group">
                          <label>Observaciones:</label>
                          <textarea class="form-control" rows="3" disabled>[Observaciones-Evento]</textarea>
                        </div>
                        <div class="form-group">
                          <label>Etiquetas:</label>
                          <div>
                            <span class="badge badge-light">[Etiqueta-I]</span>
                            <span class="badge badge-light">[Etiqueta-II]</span>
                            <span class="badge badge-light">[Etiqueta-III]</span>
                            <span class="badge badge-light">[Etiqueta-IV]</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="#" class="card-link">Editar</a>
                  <a href="#" class="card-link">Ver Imagen</a>
                  <a href="#" class="card-link">Ver Mapa</a>
                  <a href="#" class="card-link">Desactivar</a>
                </div>
              </div>
            </div>
            <!-- / Example Event Placeholder IV -->

          </div>
        </div>
      </div>

      <!-- New Banner Modal -->
      <div class="modal fade" id="ModalEvento">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="card">
                <div class="card-body">
                  <!-- This is some text within a card body. -->
                  <form id="formEventosId">
                    <input id="op" type="text" name="op" value="" style="display:none;">
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
                          <input id="ImagenEventoId" name="ImagenEventoName" class="form-control" type="file" id="input-imagen" >
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label for="input-fecha">3. Fecha del Evento:</label>
                          <input id="FechaEventoId" name="FechaEventoName" type="date" class="form-control" id="input-fecha" required>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label for="input-hora">4. Hora del Evento:</label>
                          <input id="HoraEventoId" name="HoraEventoName" type="time" class="form-control" id="input-hora" required>
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
                          <select class="form-control" id="SelectEscenarioId" name="SelectEscenarioName" title="Selecciona el escenario" required>
                          </select>
                          <small class="form-text text-muted">(La Direccion del Evento se generara automaticamente en base al Escenario Seleccionado.)</small>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="mb-3">
                          <label for="input-escenario" class="form-label">8. Imagen del Escenario:</label>
                          <input class="form-control" type="file" id="ImagenEscenarioId" name="ImagenEscenarioName">
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label for="input-id-artista">9. Artistas:</label>
                          <select class="form-control" id="SelectArtistaId" name="SelectArtistaName[]" title="Selecciona los artistas" multiple required>
                          </select>
                          <small class="form-text text-muted">(Las Etiquetas del Evento se generaran automaticamente en base a los Artistas Seleccionados.)</small>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                    <!-- <button id="btnSiguiente" type="button" class="btn btn-primary">Siguiente</button> -->
                  </form>
                </div>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="AñadirEvento"></button>
            </div>
          </div>
        </div>
      </div>
      <!-- / New Banner Modal -->

    </div>
  </main>

  <!-- JS Scripts Reference -->
  <?php include("scripts.php"); ?>

  <!-- Index JS Reference -->
  <script src="scripts/index.js"></script>
  <script src="scripts/eventos.js" charset="utf-8"></script>

  <!-- Tooltip Script -->
  <script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    function OpenModal(){
      $("#ModalEvento").modal('toggle');
    }

    $('.opcionEditar').click(function(){
      $('#ModalEvento').modal('show');
    });
  </script>

  <!-- Bootstrap 5.2.0 Beta 1 JS Core -->
  <!-- <script src="styles/bootstrap-5.2.0-beta1-dist/js/bootstrap.min.js"></script> -->

  <!-- Bootstrap 5.2.0 Beta 1 Bundle JS Core -->
  <!-- <script src="styles/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>
