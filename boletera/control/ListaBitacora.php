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
   <title>Bitacora de Cambios</title>

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
   </style>

   <?php include("menus.php"); ?>

   <main>
     <div class="content-wrapper">
       <div class="container">

         <div class="px-2 px-md-5 py-2">
            <div class="col-6 py-2">
              <h2>Bitácora de Cambios</h2>
            </div>
          </div>

             <div class="card card-outline card-dark shadow">
                <div class="card-body">
                  <div class="table table-responsive">
                    <table id="tableBitacora" class="table table-striped table-bordered" >
                      <thead class="table-dark">
                        <tr>
                          <th>ACCIÓN</th>
                          <th>DESCRIPCIÓN</th>
                          <th>FECHA</th>
                          <th>USUARIO</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </main>
      <?php include("scripts.php"); ?>
   <script src="scripts/index.js"></script>
   <script src="scripts/bitacora.js"></script>
 </body>
 </html>
