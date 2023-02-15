$(document).ready(function(){
  cargarTablaFormulario();
});

var tabla = $('#tableCategorias').DataTable({
  "language": {
    "lengthMenu": "MOSTRAR _MENU_ REGISTROS POR PÁGINA",
    "zeroRecords": "NO HAY RESULTADOS PARA MOSTRAR",
    "info": "PÁGINA _PAGE_ DE _PAGES_",
    "infoEmpty": "NO HAY DATOS PARA MOSTRAR",
    "infoFiltered": "",
    "search": "BUSCAR"
  },
  "columnDefs": [{
    "className": "dt-center", "targets": "_all"
  }],
  "order": [],
  "bSort": false,
  "bPaginate":false,
  "bInfo":false,
});

function pintarTabla(ajaxResponse) {
   //Limpiar tabla
   $("table tbody").slideUp();
   tabla.clear().draw();
   let objResponse = ajaxResponse.Datos;
   // return console.log(objResponse);
   $.each(objResponse, function (i, objeto) {
      //Objeto
      let
         categoria = objeto.categoria,
         status = objeto.status == 1 ? 'Activo': 'No Activo',
         bandera_carrito = objeto.bandera_carrito == 1 ? 'Activo': 'No Activo',
         idcategoria = objeto.idcategoria,
         imagen = objeto.imagen == "" ? "<span>SIN IMAGEN</span>" : `<img src="../control/imgCategorias/${objeto.imagen}" class="img-fluid rounded shadow tooltip_imagen tt_bancompleto" data-id="${objeto.idmarca}" style="display:none;" /><img src='../control/imgCategorias/${objeto.imagen}' data-id="${objeto.idmarca}" class='td_img img-responsive' style='height:35; width:75px; border-radius:5px'/>`;

      ;
      //Campos
      let
         campo_categoria= `${categoria}`,
         campo_status = `${status}`,
         campo_bandera_carrito = `${bandera_carrito}`,
         campo_boton =
         `
         <td class='align-middle'>
          ${imagen}
         </td>`,
         subcategorias =
         `
         <td class='align-middle'>
          <button type="button" class="btn btn-dark" onclick=""><i class="fa-solid fa-list-tree"></i></button>
         </td>`,
         campo_boton1 =
         `
         <td class='align-middle'>
          <button type="button" class="btn btn-primary" onclick="EdoCategorias('${idcategoria}','${objeto.status}')"><i class="fa-solid fa-arrow-rotate-right"></i></button>
         </td>`,
          campo_boton2 =`
         <td class='align-middle'>
         <button type="button" class="btn btn-warning" onclick="modalCat('${idcategoria}')"><i class="fa-solid fa-pen-to-square"></i></button>
         </td>`
      ;
      //Dibujar Tabla
      tabla.row.add([
         campo_categoria,
         campo_status,
         campo_bandera_carrito,
         campo_boton,
         subcategorias,
         campo_boton1,
         campo_boton2
      ]).draw().node();
      tabla.columns.adjust().draw();
   });
   $("table tbody").slideDown('slow');
}

function cargarTablaFormulario(){
  var datasend = {
    op : "GetCategorias"
  };
  peticionRellenarTabla(url_modelo_marcas_app,datasend);
}

function EdoCategorias(idcategoria,status){
  var estado;
  if (status == "1") {
    estado = "0";
  }
  else {
    estado = "1";
  }
  var data = {
    op: "EdoCategorias",
    estado: estado,
    idcategoria:idcategoria
  };
  peticionAccion(url_modelo_marcas_app,data);
}

function rellenarFormulario(ajaxResponse){
 let objResponse = ajaxResponse.Datos[0];
 $("#inputCategoria").val(objResponse.categoria);
 bcarrito = objResponse.bandera_carrito;
 if (bcarrito == "1") {
   $("#SiCat").prop("checked", true);
 }else{
   $("#NoCat").prop("checked", true);
 }
 $("#slcFamilia").val(objResponse.id_clasificaciones);
 $("#imagen").val(objResponse.imagen);
}

function modalCat(idCategoria){
  if (idCategoria != '') {
    $("#btnCategorias").val("Actualizar");
    $("#op").val("actualizaCategoria");
    $("#idcategoria").val(idCategoria);
    var data = {
      op: "GetCategoria",
      idCategoria: idCategoria
    };
    peticionEditarObjeto(url_modelo_marcas_app,data);
  }
  else {
    $("#op").val("insertaCategoria");
    $("#inputCategoria").val("");
    $("#idcategoria").val("");
    $("#imagen").val("");
    $("#btnCategorias").val("Registrar");
  }
  $("#modalCategorias").modal('toggle');
}

$("#btnCategorias").click(function (event) {
  if (document.getElementById("FormCategoria").checkValidity()) {
    event.preventDefault();
    var op = $("#op").val();
    var form = $('#FormCategoria')[0];
    var data = new FormData(form);
    $("#btnCategorias").prop("disabled",true);
    peticionAccionArchivo(url_modelo_marcas_app,data);
    $("#modalCategorias").modal('hide');
    $("#btnCategorias").prop("disabled",false);
  }
});


$(`.tooltip_imagen`).fadeOut(1);

$(".td_img").hover(function () {
      // over
      console.log("dentro");
      let id = $(this).attr("data-id");
      let tooltip_imagen = $(`img[data-id='${id}'].tooltip_imagen`)
      tooltip_imagen.fadeIn("fast");
   }, function () {
      // out
      console.log("fuera");
      let id = $(this).attr("data-id");
      let tooltip_imagen = $(`img[data-id='${id}'].tooltip_imagen`)
      tooltip_imagen.fadeOut("fast");
   }
);
