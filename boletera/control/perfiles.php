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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perfiles</title>


  <?php include("menus.php"); ?>
  <div class="content-wrapper">
    <div class="container">

      <div class="px-2 px-md-5 py-2">
        <div class="row">
          <div class="col-6 py-2">
            <h2>Perfiles</h2>
          </div>
        </div>
      </div>

    <section class="content">
       <div class="row">
          <div class="col-md-8">
             <div class="card card-outline card-dark shadow">
                <div class="card-body">
                   <table id="tabla_perfiles" class="table table-hover text-center" style="width:100%">
                      <thead class="thead-dark">
                         <tr>
                            <th>PERFIL</th>
                            <th></th>
                         </tr>
                      </thead>
                      <tbody></tbody>
                      <tfoot>
                         <tr class="thead-dark">
                            <th>PERFIL</th>
                            <th></th>
                         </tr>
                      </tfoot>
                   </table>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <div class="card card-outline card-dark shadow">
                <div class="card-header">
                   <div class="text-center font-weight-bolder lead">Información de Perfil</div>
                </div>
                <div class="card-body">
                   <form id="formulario">
                      <input type="hidden" id="id" name="id" value="">
                      <input type="hidden" id="accion" name="accion" value="">
                      <div class="form-group">
                         <label for="input_perfil">Perfil <span class="text-danger font-weight-bolder">*</span></label>
                         <input type="text" class="form-control" id="input_perfil" name="input_perfil" placeholder="Nombre de usuario" autofocus>
                      </div>

                      <div class="mt-4 btn-group mr-2 float-right" role="group">
                         <button type="reset" class="btn btn-outline-danger font-weigt-bold" id="btn_reset_formulario"><i class="fa fa-ban" id="i_reset_formulario" aria-hidden="true"></i> CANCELAR</button>
                         <button type="submit" class="btn btn-success font-weigt-bold" id="btn_enviar_formulario"><i class="fa fa-check" id="i_enviar_formulario" aria-hidden="true"></i> ACEPTAR</button>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </section>
  </div>
</div>
<?php include("scripts.php"); ?>
<script src="scripts/index.js"></script>
<script src="scripts/<? echo basename(__FILE__, '.php') ?>.js"></script>
</body>
</html>
