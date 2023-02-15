$(document).ready(function(){
  cargarTablaFormulario();
  CargarGenerosTo();
  $(function () {
      $('[data-toggle="tooltip"]').tooltip({
          container: 'body'
      })
  });

});

var tabla = $('#tableArtistas').DataTable({
  responsive: true,
  language: {
    "lengthMenu": "MOSTRAR _MENU_ ARTISTAS POR PÁGINA",
    "zeroRecords": "NO HAY RESULTADOS PARA MOSTRAR",
    "info": "PÁGINA _PAGE_ DE _PAGES_",
    "infoEmpty": "NO HAY DATOS PARA MOSTRAR",
    "infoFiltered": "",
    "search": "BUSCAR: "
  },
  columnDefs: [
    { targets: [0], className: "dt-left artisata"},
    { "width": "35%", targets: 0 },
    { targets: '_all', className: "dt-center align-middle"}
    // {"className": "dt-left", "targets": "0"}
    // {"className": "dt-center", "targets": "_all"}
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

let NameArtSave;


function cargarTablaFormulario(){
  var datasend = {
    op : "GetArtistas"
  };
  retornarDatosJson(url_modelo_artista_app,datasend,`pintarTabla(ajaxResponse)`);
}

function pintarTabla(ajaxResponse) {
   //Limpiar tabla
   $("table tbody").slideUp();
   tabla.clear().draw();
   let objResponse = ajaxResponse.Datos;
   // return console.log(objResponse);
   $.each(objResponse, function (i, objeto) {
     let imagenDefault = objeto.nombre_archivo == "" || objeto.nombre_archivo == " "? "default.png" : objeto.nombre_archivo;

      //Objeto
      let
         artista = `<span data-id="nombreArtista" style='margin-left:15%;'>${objeto.nombre}</span>`,
         status = objeto.estatus == 1 ? '<span class="badge badge-success rounded-pill d-inline" style="padding:7%">Activo</span>': '<span class="badge badge-danger rounded-pill d-inline" style="padding:7%">Inactivo</span>',
         idartista = objeto.id,
         fecha = objeto.fecha_registro,
         tipo = objeto.tipo == 1 ? 'Solista': 'Grupo/Banda',
         imagen = `<img src='/control/img/imgArtistas/${imagenDefault}' data-id="${objeto.id}" class='td_img img-responsive' id="imgArtista" style='height:35; width:54px; margin-left:10%;'/> `;

      ;
      // console.log(imagen)
      //Campos
      let
         // campo_artista= `${artista}`,
         campo_status = `${status}`,
         campo_tipo = `${tipo}`,
         campo_fechaReg = `${fecha}`,
         campo_botonImg =
         `
         <td class='dt-left' >
          ${imagen}
         </td>
         <td class='align-middle dt-right'>
          ${artista}
         </td>`,
         campo_botones =
         `
         <td class='' id="btnBajaRow" >
          <button type="button" class="btn btn-info btn-anim" id="btnBaja" data-toggle="tooltip" data-html="true" data-placement="top" data-original-title="Activar/Desactivar" title="Activar/Desactivar" onclick="EdoArtista('${idartista}','${objeto.estatus}','${objeto.nombre}')"><i class="fa-solid fa-power-off"></i></button>
         </td>
         <td class='align-middle' id="btnEditarRow" style='text-align:center; vertical-align:middle'>
         <button type="button" id="btnEditar" class="btn btn-warning btn-anim" data-toggle="tooltip" data-html="true" data-placement="top" data-original-title="Editar" title="Editar" onclick="modalArt('${idartista}')"><i class="fa-solid fa-pen-to-square"></i></button>
         </td>
         <td class='align-middle' style='text-align:center; vertical-align:middle'>
         <button type="button" id="btnDelImg" class="btn btn-danger btn-anim" data-toggle="tooltip" data-html="true" data-placement="top" data-original-title="Eliminar Imagen" title="Eliminar Imagen" onclick="DelImg('${idartista}', '${objeto.nombre}')"><i class="fa-solid fa-image-slash"></i></button>
         </td>`
      ;
      //Dibujar Tabla
      tabla.row.add([
         // campo_artista,
         campo_botonImg,
         campo_tipo,
         campo_fechaReg,
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

function CargarGenerosTo(){
  var data = {
    op: "GetGeneroTo"
  };
  retornarDatosJson(url_modelo_artista_app,data,`RellenarSelectGeneros(ajaxResponse)`);
}
function RellenarSelectGeneros(ajaxResponse){
  input_generos.empty();
  let coleccion = ajaxResponse.Datos;
  // console.log(ajaxResponse.Datos);
  $.each(coleccion, function (i, objeto) {
    input_generos.append(`<option value='${objeto.id}' name="GenerosOp">${objeto.genero}</option>`);
  });

  // $("#SelectGen").attr('multiple', 'multiple');
  // $("#SelectGen").multiselect({
  //   includeSelectAllOption: false,
  //   enableFiltering: true,
  //   includeFilterClearBtn: true,
  //   enableCaseInsensitiveFiltering: true
  // });
}

function modalArt(idArtista){
  input_generos.selectpicker();
      $("#inputFotoArt").val("");
  if (idArtista != '') {
    $("#btnArtistas").val("Actualizar");
    $("#op").val("actualizaArtista");
    $("#idartista").val(idArtista);
    // $( "#generosDiv" ).hide();
    var data = {
      op: "GetArtista",
      idArtista: idArtista
    };
    retornarDatosJson(url_modelo_artista_app,data,`rellenarFormulario(ajaxResponse)`);
    // peticionEditarObjeto(url_modelo_artista_app,data);
  }
  else {
    $("#op").val("insertaArtista");
    $("#inputArtista").val("");
    $("#idartista").val("");
    $("#imagenArt").val("");
    input_generos.val("default");
    input_generos.selectpicker("refresh");
    input_tipoArt.val("default");
    input_tipoArt.selectpicker("refresh");
    $("#btnArtistas").val("Registrar");
    // $( "#generosDiv" ).show();
  }
  $("#modalArtistas").modal('toggle');
}


function rellenarFormulario(ajaxResponse){
 let objResponse = ajaxResponse.Datos[0];
 // console.log(objResponse);
 var data = {
   op: "GetArtGen",
   idArtista: objResponse.id
 };
 retornarDatosJson(url_modelo_artista_app,data,`rellenarSelectGen(ajaxResponse);`);
 let tipoArt =  objResponse.tipo;
 $("#inputArtista").val(objResponse.nombre);
 $("#imagen").val(objResponse.nombre_archivo);
 // $('#SelectGen option[value="'+tipoArt+'"]').prop('selected', true);
 input_tipoArt.val(tipoArt).attr("selected","selected");
 input_tipoArt.selectpicker("refresh");
}

function rellenarSelectGen(ajaxResponse){
    let coleccion = ajaxResponse.Datos;
    // console.log(coleccion);
    const generos = [];
     // input_generos.selectpicker('val', [1,2]);
    // for (var i = 0; i < coleccion.length; i++) {
    //
    // }
  $.each(coleccion, function (i, objeto) {
    generos.push(objeto.id_genero);
  });
   input_generos.selectpicker('val', generos);
   input_generos.selectpicker("refresh");
}

 function EdoArtista(idArtista,status, NameArt)
{
  var estado;
  if(status == '1'){
    estado = '0';
    var accion = "DESACTIVAR"
    var desc = "Se dio de baja el artista "+NameArt;
  }
  else {
    estado = '1';
    var accion = "ACTIVAR"
    var desc = "Se dio de alta el artista "+NameArt;
  }
  var data = {
    op: 'EdoArtista',
    estado: estado,
    idArtista: idArtista,
  };
  var dataBitacora = {
        op : "InsertBitacora",
        accion: accion,
        descripcion: desc,
      };
  //Insertar en Bitacora
  DelRel(url_modelo_bitacora_app,dataBitacora);
  peticionAccion(url_modelo_artista_app,data);

}

function DelImg(idArt, NameArt){
  Swal.fire({
  title: '¿Deseas eliminar la imagen del artista '+NameArt+"?",
  text: "No podras revertir esta acción!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Si, Eliminar',
  cancelButtonText: 'Cancelar',
  showClass: {
    popup: 'animate__animated animate__flipInX '
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
}).then((result) => {
  if (result.isConfirmed) {
    NameArtSave=NameArt;
    var datasend = {
      op : "DelImgArt",
      idArt: idArt,
    };
    retornarDatosJson(url_modelo_artista_app,datasend,`RespuestaEliminar(ajaxResponse)`);
  }
})
}

function RespuestaEliminar(AjaxResponse){
  Swal.fire(
    'Eliminado!',
    'La imagen del artista '+NameArtSave+' ha sido eliminada',
    'success'
  );
    cargarTablaFormulario();
}


$("#btnArtistas").click(function (event) {
  // var idobtenida = getMaxID(url_modelo_artista_app);
  // console.log(idobtenida);
  if (document.getElementById("FormArtistas").checkValidity()) {
    event.preventDefault();
    var GenerosSelect = input_generos.val();
    // console.log(GenerosSelect);
    var op = $("#op").val();
    var form = $('#FormArtistas')[0];
    var data = new FormData(form);
    $("#btnArtistas").prop("disabled",true);
    var NameArt = $('#inputArtista').val();
    var indexArt = tabla.column(0).data().toArray();
    console.log([...data]);
    const lower = indexArt.map(element => {
    return element.toUpperCase();
    });
    if (op=="insertaArtista") {
      // alert('ingresar artista');
      if (lower.indexOf(NameArt.toUpperCase()) === -1) {
        peticionAccionArchivo(url_modelo_artista_app,data);
        var accion = "INSERTAR";
        var desc = "Se Inserto el Artista "+NameArt+" en la base de datos";
      //   var datasend1 = {
      //     op : "InsertArtGen",
      //     generos: GenerosSelect,
      //     // idArtista: idobtenida
      //   };
      //   setTimeout(function(){
      //   ajaxArtGen(url_modelo_artista_app,datasend1);
      // }, 200);
      }
      else{
        mostrarToast('warning', `Artista ya esta dado de alta`);
        $("#modalArtistas").modal('hide');
        $("#btnArtistas").prop("disabled",false);
        return;
      }

    }
    else if (op=="actualizaArtista"){
      var accion = "ACTUALIZAR";
      var desc = "Se actualizo un campo con el nombre "+NameArt;
      peticionAccionArchivo(url_modelo_artista_app,data);
      var idArtista = $("#idartista").val();
      var datasend = {
        op : "DelRel",
        generos: GenerosSelect,
        idArtista:idArtista
      };
      // const generos = GenerosSelect;
      DelRel(url_modelo_artista_app,datasend);

      var datasend2 = {
        op : "UpdateArtGen",
        generos: GenerosSelect,
        idArtista: idArtista
      };
      ajaxArtGen(url_modelo_artista_app,datasend2);
    }
    $("#modalArtistas").modal('hide');
    $("#btnArtistas").prop("disabled",false);
      var dataBitacora = {
      op : "InsertBitacora",
      accion: accion,
      descripcion: desc,
    };
    //Insertar en Bitacora
    DelRel(url_modelo_bitacora_app,dataBitacora);
    setTimeout(function(){
    cargarTablaFormulario();
  }, 150);
  }
});
