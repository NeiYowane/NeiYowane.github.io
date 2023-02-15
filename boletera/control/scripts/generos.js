$(document).ready(function(){
  cargarTablaFormulario();

  $(function () {
      $('[data-toggle="tooltip"]').tooltip({
          container: 'body'
      })
  })
});

// var tabla = $('#tableGeneros').DataTable({
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


var tabla = $('#tableGeneros').DataTable({
  responsive: true,
  language: {
    "lengthMenu": "MOSTRAR _MENU_ GENEROS POR PÁGINA",
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
    op : "GetGeneros"
  };
  peticionRellenarTabla(url_modelo_genero_app,datasend);
}

function pintarTabla(ajaxResponse) {
   //Limpiar tabla
   $("table tbody").slideUp();
   tabla.clear().draw();
   let objResponse = ajaxResponse.Datos;
   // return console.log(objResponse);
   $.each(objResponse, function (i, objeto) {
      //Objeto
      let
         genero = objeto.genero,
         status = objeto.estatus == 1 ? '<span class="badge badge-success rounded-pill d-inline">Activo</span>': '<span class="badge badge-danger rounded-pill d-inline">Inactivo</span>',
         idgenero = objeto.id,
         fecha = objeto.fecha_registro
      ;
      //Campos
      let
         campo_genero= `${genero}`,
         campo_status = `${status}`,
         campo_fechaReg = `${fecha}`,
         campo_botones =
         `
         <td class='align-middle'>
          <button type="button" class="btn btn-primary btn-anim" id="btnBaja" data-toggle="tooltip" data-html="true" data-placement="top" data-original-title="Activar/Desactivar" title="Activar/Desactivar" onclick="EdoGenero('${idgenero}', '${objeto.estatus}', '${genero}')"><i class="fa-solid fa-power-off"></i></button>
         </td>
         <td class='align-middle'>
          <button type="button" class="btn btn-warning btn-anim" id="btnEditar" data-toggle="tooltip" data-placement="top" data-original-title="Editar" title="Editar" onclick="modalGen('${idgenero}')"><i class="fa-solid fa-pen"></i></button>
         </td>`
      ;
      //Dibujar Tabla
      tabla.row.add([
         campo_genero,
         campo_fechaReg,
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

function modalGen(idGenero){
  if (idGenero != '') {
    setrequired(0);
    $(".modal-title").html("Actualizar Género");
    $("#btnGeneros").val("Actualizar");
    $("#op").val("actualizaGenero");
    // console.log($("#op").val());
    $("#id_genero").val(idGenero);
    var data = {
      op: "GetGenero",
      idGenero: idGenero
    };
    retornarDatosJson(url_modelo_genero_app,data,'rellenarFormulario(ajaxResponse);');
  }
  else {
    setrequired(1);
    $("#op").val("insertaGenero");
    $("#inputGenero").val("");
    $("#id_genero").val("");
    $("#btnGeneros").val("Registrar");
  }
  $("#modalGeneros").modal('toggle');
}

  function rellenarFormulario(ajaxResponse){
   let objResponse = ajaxResponse.Datos[0];
   $("#inputGenero").val(objResponse.genero);
  }

   function EdoGenero(idGenero,status, NameGen)
  {
    var estado;
    if(status == '1'){
      estado = '0';
      var accion = "DESACTIVAR"
      var desc = "Se dio de baja el género "+NameGen;
    }
    else {
      estado = '1';
      var accion = "ACTIVAR"
      var desc = "Se dio de alta el género "+NameGen;
    }
    var data = {
      op: 'EdoGenero',
      estado: estado,
      idGenero: idGenero
    };
    peticionAccion(url_modelo_genero_app,data);
    var dataBitacora = {
          op : "InsertBitacora",
          accion: accion,
          descripcion: desc,
        };
    //Insertar en Bitacora
    DelRel(url_modelo_bitacora_app,dataBitacora);
    cargarTablaFormulario();
  }

  $("#btnGeneros").click(function (event) {
    console.log($("#id_genero").val());
    if (document.getElementById("FormGeneros").checkValidity()) {
      event.preventDefault();
      var op = $("#op").val();
      var form = $('#FormGeneros')[0];
      var data = new FormData(form);
      console.log(data);
      $("#btnGeneros").prop("disabled",true);
      peticionAccionArchivo(url_modelo_genero_app,data);

      var NombreGen = $("#inputGenero").val();
      if (op=="insertaGenero") {
        var accion = "INSERTAR";
        var desc = "Se Inserto el género "+NombreGen+" en la base de datos.";
      }
      else if (op=="actualizaGenero") {
        var accion = "ACTUALIZAR";
        var desc = "Se actualizo un campo con el nombre "+NombreGen;
      }

      var datasend = {
        op : "InsertBitacora",
        accion: accion,
        descripcion: desc,
      };
      //Insertar en Bitacora
      DelRel(url_modelo_bitacora_app,datasend);

      $("#modalGeneros").modal('hide');
      $("#btnGeneros").prop("disabled",false);
      cargarTablaFormulario();
    }
  });
