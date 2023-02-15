<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
   $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   header("Location: $redirect_url");
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include("estilos.php"); ?>
   <title>Recidencia | <? echo basename(__FILE__, '.php') ?> </title>
</head>

<body class="nav-md">
   <div class="container body">
      <?php include("menus.php"); ?>
      <div class="right_col" role="main">
         <!-- CONTENIDO PAGINA -->

         <!-- Main content -->
         <section class="content">

            <div class="row">
               <div class="col-md-8">
                  <!-- card Tabla -->
                  <div class="card card-outline card-dark shadow">
                     <div class="card-body">
                        <!-- tabla -->
                        <table id="tabla_modulos" class="table table-hover text-center" style="width:100%">
                           <thead class="thead-dark">
                              <tr>
                                 <th>MÓDULO</th>
                                 <th>NIVEL</th>
                                 <th>PERTENECE A</th>
                                 <th>URL</th>
                                 <th>ORDEN</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody></tbody>
                           <tfoot>
                              <tr class="thead-dark">
                                 <th>MÓDULO</th>
                                 <th>NIVEL</th>
                                 <th>PERTENECE A</th>
                                 <th>URL</th>
                                 <th>ORDEN</th>
                                 <th></th>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.card Tabla -->
               </div>


               <div class="col-md-4">
                  <!-- card Formulario -->
                  <div class="card card-outline card-dark shadow">
                     <div class="card-header">
                        <div class="text-center font-weight-bolder lead">Información de Módulo</div>
                     </div>
                     <div class="card-body">
                        <!-- Formulario -->
                        <form id="formulario">
                           <input type="hidden" id="id" name="id" value="">
                           <input type="hidden" id="accion" name="accion" value="">
                           <div class="form-group">
                              <label for="input_descripcion">Módulo <span class="text-danger font-weight-bolder">*</span></label>
                              <input type="text" class="form-control" id="input_descripcion" name="input_descripcion" placeholder="Nombre del Módulo" autofocus>
                           </div>
                           <div class="form-group">
                              <label for="input_id_padre" class="col-form-label fw-bold">Pertenece a <span class="text-danger font-weight-bolder">*</span></label>
                              <select class="select2 form-control" style="width:100%" aria-label="Default select example" id="input_id_padre" name="input_id_padre">
                                 <option value="-1">Selecciona una opción</option>
                                 <option value="0">*** Módulo Padre ***</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="input_url">URL <span class="text-danger font-weight-bolder">*</span></label>
                              <input type="text" class="form-control" id="input_url" name="input_url" placeholder="Nombre del archivo.php">
                           </div>
                           <div class="form-group">
                              <label for="input_orden">Posición <span class="text-danger font-weight-bolder">*</span></label>
                              <input type="number" min="0" class="form-control" id="input_orden" name="input_orden" placeholder="Posición">
                           </div>
                           <!-- <div class="custom-control custom-checkbox my-1 mr-sm-2">
                              <input type="checkbox" class="custom-control-input" id="input_habilitado" name="input_habilitado" checked>
                              <label class="custom-control-label pt-1" for="input_habilitado">HABILITADO</label>
                           </div> -->

                           <div class="mt-4 btn-group mr-2 float-right" role="group">
                              <button type="reset" class="btn btn-outline-danger font-weigt-bold" id="btn_reset_formulario"><i class="fa fa-ban" id="i_reset_formulario" aria-hidden="true"></i> CANCELAR</button>
                              <button type="submit" class="btn btn-success font-weigt-bold" id="btn_enviar_formulario"><i class="fa fa-check" id="i_enviar_formulario" aria-hidden="true"></i> ACEPTAR</button>
                           </div>
                        </form>
                     </div>
                     <!-- /.card-body -->
                  </div>
                  <!-- /.card Formulario -->
               </div>
            </div>

         </section>
         <!-- /.content -->

         <!-- CONTENIDO PAGINA -->
      </div>
      <?php include("footer.php"); ?>
   </div>   
</div>
<?php include("scripts.php"); ?>

<script src="scripts/index.js"></script>
<script src="scripts/modulos.js"></script>
</body>

</html>