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
   <title>Lista Artistas</title>
</head>
   <style media="screen">
   .tooltip_imagen, .tooltip_video {
     /* opacity:.5; */
     position: absolute;
     z-index: 99;
     }

     .tt_bancompleto {
     width: 15em;
     transform: translateY(-8.5em) translateX(-5.5em); /arriba de la imagen original/
     }

     .tt_banvertical {
     width: 10em;
     transform: translateY(-6.5em) translateX(5.5em); /a lado de la imagen original/
     }

      #imgArtista {
        border-radius:50%;
        transition: all 0.15s ease;
      }

      #imgArtista:hover {
        border-radius:10%;
        transition: all 0.2s ease;
        transform: scale(2.5);
      }

      /* #tableArtistas #btnBajaRow
      {
          text-align: center;
          vertical-align: middle;
      } */

      .tooltip {
        display: none;
        position: absolute;
        z-index: 1070;
      }

      .tooltip.fade.in {
        display: flex;
        top: -40px;
        left: -60px;
        bottom: 100%;
      }

      #tableArtistas_wrapper .row{
        max-width:100%;
      }
      #tableArtistas{
        max-width:100%;
      }

   </style>

   <?php include("menus.php"); ?>

   <main>
     <div class="content-wrapper">
       <div class="container">

         <div class="px-2 px-md-5 py-2">
           <div class="row">
             <div class="col-6 py-2">
               <h2 id="nombreArtista">Registro de Artistas</h2>
             </div>
             <div class="col-6 py-3 d-flex flex-row-reverse">
               <button class="btn btn-primary btn-new" id="btnNewArt" type="button" name="button" data-toggle="tooltip" data-placement="left" title="Añadir Nuevo Artista" onclick="modalArt('')"><i class="fa-solid fa-square-plus"></i></button>
             </div>
           </div>
         </div>

           <div class="card card-outline card-dark shadow">
            <div class="card-body">
              <div class="table-responsive">
                <table id="tableArtistas" class="table table-striped table-bordered" >
                  <thead class="table-dark">
                    <tr>
                      <th>ARTISTA</th>
                      <!-- <th></th> -->
                      <th>TIPO</th>
                      <th>FECHA ALTA</th>
                      <th>STATUS</th>
                      <th>OPCIONES</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="modal fade" id="modalArtistas" tabindex="-1" role="dialog" aria-labelledby="myModalLabels">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Añadir Nuevo Artista</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="FormArtistas" enctype="multipart/form-data">
                  <input name="op" id="op" style="display:none">
                  <input name="imagen" id="imagen" style="display:none">
                  <input name="idartista" id="idartista" style="display:none">
                  <div class="modal-body">
                    <div>

                      <div class="form-group">
                        <label for="inputArtista" class="col-form-label">Nombre del Artista:</label>
                        <input type="text" name="artista" id="inputArtista" style="text-transform:capitalize" class="form-control InputPattern" placeholder="Nombre del Artista..." required>
                      </div>

                      <div class="form-group">
                        <label for="inputFotoArt" class="col-form-label">Imagen del Artista:</label>
                        <input type="file" name="imagenArt" id="inputFotoArt">
                      </div>

                      <div class="form-group">
                        <label for="tipoArt" class="col-form-label">Tipo de Artista:</label>
                        <select id="tipoArt" name="tipoArt" required class="selectpicker" title="Selecciona uno..." data-header="Selecciona Tipo">
                          <option value="1">Solista</option>
                          <option value="2">Grupo</option>
                        </select>
                      </div>

                      <div class="form-group" id="generosDiv">
                        <label for="SelectGen" class="col-form-label">Género del Artista:</label>
                        <select id="SelectGen" name="Generos[]" required class="class1" multiple="multiple" data-max-options="4" title="Selecciona Maximo 4..." data-live-search="true" data-header="Selecciona Tipo" multiple data-selected-text-format="count > 2">
                           <option value-="">Select an option</option>
                        </select>
                      </div>

                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary btn-flat" id="btnArtistas" value="Registrar">
                  </div>
                </form>
              </div>
            </div>
          </div>

      </div>
     </div>
   </main>
   <?php include("scripts.php"); ?>
   <script src="scripts/index.js"></script>
   <script src="scripts/artistas.js"></script>
 </body>
 </html>
