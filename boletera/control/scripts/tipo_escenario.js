$(document).ready(function(){
  cargarTablaFormulario();

  $(function () {
      $('[data-toggle="tooltip"]').tooltip({
          container: 'body'
      })
  })
});

// var tabla = $('#TablaTipoEsc').DataTable({
//   "language": {
//     "lengthMenu": "MOSTRAR _MENU_ REGISTROS POR PÁGINA",
//     "zeroRecords": "NO HAY RESULTADOS PARA MOSTRAR",
//     "info": "PÁGINA _PAGE_ DE _PAGES_",
//     "infoEmpty": "NO HAY DATOS PARA MOSTRAR",
//     "infoFiltered": "",
//     "search": "BUSCAR"
//   },
//   "columnDefs": [{
//     "className": "dt-center", "targets": "_all"
//   }],
//   "order": [],
//   "bSort": false,
//   "bPaginate":false,
//   "bInfo":false,
// });


var tabla = $('#TablaTipoEsc').DataTable({
  responsive: true,
  language: {
    "lengthMenu": "MOSTRAR _MENU_ TIPOS DE ESCENARIOS POR PÁGINA",
    "zeroRecords": "NO HAY RESULTADOS PARA MOSTRAR",
    "info": "PÁGINA _PAGE_ DE _PAGES_",
    "infoEmpty": "NO HAY DATOS PARA MOSTRAR",
    "infoFiltered": "",
    "search": "BUSCAR: "
  },
  "columnDefs": [{
    "className": "dt-center", "targets": "_all"
  }],
  dom: '<"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',
  lengthMenu: [
    [
      5,
      10,
      50,
      100,
       -1
    ],
    [
      5,
      10,
      50,
      100,
      "Todos"
    ]
  ],
  pageLength: 10,
  deferRender: true,
  aaSorting: [], //deshabilitar ordenado automatico
});


function cargarTablaFormulario(){
  var datasend = {
    op : "GetTiposEsc"
  };
  peticionRellenarTabla(url_modelo_tipo_esc_app,datasend);
}

function pintarTabla(ajaxResponse) {
   //Limpiar tabla
   $("table tbody").slideUp();
   tabla.clear().draw();
   let objResponse = ajaxResponse.Datos;
   console.log(objResponse);
   $.each(objResponse, function (i, objeto) {
     console.log(objeto.estatus);
      // Objeto
      let
         idTipo = objeto.id,
         tipo = objeto.tipo,
         status = objeto.estatus == 1 ? '<span class="badge badge-success rounded-pill d-inline">Activo</span>':'<span class="badge badge-danger rounded-pill d-inline">Inactivo</span>'
      ;
      //Campos
      let
         campo_tipo= `${tipo}`,
         campo_status = `${status}`,
         campo_botones =
         `
         <td class='align-middle'>
          <button type="button"  class="btn btn-primary ml-1" id="btnBajaTipos" onclick="EdoGenero('${idTipo}', '${objeto.estatus}', '${tipo}')" data-toggle="tooltip" data-html="true" data-placement="top" data-original-title="Activar/Desactivar" title="Activar/Desactivar"><i class="fa-solid fa-power-off"></i></button>
         </td>
         <td class='align-middle'>
          <button type="button" class="btn btn-warning mr-1" id="btnEditarTipos" onclick="modalGen(${idTipo})" data-toggle="tooltip" data-placement="top" data-original-title="Editar" title="Editar"><i class="fa-solid fa-pen"></i></button>
         </td>`
      ;
      //Dibujar Tabla
      tabla.row.add([
         campo_tipo,
         campo_status,
         campo_botones
      ]).draw().node();
      tabla.columns.adjust().draw();
   });
   $("table tbody").slideDown('slow');
}

tabla.on( 'draw', function () {
  $('[data-toggle="tooltip"]').tooltip();
} );

function modalGen(idTipoEsc){
  if (idTipoEsc != '') {
    $(".modal-title").html("Editar campo");
    $("#btnTipoEsc").html("Actualizar");
    $("#op").val("actualizarTipoEsc");
    $("#id_tipoEsc").val(idTipoEsc);
    console.log(idTipoEsc);
    var data = {
      op: "GetTipoEsc",
      idTipoEsc: idTipoEsc
    };
    retornarDatosJson(url_modelo_tipo_esc_app,data,'rellenarFormulario(ajaxResponse);');
  }
  else {
    $("#modalTitulo").html("Añadir nuevo Tipo de Escenario");
    $("#op").val("insertaTipoEsc");
    $("#inputTipoName").val("");
    $("#id_tipoEsc").val("");
    $("#btnTipoEsc").html("Registrar");
  }
  $("#ModalTipoEsc").modal('toggle');
}

function rellenarFormulario(ajaxResponse){
 let objResponse = ajaxResponse.Datos[0];
 $("#inputTipoName").val(objResponse.tipo);
}

function EdoGenero(idTipoEsc,status,NameTipo)
{
 var estado;
 if(status == '1'){
   estado = '0';
   var accion = "DESACTIVAR"
   var desc = "Se dio de baja el tipo de escenario: "+NameTipo;
 }
 else {
   estado = '1';
   var accion = "ACTIVAR"
   var desc = "Se dio de alta el tipo de escenario: "+NameTipo;
 }
 var data = {
   op: 'EdoTipoEsc',
   estado: estado,
   idTipoEsc: idTipoEsc
 };
 
 peticionAccion(url_modelo_tipo_esc_app,data);
 var dataBitacora = {
       op : "InsertBitacora",
       accion: accion,
       descripcion: desc,
     };
 //Insertar en Bitacora
 DelRel(url_modelo_bitacora_app,dataBitacora);
 cargarTablaFormulario();
}

$("#btnTipoEsc").click(function (event) {
    if (document.getElementById("FormTipoEsc").checkValidity()) {
    event.preventDefault();
    var op = $("#op").val();
    var form = $('#FormTipoEsc')[0];
    var data = new FormData(form);
    console.log(data);
    $("#btnTipoEsc").prop("disabled",true);
    peticionAccionArchivo(url_modelo_tipo_esc_app,data);

    var NombreTipoEsc = $("#inputTipoName").val();
    if (op=="insertaTipoEsc") {
      var accion = "INSERTAR";
      var desc = "Se Inserto el tipo de esenario "+NombreTipoEsc+" en la base de datos.";
    }
    else if (op=="actualizarTipoEsc") {
      var accion = "ACTUALIZAR";
      var desc = "Se actualizo un campo con el nombre "+NombreTipoEsc;
    }

    var datasend = {
      op : "InsertBitacora",
      accion: accion,
      descripcion: desc,
    };
    //Insertar en Bitacora
    DelRel(url_modelo_bitacora_app,datasend);

    $("#ModalTipoEsc").modal('hide');
    $("#btnTipoEsc").prop("disabled",false);
    cargarTablaFormulario();
  }
});
