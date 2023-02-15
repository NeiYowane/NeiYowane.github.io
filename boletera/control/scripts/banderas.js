var splide = new Splide("#main-slider", {
  heightRatio : 0.38,
  pagination: true,
  cover: true,
  autoplay: true,
  resetProgress: true,
  rewind: true
});

let SplidePreview = $('#SplidePreview');

// Funciones siempre listas

// 6) Crear la DataTable
var tabla = $('#TablaBanderas').DataTable({
  responsive: true,
  language: {
    "lengthMenu": "MOSTRAR _MENU_ BANDERAS POR PÁGINA",
    "zeroRecords": "NO HAY RESULTADOS PARA MOSTRAR",
    "info": "PÁGINA _PAGE_ DE _PAGES_",
    "infoEmpty": "NO HAY DATOS PARA MOSTRAR",
    "infoFiltered": "",
    "search": "BUSCAR: "
  },
  columnDefs: [
    { targets: '_all', className: "dt-center align-middle"},
    { "width": "6%", targets: 2 },
    { "width": "30%", targets: 2 },
    { "width": "30%", targets: 3 },
    { "width": "25%", targets: 4 },
    { "width": "3%", targets: 6 },
    { "width": "3%", targets: 7 },
    { "width": "3%", targets: 8 },
    { orderable: false, targets: [2,3,4,5,6,7,8]},
    {
             targets: 0,
             "visible": false,
         },
         {
             targets: 1,
             "visible": false,
         }
  ],
  ordering: true,
  rowReorder: {
            selector: '.allowreordering'
        },
  dom: '<"row"<"col-12"f> > rt <"row" <"col-12"p> >',
  order: [[1, 'desc'],[0, 'asc']],
  lengthMenu:
  [[
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
  ]],
  pageLength: 10,
  deferRender: true,
  aaSorting: [], // Deshabilitar ordenado automatico
});

$(document).ready(function(){
  cargarTablaFormulario();
  Preview();
  // Tooltip Script
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });
  splide.mount();

  tabla.on( 'row-reorder', function ( e, diff, edit ) {
    // var result = 'El reordenamiento empezo mediante la seleccion del banner: '+edit.triggerRow.data()[2]+' que se encontraba en la posicion '+edit.triggerRow.data()[0]+'\n';
    //
    // for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
    //   var rowData = tabla.row( diff[i].node ).data();
    //   result += rowData[2]+' con la id = '+rowData[1]+' fue movido a la posicion '+
    //   // result += rowData[2]+' Movido a la posicion '+
    //   diff[i].newData+' (Antes estaba en la posicion '+diff[i].oldData+')\n';
    // }

  // console.log( 'Resultado de Reordenamiento:\n'+result );

  setTimeout(function(){
    // var plainArray = tabla
    //   .rows({order:'current'})
    //   .data()
    //   .toArray();
    //   console.log(plainArray);
    enlistarBanner();
  }, 100);

  } );


//  var reorderFlag = false;
//
//  tabla.on( 'row-reordered', function ( e, diff, edit ) {
//   // tabla.rows().every(function (rowIdx, tableLoop, rowLoop) {
//   //   console.log('Prueba 1'+rowIdx, this.data());
//   // });
//   reorderFlag = true;
// } );
//
// tabla.on( 'draw', function () {
//     console.log( 'Redraw occurred at: '+new Date().getTime() );
//
//   if (reorderFlag) {
//     tabla.rows().every(function (rowIdx, tableLoop, rowLoop) {
//       console.log('Posicion '+rowIdx, this.data());
//     });
//     reorderFlag = false;
//   }
// } );




});



// 7) Funcion para llamar al Ajax
function cargarTablaFormulario(){
  var datasend = {
    op : "GetBanderas"
  };
  retornarDatosJson(url_modelo_banderas_app,datasend,`pintarTabla(ajaxResponse)`);
}

// 8) Funcion para rellenar la tabla
function pintarTabla(ajaxResponse) {
   // Limpiar Tabla
   $("table tbody").slideUp();
   tabla.clear().draw();
   let objResponse = ajaxResponse.Datos;
   let Pos = 0;
   $.each(objResponse, function (i, objeto) {
     Pos+=1;
     let imagenDefault = objeto.Archivo == "" || objeto.Archivo == " "||objeto.Archivo == null? "default.jpg" : objeto.Archivo;
     let allowreordering = objeto.Mostrar == 1? "fa-solid fa-grip-dots allowreordering" : "fa-thin fa-grip-dots";
      // Objeto
      let
      id = objeto.ID,
      orden = objeto.orden,
      titulo = objeto.Titulo,
      archivo = `<img src='/control/img/imgBanderas/${imagenDefault}' data-id="${objeto.ID}" data-orden="${objeto.orden}" class='td_img img-responsive BannerZoom' id="imgBandera" style='height:35; width:54px;'/> `,
      mostrar = objeto.Mostrar == 1 ? '<span class="badge badge-success rounded-pill d-inline">Mostrando</span>':'<span class="badge badge-danger rounded-pill d-inline">Oculto</span>',
      status = objeto.Estatus
    ;
    // Campos
    let
       // campo_id = `${id}`,
       campo_mostrarOrder = `${objeto.Mostrar}`,
       campo_mover =`<i class="handle ${allowreordering}" data-orden='${orden}' data-id="${id}" data-orden=""></i>`,
       campo_orden =`${orden}`,
       campo_titulo = `${titulo}`,
       campo_archivo = `${archivo}`,
       campo_mostrar = `${mostrar}`,
       campo_ocultar =
       `
       <button type="button" class="btn btn-warning btn-anim btn-sm" data-toggle="tooltip" data-placement="top" title="Mostrar Ocultar" onclick="MostrarBandera('${id}','${objeto.Mostrar}')"><i class="fa-solid fa-arrows-rotate"></i></button>
       `,
       campo_editar =
       `
       <button type="button" class="btn btn-info btn-anim btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Editar" title="Editar" onclick="OpenModal('${id}')"><i class="fa-solid fa-pen"></i></button>
        `,
       campo_borrar =
       `
       <button type="button" class="btn btn-danger btn-anim btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar" title="Eliminar" onclick="EliminarBandera('${id}', '${titulo}')"><i class="fa-solid fa-trash-can"></i></button>
       `
    ;
    // Dibujar Tabla
    tabla.row.add([
       campo_orden,
       campo_mostrarOrder,
       campo_mover,
       campo_titulo,
       campo_archivo,
       campo_mostrar,
       campo_ocultar,
       campo_editar,
       campo_borrar
    ]).draw().node();
      tabla.columns.adjust().draw();
   });
   $("table tbody").slideDown('slow');
}

// Fix Tooltip
tabla.on( 'draw', function () {
  $('[data-toggle="tooltip"]').tooltip();
} );

// Funcion para Mostrar / Ocultar
function MostrarBandera(ID, Mostrar)
{
  SplidePreview.empty()
  var estado;
  if(Mostrar == '1'){
    estado = '0';
  }
  else {
   estado = '1';
  }
  var data = {
    op: 'MostrarBandera',
    estado: estado,
    id: ID
  };
  peticionAccion(url_modelo_banderas_app,data);
  $('#SplidePreview').html("");
  Preview();
};

// Funcion para Eliminar
function EliminarBandera(ID, Titulo)
{
  Swal.fire({
  title: '¿Estas seguro que deseas eliminar el Banner: '+Titulo+"?",
  text: "No podras revertir esta acción!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#d33',
  cancelButtonColor: '#3085d6',
  confirmButtonText: 'Si, Eliminar',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    var accion = "ELIMINAR"
    var desc = "Se ELIMINO la Bandera: "+Titulo+".";
    var data = {
     op: 'EliminarBandera',
     id: ID
   };
   var bitacora = {
     op : "InsertBitacora",
     accion: accion,
     descripcion: desc,
   };
   // const generos = GenerosSelect;
   DelRel(url_modelo_bitacora_app,bitacora);
   peticionAccion(url_modelo_banderas_app,data);
  }
})
};

// Funcion Preparar Modal
function OpenModal(id){
  if (id != '') {
    // console.log("OpenModal");
    $("#op").val("ActualizarBanner");
    $("#modalTitle").html("Editar Bandera");
    $("#AddBanner").html("Actualizar");
    $("#idbandera").val(id);
    var data = {
      op: "GetBandera",
      id: id
    };
    retornarDatosJson(url_modelo_banderas_app,data,`rellenarFormulario(ajaxResponse)`);
  }
  else {
    $("#op").val("InsertarBanner");
    $("#imagen").val("");
    $("#idbandera").val("");
    $("#modalTitle").html("Añadir Nueva Bandera");
    $("#InputNombre").val("");
    $("#InputImagen").val("");
    $("#spanImage").html("");
    $("#AddBanner").val("Añadir");
  }
  $("#ModalBanderas").modal('toggle');
  console.log($("#op").val());
}

// Obtener Consulta Especifica
function rellenarFormulario(ajaxResponse){
 let objResponse = ajaxResponse.Datos[0];
 $("#InputNombre").val(objResponse.Titulo);
 $("#spanImage").html(objResponse.Archivo);
 $("#imagen").val(objResponse.Archivo);
}

// $("#btnSaveOrder").click(function(){
//   var plainArray = tabla
//     .rows({order:'current'})
//     .data()
//     .toArray();
//     console.log(plainArray);
// // Preview();
// // splide.mount();
// });

let tbody = $('#TBodyBanderas');

function enlistarBanner() {
    orden = 1;
    tbody.find("i.handle").each(function () {
       let td_handle = $(this);
       td_handle.data("orden",orden);
       let orden_td = td_handle.data("orden");
       let id_td = td_handle.data("id");
       console.log("Posicion: "+orden_td+" Esta el banner "+id_td);

       let data = {
         op:"UpdatePosicionOrden",
         idBanner:id_td,
         orden:orden_td
       };
       DelRel(url_modelo_banderas_app,data);
       orden++;
    });
    setTimeout(function(){
      cargarTablaFormulario();
      $('#SplidePreview').html("");
      Preview();
    }, 200);
    // splide.refresh();
 }

// Funcion Añadir / Editar Banderas
$("#AddBanner").click(function (event) {
  if (document.getElementById("FormBanderas").checkValidity()) {
    event.preventDefault();
    $("#AddBanner").prop("disabled",true);
    var op = $("#op").val();
    var form = $('#FormBanderas')[0];
    var data = new FormData(form);
    var NameBanner = $('#InputNombre').val();

    if (op=="InsertarBanner") {
      console.log("InsertarBanner");
      var accion = "INSERTAR";
      var desc = "Se Inserto la Bandera "+NameBanner+" en la base de datos.";
    }
    else if (op=="ActualizarBanner"){
      console.log("ActualizarBanner");

      var accion = "ACTUALIZAR";
      var desc = "Se actualizo una Bandera con el nombre "+NameBanner+".";
    };
    peticionAccionArchivo(url_modelo_banderas_app,data);
  }
    $("#ModalBanderas").modal('hide');
    $("#AddBanner").prop("disabled",false);
    cargarTablaFormulario();
    var dataBitacora = {
      op : "InsertBitacora",
      accion: accion,
      descripcion: desc,
    };
    //Insertar en Bitacora
    DelRel(url_modelo_bitacora_app,dataBitacora);
  });

// Funcion Previsualizar
function Preview(){
  console.log("Preview");
  var datasend = {
    op : "GetBanderasValidas"
  };
  retornarDatosJson(url_modelo_banderas_app,datasend,`PrintBanners(ajaxResponse)`);
}

// Funcion Imprimir Banderas
function PrintBanners(ajaxResponse){

  let coleccion = ajaxResponse.Datos;
  console.log(coleccion);
  $.each(coleccion, function (i, objeto) {
    let Archivo = objeto.Archivo;
  SplidePreview.append(`
    <li class='splide__slide'>
      <img
        src='./img/imgBanderas/${Archivo}'
        alt=''
      />
    </li>
    `);
  });
    splide.refresh();
}
