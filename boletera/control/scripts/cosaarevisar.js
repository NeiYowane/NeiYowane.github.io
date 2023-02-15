$(document).ready(function(){
  getBannersPrincipales();
  // $('[name=i]').tooltip({'trigger':'focus', 'title': 'Si el RFC ya esta registrado puedes usarlo sin registrar todos los datos fiscales excepto el RFC.'});
});
var dragSrc = null;  //Seguimiento global de la celda de origen
var cells = null;  // Todas las celdas de la tabla
let tbody = $('#tablaBanners').find('tbody');
let tabla = $('#tablaBanners').DataTable({
  "language": {
    "lengthMenu": "MOSTRAR MENU REGISTROS POR PÁGINA",
    "zeroRecords": "NO HAY RESULTADOS PARA MOSTRAR",
    "info": "PÁGINA PAGE DE PAGES",
    "infoEmpty": "NO HAY DATOS PARA MOSTRAR",
    "infoFiltered": "",
    "search": "BUSCAR"
  },
  "columnDefs": [{
    "className": "dt-center",
    "targets": "_all",
      createdCell: function (td, cellData, rowData, row, col) {
      $(td).attr('draggable', 'true');
      // $(td).addClass('handle');
    }
  }],
  "order": [],
  "bSort": false,
  "bPaginate":false,
  "bInfo":false,
  "searching": false
});

jscolor.presets.default = {
    position: 'right',
    palette: [
        '#000000', '#7d7d7d', '#870014', '#ec1c23', '#ff7e26',
        '#fef100', '#22b14b', '#00a1e7', '#3f47cc', '#a349a4',
        '#ffffff', '#c3c3c3', '#b87957', '#feaec9', '#ffc80d',
        '#eee3af', '#b5e61d', '#99d9ea', '#7092be', '#c8bfe7',
    ],
    paletteCols: 12,
    hideOnPaletteClick: false,
    format:'hex'
};

function getBannersPrincipales(){
  let data = {
    op: "getBannersPrincipales"
  }
  retornarDatosJson2(url_modelo_marketing_app,data,`PutBanners(ajaxResponse)`,false);
}

function PutBanners(ajaxResponse){
  $("table tbody").slideUp();
  $(".slickClass").html("");
  tabla.clear().draw();
  let objResponse = ajaxResponse.Datos;
  $.each(objResponse, function (i, objeto) {
    var estatus = "";
     $(".slickClass").append(`<div style='text-align:center;'><img src="Banners/${objeto.imgBanner}" height="auto" width="100%"></div>`);
     status = objeto.estatus == 0 ? '<i class="fal fa-check" style="color:#7AE04B" title="Autorizar Banner"></i>': '<i class="fal fa-ban" title="Desautorizar banner" style="color:red"></i>';
     objeto.estatus == 0 ? estatus = 1: estatus=0;
     let
        campo_imagen =`<td class=''><img src="Banners/${objeto.imgBanner}" height="auto" width="160vh"></div></td>`,
        // campo_url =`<td class=''>${objeto.url}</td>`,
        campo_boton1 = `<td class=''>
         <button type="button" class="btn btn-outline-dark" onclick="UpdateEstatusBanner(${objeto.idBanner},${estatus})">${status}</button>
        </td>`,
        campo_boton2 =`<td class=''>
        <button type="button" class="btn btn-outline-danger" title="Eliminar banner" onclick="EliminarBanner(${objeto.idBanner},'${objeto.imgBanner}')"><i class="fal fa-trash"></i></button>
        </td>`;
        campo_boton3 =`<td class='handle'><i class="fal fa-grip-vertical handle" data-orden='${objeto.orden}' data-id='${objeto.idBanner}' title="Arrastrar para cambiar orden"></i></td>`;

        tabla.row.add([
           campo_imagen,
           campo_boton1,
           campo_boton2,
           campo_boton3
        ]).draw().node();
        tabla.columns.adjust().draw();

  });
  $("table tbody").slideDown('slow');

  setTimeout(function () {
    inicializar();
  }, 100);
}

function InsertBanner(){
	if (arrayFiles.length > 0) {
    var url = $("#nptUrl").val();
    var texto1 = $("#npt1").val();
    var texto2 = $("#npt2").val();
    var texto3 = $("#npt3").val();
    var color = $("#color").val();
		var data = new FormData();
		data.append("url", url);
		// data.append("url", arrayFiles[0]);
		data.append("file", arrayFiles[0]);
		data.append("texto1", texto1);
		data.append("texto2", texto2);
		data.append("texto3", texto3);
		data.append("color", color);
		data.append("op", "InsertBanner");

    retornarDatosJson2(url_modelo_marketing_app,data,"location.reload()",true);
	}else {
    mostrarToast("info","No haz seleccionado ninguna imagen");
  }
}

function UpdateEstatusBanner(idBann,estatus){
  var datasend = {
    op:"UpdateEstatusBanner",
    idBanner:idBann,
    estatus:estatus
  }
  retornarDatosJson2(url_modelo_marketing_app,datasend,"location.reload()",false);
}

function EliminarBanner(idBann,img){
  var datasend = {
    op:"EliminarBanner",
    idBanner:idBann,
    imgBanner:img
  }
  retornarDatosJson2(url_modelo_marketing_app,datasend,"location.reload()",false);
}

function inicializar(){
  $('.slickClass').slick({
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    infinite: true,
    arrows:false
  });
}

  // Arrastrar renglón
 tbody.sortable({
    items: 'tr',
    axis: 'y',
    handle: '.handle',
    placeholder: 'ui-sortable-placeholder',
    start: function (event, ui) {
       ui.item.addClass('ui-sortable-item');

       ui.placeholder.height($(ui.item).height());
       ui.placeholder.width($(ui.item).width());

       // show all rows
       // tabla_bancompletos.page.len(-1).draw(false);

       // refresh so that newly shown rows are counted as sortable items
       $(this).sortable('refresh');

       // sort table by sequence
       // tabla_bancompletos.order([4, 'asc']).draw(false);
    },
    sort: function (event, ui) {
    },
    stop: function (event, ui) {
       enlistarBanner();
       // console.log("Arrastrado");
    }
 });
 // Arrastrar renglón

 $(".handle").mousedown((e) => {
    // console.log("arrastrando");
    document.documentElement.style.cursor = "grabbing";
    // console.log($.cursor =);
 });

 function handleDragStart(e) { // this.style.opacity = '0.4';  // este / e.target es el nodo de origen.
    dragSrc = this;
    // Realizar un seguimiento de la celda de origen

    // Permitir movimientos
    e.dataTransfer.effectAllowed = 'move';

    // Obtener los datos de la celda y almacenarlos en el objeto de datos de transferencia
    e.dataTransfer.setData('text/html', this.innerHTML);
 }

 function handleDragOver(e) {
    if (e.preventDefault) {
       e.preventDefault(); // Necesario. Nos permite dejarlo caer.
    }

    // Permitir movimientos
    e.dataTransfer.dropEffect = 'move'; // Vea la sección sobre el objeto DataTransfer.

    return false;
 }

 function handleDragEnter(e) {
    // este / e.target es el objetivo de desplazamiento actual.

    // Aplicar visual de zona de caída
    this.classList.add('over');
 }

 function handleDragLeave(e) {
    // este / e.target es el elemento de destino anterior.

    // Eliminar visual de la zona de caída
    this.classList.remove('over');
 }

 function handleDrop(e) { // este / e.target es el elemento de destino actual.

    if (e.stopPropagation) {
       e.stopPropagation(); // evita que el navegador redirija.
    }

    // No hagas nada si sueltas la misma columna que estamos arrastrando.
    if (dragSrc != this) { // Establece el HTML de la columna de origen en el HTML de la columna en la que soltamos.
       dragSrc.innerHTML = this.innerHTML;

       // Establezca la celda de distinción para los datos de transferencia desde la fuente
       this.innerHTML = e.dataTransfer.getData('text/html');

       // Invalide la celda src y la celda dst para que DT actualice su caché y luego dibuje
       tabla_bancompletos.cell(dragSrc).invalidate();
       tabla_bancompletos.cell(this).invalidate().draw(false);
    console.log(e.target);
 }
    let td = $(e.target);
    console.log(td.parent());
    return false;
 }

 function handleDragEnd(e) {
    // este / e.target es el nodo de origen.
    e.target.style.opacity = '1.0';
    [].forEach.call(cells, function (cell) {
      // Asegúrate de eliminar la clase visual de la zona de caída
      cell.classList.remove('over');
    });
  }

 function enlistarBanner() {
     orden = 1;
     tbody.find("i.handle").each(function () {
        let td_handle = $(this);
        td_handle.data("orden",orden);
        let orden_td = td_handle.data("orden");
        let id_td = td_handle.data("id");
        console.log("idbanner: "+id_td);
        console.log("orden: "+orden_td);

        let data = {
          op:"UpdatePosicionOrden",
          idBanner:id_td,
          orden:orden_td
        };
        retornarDatosJson2(url_modelo_marketing_app,data,"",false);
        orden++;
     });
  }
