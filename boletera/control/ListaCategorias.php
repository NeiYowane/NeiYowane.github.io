<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Marcas</title>

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
  <div class="content-wrapper pl-1 pr-1">
    <br><br>
    <div class="card">
      <div class="pl-5 pr-5 pt-2 pb-2 rounded">

        <div class="row">
          <div class="col-6 float-start">
            <h4>Listado Categorias</h4>
          </div>
          <div class="col-6 text-right">
            <button class="btn btn-primary" type="button" name="button" onclick="modalCat('')"><i class="fa-solid fa-square-plus"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-outline card-dark shadow">
       <div class="card-body">
         <div class="table table-responsive">
           <table id="tableCategorias" class="table" >
             <thead class="table-dark">
               <tr>
                 <th>Categoria</th>
                 <th>Status</th>
                 <th>Status carrito</th>
                 <th></th>
                 <th>Subcategorias</th>
                 <th>Cambiar Status</th>
                 <th>Editar</th>
               </tr>
             </thead>
             <tbody>

             </tbody>
           </table>
         </div>
       </div>
     </div>

     <div class="modal fade" id="modalCategorias" tabindex="-1" role="dialog" aria-labelledby="myModalLabels">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
           <form id="FormCategoria" action="backend/Categorias/App.php" method="post" enctype="multipart/form-data">
             <input name="op" id="op" style="display:none">
             <input name="imagen" id="imagen" style="display:none">
             <input name="idcategoria" id="idcategoria" style="display:none">
             <div class="modal-body" style="text-align:center">
               <div class="form-group row">
                 <div class="col-md-6">
                   <br>
                   <label>Nombre de la categoría</label>
                   <input type="text" name="categoria" id="inputCategoria" class="form-control" placeholder="Nombre de la categoria" required>
                 </div>
                 <div class="col-md-6">
                   <br>
                   <label>¿Desea que la categoria aparezca en el carrito?</label>
                   <input type="radio" id="SiCat" name="bandera_carrito" value="1" checked>
                   <label for="SiCat">Si</label>
                   <input type="radio" id="NoCat" name="bandera_carrito" value="0">
                   <label for="NoCat">No</label>
                 </div>
                 <div class="col-md-6">
                   <br>
                   <input type="file" name="imagenCat">
                 </div>
               </div>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cerrar</button>
               <input type="submit" class="btn btn-primary btn-flat" id="btnCategorias" value="Registrar">
             </div>
           </form>
         </div>
       </div>
     </div>
  </div>
</div>
<?php include("scripts.php"); ?>
<script src="scripts/index.js"></script>
<script src="scripts/categorias.js"></script>
</body>
</html>
