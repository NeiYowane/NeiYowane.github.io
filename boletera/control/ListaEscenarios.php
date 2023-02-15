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
  <title>Escenarios</title>
</head>

  <!-- Menus SideBar Reference -->
  <?php include("menus.php"); ?>

  <!-- Extra Styles Reference -->
  <link rel="stylesheet" href="styles/extra-styles.css">

  <style>

  #btnEditarEsc {
    transition: all 0.2s ease;
    margin:2%;
    background-color: rgba(255,193,7,255);
    border-color: rgba(255,193,7,255);
  }

  #btnEditarEsc:hover {
    border-radius: 50%;
    transform: scale(1.2);
    background-color: rgba(255,193,7,255);
    border-color: rgba(255,193,7,255);
  }

  #btnBajaEsc {
    margin-top: auto;
    transition: all 0.2s ease;
    margin:2%;
    background-color: rgba(25, 177, 235, 255);
    border-color: rgba(25, 177, 235, 255);
  }

  #btnBajaEsc:hover {
    border-radius: 50%;
    transform: scale(1.2);
    background-color: rgba(25, 177, 235, 255);
    border-color: rgba(25, 177, 235, 255);
  }

  #btnPhotoEsc {
    margin-top: auto;
    transition: all 0.2s ease;
    margin:2%;
    /* background-color: rgba(25, 177, 235, 255);
    border-color: rgba(25, 177, 235, 255); */
  }

  #btnPhotoEsc:hover {
    border-radius: 50%;
    transform: scale(1.2);
    /* background-color: rgba(25, 177, 235, 255);
    border-color: rgba(25, 177, 235, 255); */
  }

  #TablaEscenarios_wrapper .row{
    max-width:100%;
    padding-left: 15px;
  }
  #TablaEscenarios{
    max-width:100%;
  }

  #TablaEscenarios_previous, #TablaEscenarios_next{
    font-size: 10px;

  }

  #TablaEscenarios_paginate span a{
    margin-top: 3px;
    font-size: 12px;
    color: black;
    padding: 10px 15px;
    text-decoration: none;
  }

  #TablaEscenarios_paginate span a.current{
    background-color: lightblue;
    color: white;
    border-radius: 5px;
  }

  #TablaEscenarios_paginate span a:hover:not(.current){
    background-color: #ddd;
    border-radius: 5px;
  }

  </style>

  <main>
    <div class="content-wrapper">
      <div class="container">

        <div class="px-2 px-md-5 py-2">
          <div class="row">
            <div class="col-6 py-2">
              <h2>Escenarios</h2>
            </div>
            <div class="col-6 py-3 d-flex flex-row-reverse">
              <button class="btn btn-primary btn-new" id="btnNuevoEscenarios" type="button" name="button" onclick="modalEsc('')" data-toggle="tooltip" data-placement="left" data-toggle="modal" data-target="#NuevoModal" title="Añadir Nuevo Escenario"><i class="fa-solid fa-square-plus"></i></button>
            </div>
          </div>
        </div>

          <!-- Card Table -->
          <div class="card card-outline shadow">
            <div class="card-body" id="ContTable">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="TablaEscenarios">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">NOMBRE</th>
                      <th scope="col">DIRECCION</th>
                      <th scope="col">TIPO</th>
                      <th scope="col">CAPACIDAD</th>
                      <th scope="col">STATUS</th>
                      <th scope="col">ACCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- / Card Table -->

          <!-- New Stage Modal -->
          <div class="modal fade" id="ModalEscenarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalEscTitulo">Añadir nuevo Escenario:</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formEscenario">
                    <input name="idEscenarioHidden" id="idEscenarioHidden" style="display:none">
                    <input name="op" id="op" style="display:none">
                    <input name="estructura" id="estructura" style="display:none">
                    <input name="imgEscenario" id="imgEscenario" style="display:none">
                    <!-- Name & Type Input -->
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="inputNombreEsc" class="col-form-label">Nombre:</label>
                          <input type="text" value="" class="form-control InputPattern" id="inputNombreEsc" name="inputNombreEsc" required>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="inputTipoEsc" class="col-form-label">Tipo de Escenario:</label>
                          <select class="form-control" id="inputTipoEsc" name="TipoEscenario" required title="Selecciona uno..." data-header="Selecciona Tipo"  data-live-search="true">
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- Direction Input -->
                    <div class="form-group">
                      <label for="inputDireccionEsc" class="col-form-label InputPattern">Dirección:</label>
                      <textarea class="form-control" id="inputDireccionEsc" name="inputDireccionEsc" required></textarea>
                    </div>
                    <!-- Capacity Input -->
                    <div class="form-group">
                      <label for="recipient-capacity" class="col-form-label">Capacidad:</label>
                      <div>
                        <div class="row">
                          <div class="col-9">
                            <input type="range" min="100" max="100000" value="1000" step="100" class="form-control" id="rangeInput" required>
                          </div>
                          <div class="col-3">
                            <input type="number" min="100" max="100000" required value="1000" step="100" class="form-control" id="EscenarionumberInput" name="EscenarionumberInput" placeholder="Capacidad" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Image Input -->
                    <div class="form-group">
                      <label for="InputImagenEscenario" class="col-form-label">Imagen:</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input"  id="InputImagenEscenario" name="InputImagenEscenario"
                            aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="inputGroupFile01">Elige tu archivo...</label>
                        </div>
                      </div>
                    </div>
                    <!-- Structure Input -->
                    <div class="form-group">
                      <label for="InputStructureEscenario" class="col-form-label">Estructura:</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input"  id="InputStructureEscenario"name="InputStructureEscenario"
                            aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label"  for="inputGroupFile01">Elige tu archivo...</label>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="btnEscenarios">Añadir</button>
                </div>
              </div>
            </div>
          </div>
          <!-- / New Stage Modal -->

      </div>
    </div>
  </main>

  <!-- JS Scripts Reference -->
  <?php include("scripts.php"); ?>

  <!-- Index JS Reference -->
  <script src="scripts/index.js"></script>
  <script src="scripts/escenarios.js"></script>

</body>
</html>
