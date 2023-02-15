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
  <title>Usuarios</title>

  <?php include("menus.php"); ?>

  <div class="content-wrapper">
    <div class="container">

      <div class="px-2 px-md-5 py-2">
        <div class="row">
          <div class="col-6 py-2">
            <h2>Usuarios Internos</h2>
          </div>
        </div>
      </div>


    <section class="content">
       <div class="row">
          <div class="col-md-8">
             <!-- card Tabla -->
             <div class="card card-outline card-dark shadow">
                <div class="card-body">
                   <!-- tabla -->
                   <table id="tabla_usuarios" class="table table-hover text-center" style="width:100%">
                      <thead class="thead-dark">
                         <tr>
                            <th>USUARIO</th>
                            <th>TIPO</th>
                            <th>ACCIONES</th>
                         </tr>
                      </thead>
                      <tbody></tbody>
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
                   <div class="text-center font-weight-bolder lead">Añadir/Editar Usuario</div>
                </div>
                <div class="card-body">
                   <form id="formulario">
                      <input type="hidden" id="id" name="id" value="">
                      <input type="hidden" id="accion" name="accion" value="">
                      <div class="form-group">
                         <label for="input_usuario">Usuario <span class="text-danger font-weight-bolder">*</span></label>
                         <input type="text" class="form-control" id="input_usuario" name="input_usuario" placeholder="Nombre de usuario" autofocus>
                      </div>
                      <div class="form-group">
                         <label for="input_pwd">Contraseña <span class="text-danger font-weight-bolder">*</span></label>
                         <input type="password" class="form-control" id="input_pwd" name="input_pwd" placeholder="Contraseña" autofocus>
                      </div>
                      <div class="form-group">
                         <label for="input_id_perfil" class="col-form-label fw-bold">Perfil <span class="text-danger font-weight-bolder">*</span></label>
                         <select class="select2 form-control" style="width:100%" aria-label="Default select example" id="input_id_perfil" name="input_id_perfil">
                            <option value="-1">Selecciona una opción</option>
                         </select>
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
<script src="scripts/usuarios.js"></script>
</body>
</html>
