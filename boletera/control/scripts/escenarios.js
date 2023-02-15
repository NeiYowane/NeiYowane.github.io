$(document).ready(function(){
  cargarTablaFormulario();
  CargarDatosSelect();
  $(function () {
      $('[data-toggle="tooltip"]').tooltip({
          container: 'body'
      })
  });
});


var tabla = $('#TablaEscenarios').DataTable({
  responsive: true,
  language: {
    "lengthMenu": "MOSTRAR _MENU_ ESCENARIOS POR PÁGINA",
    "zeroRecords": "NO HAY RESULTADOS PARA MOSTRAR",
    "info": "PÁGINA _PAGE_ DE _PAGES_",
    "infoEmpty": "NO HAY DATOS PARA MOSTRAR",
    "infoFiltered": "",
    "search": "BUSCAR: ",
    "paginate": {
      "previous": '<a class="btn"><i class="fa-solid fa-circle-chevron-left"></i></a>',
      "next": '<a class="btn"><i class="fa-solid fa-circle-chevron-right"></i></a>'
    }
  },
  aria: {
    paginate: {
        previous: 'Anterior',
        next:     'Siguiente'
    },
  },
  columnDefs: [
    { "width": "35%", targets: 1 },
    { "width": "18%", targets: 5 },
    { targets: '_all', className: "dt-center align-middle"}
],
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
    op : "GetEscenarios"
  };
  retornarDatosJson(url_modelo_escenerio_app,datasend,`pintarTabla(ajaxResponse)`);
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
         escenario = objeto.nombre,
         status = objeto.estatus == 1 ? '<span class="badge badge-success rounded-pill d-inline">Activo</span>': '<span class="badge badge-danger rounded-pill d-inline">Inactivo</span>',
         idEsc = objeto.id,
         direccion = objeto.direccion,
         idTipo = objeto.idTipo,
         tipo = objeto.tipo,
         capacidad = objeto.capacidad,
         imagen = `${objeto.imagen}`;
         estructura = `${objeto.estructura}`;
      ;
      // console.log(imagen)
      //Campos
      let
         campo_escenario= `${escenario}`,
         campo_status = `${status}`,
         campo_tipo = `${tipo}`,
         campo_direccion = `${direccion}`,
         campo_capacidad = `<span>${capacidad}&nbsp;&nbsp;<i class="fa-solid fa-people-roof"></i></span>`,
         campo_botones =
         `
         <td>
         <button type="button" id="btnPhotoEsc" class="btn btn-primary fancybox" onclick="getImages('${imagen}', '${estructura}', '${direccion}', '${capacidad}')" data-toggle="tooltip" data-html="true" data-placement="top" data-original-title="Ver Imagenes" title="Ver Imagenes"><i class="fa-solid fa-images"></i></button>
         </td>
         <td>
          <button type="button" class="btn btn-info" id="btnBajaEsc" onclick="EdoEscenario('${idEsc}','${objeto.estatus}','${escenario}')" data-toggle="tooltip" data-html="true" data-placement="top" data-original-title="Activar/Desactivar" title="Activar/Desactivar"><i class="fa-solid fa-power-off"></i></button>
         </td>
         <td>
         <button type="button" id="btnEditarEsc" class="btn btn-warning" onclick="modalEsc('${idEsc}')" data-toggle="tooltip" data-html="true" data-placement="top" data-original-title="Editar" title="Editar"><i class="fa-solid fa-pen-to-square"></i></button>
         </td>`
      ;
      //Dibujar Tabla
      tabla.row.add([
         campo_escenario,
         campo_direccion,
         campo_tipo,
         campo_capacidad,
         campo_status,
         campo_botones
      ]).draw().node();
      tabla.columns.adjust().draw();
   });
   $("table tbody").slideDown('slow');
}
// var GenerosSelect;

tabla.on( 'draw', function () {
  $('[data-toggle="tooltip"]').tooltip();
} );


let range = document.querySelector("input[type=range]");
let number = document.querySelector('input[type=number]')
range.addEventListener("change",(e)=>{
  number.value=e.target.value;
})
number.addEventListener("keyup",(e)=>{
  range.value=e.target.value;
})
number.addEventListener("change",(e)=>{
  range.value=e.target.value;
})

function CargarDatosSelect(){
  var data = {
    op: "GetEscenariosSel"
  };
  retornarDatosJson(url_modelo_escenerio_app,data,'RellenarEscenariosSelect(ajaxResponse);');
}

function RellenarEscenariosSelect(ajaxResponse){
  input_tipoEsc.empty();
  let coleccion = ajaxResponse.Datos;
  // console.log(ajaxResponse.Datos);
  $.each(coleccion, function (i, objeto) {
    input_tipoEsc.append(`<option value='${objeto.id}'>${objeto.tipo}</option>`);
  });

  setTimeout(function(){
    input_tipoEsc.selectpicker();
}, 200);
}

function getImages(Imagen, Estructura, Direccion, Capacidad){
  Fancybox.show(
  [
    {
      src: "./img/imgEscenarios/Imagen/"+Imagen,
      type: "image",
      caption:"Direccion:  "+Direccion,
    },
    {
      src: "./img/imgEscenarios/Estructura/"+Estructura,
      type: "image",
      caption:"Capacidad Maxima: "+Capacidad+" Espectadores",

    },
  ],
  {
    infinite: false,
  }
  );
}

function EdoEscenario(idEscenario,status,EscenarioName)
{
 var estado;
 if(status == '1'){
   estado = '0';
   var accion = "DESACTIVAR"
   var desc = "Se dio de baja el escenario: "+EscenarioName;
 }
 else {
   estado = '1';
   var accion = "ACTIVAR"
   var desc = "Se dio de alta el escenario: "+EscenarioName;
 }
 var data = {
   op: 'EdoEscenario',
   estado: estado,
   idEscenario: idEscenario,
 };
 var dataBitacora = {
       op : "InsertBitacora",
       accion: accion,
       descripcion: desc,
     };
 //Insertar en Bitacora
 DelRel(url_modelo_bitacora_app,dataBitacora);
 peticionAccion(url_modelo_escenerio_app,data);

}

function modalEsc(idEscenario, tipo){
  input_tipoEsc.selectpicker();
    $("#InputStructureEscenario").val("");
    $("#InputStructureEscenario").val("");
  if (idEscenario != '') {
    $("#btnEscenarios").html("Actualizar");
    $("#ModalEscTitulo").html("Actualizar Datos del Escenario");
    $("#op").val("actualizarEscenario");
    $("#idEscenarioHidden").val(idEscenario);
    // $( "#generosDiv" ).hide();
    var data = {
      op: "GetEscenario",
      idEscenario: idEscenario,
    };
    retornarDatosJson(url_modelo_escenerio_app,data,`rellenarFormulario(ajaxResponse)`);
  }
  else {
    $("#op").val("insertaEscenario");
    $("#idEscenarioHidden").val("");
    $("#estructura").val("");
    $("#imgEscenario").val("");
    $("#inputNombreEsc").val("");
    $("#inputTipoEsc").val("");
    $("#inputDireccionEsc").val("");
    $("#EscenarionumberInput").val("1000");
    $("#rangeInput").val("1000");
    input_tipoEsc.val("default");
    input_tipoEsc.selectpicker("refresh");
    $("#btnEscenarios").html("Registar");
    $("#ModalEscTitulo").html("Añadir nuevo Escenario");
    // $( "#generosDiv" ).show();
  }
  $("#ModalEscenarios").modal('toggle');
}

function rellenarFormulario(ajaxResponse){
 let objResponse = ajaxResponse.Datos[0];
 // console.log(objResponse);
 let tipoEsc =  objResponse.tipo;
 $("#estructura").val(objResponse.estructura);
 $("#imgEscenario").val(objResponse.imagen);
 $("#inputNombreEsc").val(objResponse.nombre);
 $("#EscenarionumberInput").val(objResponse.capacidad);
 $("#rangeInput").val(objResponse.capacidad);
 $("#inputDireccionEsc").val(objResponse.direccion);

 input_tipoEsc.val(tipoEsc).attr("selected","selected");
 input_tipoEsc.selectpicker("refresh");
}

$("#btnEscenarios").click(function (event) {
  // var idobtenida = getMaxID(url_modelo_escenerio_app);
  // console.log(idobtenida);
  if (document.getElementById("formEscenario").checkValidity()) {
    event.preventDefault();
    var op = $("#op").val();
    var form = $('#formEscenario')[0];
    var data = new FormData(form);
    $("#btnEscenarios").prop("disabled",true);
    var NameEsc = $('#inputNombreEsc').val();
    if (op=="insertaEscenario") {
        var accion = "INSERTAR";
        var desc = "Se Inserto el Escenario "+NameEsc+" en la base de datos";
    }
    else if (op=="actualizaArtista"){
      var accion = "ACTUALIZAR";
      var desc = "Se actualizo un campo con el nombre "+NameEsc;
      var idArtista = $("#idartista").val();
    }
    $("#ModalEscenarios").modal('hide');
    $("#btnEscenarios").prop("disabled",false);
    peticionAccionArchivo(url_modelo_escenerio_app,data);
    cargarTablaFormulario();
    var dataBitacora = {
      op : "InsertBitacora",
      accion: accion,
      descripcion: desc,
    };
    // Insertar en Bitacora
    DelRel(url_modelo_bitacora_app,dataBitacora);

  }
});
