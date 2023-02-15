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
  <title>Banderas</title>
</head>

  <!-- Menus SideBar Reference -->
  <?php include("menus.php"); ?>

  <!-- Extra Styles Reference -->
  <link rel="stylesheet" href="styles/extra-styles.css">

  <style>
  .BannerZoom {
    transition: all 0.15s ease;
  }

  .BannerZoom:hover {
    transition: all 0.2s ease;
    transform: scale(4.0);
  }

  #TablaBanderas_wrapper .row{
    max-width:100%;
  }
  #TablaBanderas{
    max-width:100%;
  }
  </style>

  <main>
    <div class="content-wrapper">
      <div class="container">

        <div class="pt-2">
          <div class="row">

            <div class="col-12 col-md-6">
              <div class="card">
                <div class="card-header">
                  <b>Banderas</b>
                </div>
                <div class="card-body">
                  <div class="text-right mb-3" id="divBotones">
                    <button type="button" class="btn btn-primary btn-new" data-toggle="tooltip" data-placement="top" data-original-title="Añadir Nueva Bandera" title="Añadir Nueva Bandera" id="BtnBanderas" onclick="OpenModal('')"><i class="fa-solid fa-plus"></i></button>
                    <button type="button" class="btn btn-secondary btn-anim" data-toggle="tooltip" data-placement="top" id="btnSaveOrder" title="Guardar Cambios" ><i class="fa-solid fa-floppy-disk"></i></button>
                  </div>

                  <div class="table-responsive">
                    <table class="table" id="TablaBanderas">
                      <thead>
                        <tr>
                          <th scope="col"  name="orden" id="orden">POSICION</th>
                          <th scope="col" name="id" id="id">ID</th>
                          <th scope="col"  name="orden" id="orden"><i class="fa-solid fa-up-down"></i></th>
                          <th scope="col">TITULO</th>
                          <th class="text-center" scope="col">IMAGEN</th>
                          <th class="text-center" scope="col">ESTADO</th>
                          <th class="text-right" scope="col"></th>
                          <th class="text-right" scope="col"></th>
                          <th class="text-right" scope="col"></th>
                        </tr>
                      </thead>
                      <tbody id="TBodyBanderas">
                        <!-- 11) Vaciar la tabla -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <!-- New Banner Modal -->
            <div class="modal fade" id="ModalBanderas" tabindex="-1" aria-labelledby="ModalBandera" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Añadir Nueva Bandera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="FormBanderas">
                      <input name="op" id="op" style="display:none">
                      <input name="imagen" id="imagen" style="display:none">
                      <input name="idbandera" id="idbandera" style="display:none">
                      <!-- Title Input -->
                      <div class="form-group">
                        <label for="inputNombreEsc" class="col-form-label">Titulo:</label>
                        <!-- <input type="text" name="InputNombre" id="InputNombre" style="text-transform:capitalize" class="form-control InputPattern" placeholder="Nombre del Artista..." required> -->
                        <input type="text" class="form-control InputPattern" required placeholder="Titulo" id="InputNombre" name="InputNombre" />
                      </div>
                      <!-- Image Input -->
                      <div class="form-group">
                        <label for="InputImagenEscenario">Imagen:</label>
                        <span id="spanImage"></span>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" val="" id="InputImagen" name="InputImagen" >
                            <label class="custom-file-label" for="inputGroupFile01">Elige tu archivo...</label>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" id="AddBanner">Añadir</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / New Banner Modal -->

            <div class="col-12 col-md-6">
              <div class="card">
                <div class="card-header">
                  <b>Previsualización</b>
                </div>
                <div class="card-body">

                  <!-- Splide -->
                  <section id="main-slider" class="splide" aria-label="My Awesome Gallery">
                    <div class="splide__track">
                      <ul class="splide__list" id="SplidePreview">
                        <!-- <li class="splide__slide">
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
                        </li> -->
                      </ul>
                    </div>

                    <div class="splide__progress">
                      <div class="splide__progress__bar">
                      </div>
                    </div>
                  </section>
                  <!-- / Splide -->

                </div>
                <div class="card-footer text-muted">
                  Resolución Recomendada: 1920x730
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
  </main>

  <!-- JS Scripts Reference -->
  <?php include("scripts.php"); ?>

  <!-- Index JS Reference -->
  <script src="scripts/index.js"></script>

  <!-- Banderas JS Reference -->
  <script src="scripts/banderas.js"></script>

</body>
</html>
