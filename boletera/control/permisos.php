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
  <title>Permisos</title>

  <?php include("menus.php"); ?>

  <main>
    <div class="content-wrapper">
      <div class="container">

        <div class="px-2 px-md-5 py-2">
          <div class="row">
            <div class="col-6 py-2">
              <h2>Permisos</h2>
            </div>
          </div>
        </div>

        <div class="card card-outline card-dark shadow">
          <div class="card-body">

            <form id="formulario" enctype="multipart/form-data">
              <div class="row">
                <input type="hidden" id="accion" name="accion" value="">
                <input type="hidden" id="id" name="id" value=''>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="input_id_perfil" class="col-form-label font-weight-bold">1. Selecciona un Perfil:</label>
                      <select class="select2 form-control" style="width:100%" aria-label="Default select example" id="input_id_perfil" name="input_id_perfil">
                        <option value="-1">Selecciona una opción</option>
                      </select>
                  </div>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-md-4">
                  <label class="col-form-label font-weight-bold">2. Marca los Permisos:</label>
                </div>
                <div class="col-md-4">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="" id="input_permisos_todos" name="input_permisos_todos">
                    <label class="form-check-label h6" for="input_permisos_todos">
                      Marcar Todos
                    </label>
                  </div>
                </div>
              </div>

              <div id="permisos"></div>
              <hr>

              <button type="reset" class="btn btn-secondary font-weigt-bold" id="btn_reset_formulario">LIMPIAR</button>
              <button type="submit" class="btn btn-success font-weigt-bold" id="btn_enviar_formulario"><i class="fa fa-check" id="i_enviar_formulario" aria-hidden="true"></i> ACEPTAR</button>
            </form>

          </div>
        </div>

      </div>
    </div>
  </main>

  <?php include("scripts.php"); ?>
  <script src="scripts/index.js"></script>
  <script src="scripts/permisos.js"></script>
</body>
</html>
