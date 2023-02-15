$(document).ready(function(){
  cargarTablaFormulario();

});

var tabla;

tabla = $('#tableBitacora').DataTable({
  responsive: true,
  language: {
    url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json"
  },
  columnDefs: [
    {"targets": "_all", "className": "dt-left"},
    {"targets": "0", "className": "dt-center accion"}
  ],
  dom: '<"row"<"col-md-6 "l> <"col-md-6"f> > rt <"row"<"col-md-6 "i> <"col-md-6"p> >',
  lengthMenu: [
    [
      5,
      10,
      50,
      100,
       1
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
    op : "GetBitacora"
  };
  peticionRellenarTabla(url_modelo_bitacora_app,datasend);
}

function pintarTabla(ajaxResponse) {
   //Limpiar tabla
   $("table tbody").slideUp();
   tabla.clear().draw();
   let objResponse = ajaxResponse.Datos;
   // return console.log(objResponse);
   $.each(objResponse, function (i, objeto) {
     let color;

     if (objeto.accion=='UPDATE') {
       color='info'
     }
     if (objeto.accion=='INSERT') {
       color='success'
     }
     if (objeto.accion=='DESACTIVAR') {
       color='danger'
     }
     if (objeto.accion=='ACTIVAR') {
       color='primary'
     }
     if (objeto.accion=='INSERTAR') {
       color='success'
     }
     if (objeto.accion=='ACTUALIZAR') {
       color='info'
     }
     if (objeto.accion=='ELIMINAR') {
       color='danger'
     }


      //Objeto
      let
         accion = `<span class="badge badge-${color}">${objeto.accion}</span>`
         descripcion = objeto.descripcion,
         idBitacora = objeto.id,
         fecha = objeto.fecha,
         usuario = objeto.usuario
      ;


      //Campos
      // let
      //    campo_genero= `${genero}`,
      //    campo_status = `${status}`,
      //    campo_fechaReg = `${fecha}`,
      //    campo_botones =
      //    `
      //    <td class='align-middle'>
      //     <button type="button" class="btn btn-primary" onclick="EdoGenero('${idgenero}', '${objeto.estatus}', '${genero}')"><i class="fa-solid fa-arrow-rotate-right"></i></button>
      //    </td>
      //    <td class='align-middle'>
      //    <button type="button" class="btn btn-warning" onclick="modalGen('${idgenero}')"><i class="fa-solid fa-pen-to-square"></i></button>
      //    </td>`
      // ;
      //Dibujar Tabla
      tabla.row.add([
         accion,
         descripcion,
         fecha,
         usuario
      ]).draw().node();
      tabla.columns.adjust().draw();
   });
   $("table tbody").slideDown('slow');
}
