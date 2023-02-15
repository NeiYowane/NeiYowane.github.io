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
  <title>Registro de Géneros</title>

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
     #inputGenero:placeholder-shown {
          border: 0.5px solid black;
        }

     input:invalid {
          border: 1px solid red;
      }
      #inputGenero:valid {
        border: 0.5px solid black;
      }

   </style>

   <?php include("menus.php"); ?>

   <main>
     <div class="content-wrapper">
       <div class="container">

         <div class="px-2 px-md-5 py-2">
           <div class="row">
             <div class="col-6 py-2">
               <h2>Registo de Géneros</h2>
             </div>
             <div class="col-6 py-3 d-flex flex-row-reverse">
               <button class="btn btn-primary btn-new" id="btnNuevo" type="button" name="button" onclick="modalGen('')" data-toggle="tooltip" data-placement="left" title="Añadir Nuevo Género"><i class="fa-solid fa-square-plus"></i></button>
             </div>
           </div>
         </div>

           <div class="card card-outline card-dark shadow">
              <div class="card-body">
                <div class="table table-responsive">
                  <table id="tableGeneros" class="table table-striped table-bordered" >
                    <thead class="table-dark">
                      <tr>
                        <th>GÉNERO</th>
                        <th>FECHA ALTA</th>
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

            <div class="modal fade" id="modalGeneros" tabindex="-1" role="dialog" aria-labelledby="myModalLabels">
              <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Añadir Nuevo Género</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form id="FormGeneros" action="backend/Generos/App.php" method="post" enctype="multipart/form-data">
                    <input name="op" id="op" style="display:none">
                    <input name="id_genero" id="id_genero" style="display:none">
                    <div class="modal-body" style="text-align:center">
                      <div class="form-group row">
                        <div class="col-md-12">
                          <br>
                          <label>Nombre del Género:</label>
                          <input type="text" name="genero" id="inputGenero" value="" class="form-control InputPattern"  style="text-transform:capitalize" placeholder="Nombre del género..." required >
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" id="btnGeneros" value="">
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
 <script src="scripts/generos.js"></script>

 </body>
 </html>
