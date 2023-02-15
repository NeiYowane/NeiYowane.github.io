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
  <title>Tipos de Escenarios</title>
</head>

  <!-- Menus SideBar Reference -->
  <?php include("menus.php"); ?>

   <style media="screen">
    #btnEditarTipos{
      transition: all 0.2s ease;
      margin-left:3%;
      margin-right:3%;
    }

    #btnEditarTipos:hover {
      border-radius: 50%;
      transform: scale(1.2);
    }

    #btnBajaTipos {
      transition: all 0.2s ease;
      margin-left:3%;
      margin-right:3%;
    }

    #btnBajaTipos:hover {
      border-radius: 50%;
      transform: scale(1.2);
      /* background-color: lightblue; */
    }

    /* #tableArtistas #btnBajaRow
    {
        text-align: center;
        vertical-align: middle;
    } */

    #TablaTipoEsc_wrapper .row{
      max-width:100%;
      padding-left: 15px;
    }
    #TablaTipoEsc{
      max-width:100%;
    }
    </style>

  <!-- Extra Styles Reference -->
  <link rel="stylesheet" href="styles/extra-styles.css">

  <main>
    <div class="content-wrapper">
      <div class="container">

        <div class="px-2 px-md-5 py-2">
          <div class="row">
            <div class="col-6 py-2">
              <h2>Tipos de Escenarios</h2>
            </div>
            <div class="col-6 py-3 d-flex flex-row-reverse">
              <button class="btn btn-primary btn-new" id="btnNuevo" type="button" name="button" onclick="modalGen('')" data-toggle="tooltip" data-placement="left" title="Añadir Nuevo Tipo de Escenario"><i class="fa-solid fa-square-plus"></i></button>
            </div>
          </div>
        </div>

          <!-- Card Table -->
          <div class="card card-outline shadow">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="TablaTipoEsc">
                  <thead class="table-dark">
                    <tr>
                      <th>TIPO</th>
                      <th>STATUS</th>
                      <th>ACCIONES</th>
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
          <div class="modal fade" id="ModalTipoEsc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTitulo"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="FormTipoEsc">
                    <input name="op" id="op" style="display:none">
                    <input name="id_tipoEsc" id="id_tipoEsc" style="display:none">
                    <div class="form-group">
                      <label for="inputTipoName" class="col-form-label">Tipo:</label>
                      <input type="text" class="form-control InputPattern" id="inputTipoName" name="tipoEsc">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="btnTipoEsc"></button>
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
  <script src="scripts/tipo_escenario.js"></script>

</body>
</html>
