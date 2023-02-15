var tabla;

tabla = $('#tabla_modulos').DataTable({
   responsive: true,
   language: {
      url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es-mx.json"
   },
   columnDefs: [
      {
         "className": "dt-center",
         "targets": "_all"
      }
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

const
   btns_editar = document.querySelectorAll(".btn_editar"),
   btns_eliminar = document.querySelectorAll(".btn_eliminar"),
   modal_title = $(".modal-title"),
   
   tbody = $("tbody"),
   
   formulario = $("#formulario"),
   id = $("#id"),
   accion = $("#accion"),
   input_descripcion = $("#input_descripcion"),
   input_id_padre = $("#input_id_padre"),
   input_url = $("#input_url"),
   input_orden = $("#input_orden"),
   // input_habilitado = $("#input_habilitado"),

   btn_enviar_formulario = $("#btn_enviar_formulario"),
   btn_reset_formulario = $("#btn_reset_formulario")
;

/* ---------- FUNCIONES DE CAJON ---------- */

/* ---------- FUNCIONES DE CAJON ---------- */


funcionesIniciales();
function funcionesIniciales() {
   relllenarTabla();
   let datos = {accion:"mostrar_menus_padre"};
   rellenarSelect2(url_modelo_menu_app,datos,-1,"input_id_padre");
   input_descripcion.focus();
}

//RESETEAR FORMULARIOS
btn_reset_formulario.click((e) => {
   let datos = {accion:"mostrar_menus_padre"};
   resetearSelect2(input_id_padre,url_modelo_menu_app,datos);
   input_url.attr('readonly', false);
   id.val("");
   input_descripcion.focus();
});

//BLOQUEAR INPUT URL EN CASO DE ELEGIR LA OPCION DE "PADRE"
input_id_padre.on("input", function (e) {
   let valor = $(this).val();
   if (valor == 0) {
      input_url.val('#');
      input_url.attr('readonly', true);
   } else {
      input_url.val('');
      input_url.attr('readonly', false);
   }
});

// REGISTRAR O EDITAR OBJETO
formulario.on("submit", (e) => {
   e.preventDefault();
   campo_valido = validarInput(input_descripcion,"NOMBRE DEL MÓDULO");
   if (!campo_valido) return;
   campo_valido = validarInput(input_id_padre,"PERTENECE A");
   if (!campo_valido) return;
   campo_valido = validarInput(input_url,"URL");
   if (!campo_valido) return;
   campo_valido = validarInput(input_orden,"POSICIÓN");
   if (!campo_valido) return;
   // campo_valido = validarInput(input_habilitado,"HABILITADO");
   // if (!campo_valido) return;

   if (id.val() <= 0)
      id.val("");

   accion.val("registrar_editar_objeto");

   let datos = formulario.serializeArray();

   // return console.log(datos);
   peticionRegistrarEditar(url_modelo_menu_app,datos,relllenarTabla);
});
function relllenarTabla() {
   let datos = {accion:'mostrar_objetos'}
   peticionRellenarTabla(url_modelo_menu_app,datos);
}
function pintarTabla(ajaxResponse) {
   //Limpiar tabla
   $("table tbody").slideUp();
   tabla.clear().draw();

   let objResponse = ajaxResponse.Datos;
   let menus_padres = [];

   $.each(objResponse, function (i, objeto) {
      if (Number(objeto.menu_id_padre) == 0) {
         menus_padres.push(objeto);
      }
   });

   
   $.each(objResponse, function (i, objeto) {
      //Objeto
      let 
         id = objeto.menu_id,
         descripcion = objeto.menu_descripcion,

         id_padre = objeto.menu_id_padre,
         nivel = id_padre > 0 ? "Hijo" : "Padre",
         pertenece = "---",
         url = objeto.menu_url == '#' ? '---' : objeto.menu_url,
         orden = objeto.menu_orden,
         habilitado = objeto.menu_habilitado == true ? `<i class="fa fa-check-circle fa-2x" style="color:green" aria-hidden="true"></i>` : `<i class="fa fa-times-circle fa-2x" style="color:red" aria-hidden="true"></i>`
      ;
      $.each(menus_padres, function (i, padre) { 
         if (objeto.menu_id_padre == padre.menu_id_padre) {
            pertenece = objeto.menu_descripcion;
         }
      });

      //Campos
      let
         campo_modulo = `${descripcion}`,
         campo_nivel = `${nivel}`,
         campo_pertenece = `${pertenece}`,
         campo_url = `${url}`,
         campo_orden = `${orden}`,
         campo_botones = //html 
         `
         <td class='align-middle'>
            <div class='btn-group' role='group' aria-label='Basic example'>
               <button class='btn btn-outline-primary btn_editar' data-id='${id}' title='Editar Módulo'><i class='fa fa-pencil-square-o fa-lg i_editar'></i></button>
               <button class='btn btn-outline-danger btn_eliminar' data-id='${id}' title='Eliminar Módulo' data-nombre='${descripcion}'><i class='fa fa-trash-o i_eliminar'></i></button>
            </div>
         </td>
         `
      ;

      //Dibujar Tabla
      tabla.row.add([
         campo_modulo,
         campo_nivel,
         campo_pertenece,
         campo_url,
         campo_orden,
         campo_botones
      ]).draw().node();
      tabla.columns.adjust().draw();
   });
   $("table tbody").slideDown('slow');
}


//ACCIONES EN BOTONES DE LA TABLA
tbody.click((e) => {
   e.preventDefault();

   //EDITAR OBJETO
   if ($(e.target).hasClass("btn_editar") || $(e.target).hasClass("i_editar")) {
      let btn_editar;
      
      if ($(e.target).hasClass('i_editar')) { btn_editar = $(e.target).parent() }
      else { btn_editar = $(e.target) }

      editarObjeto(btn_editar);
   }
   
   //ELIMINAR OBJETO
   if ($(e.target).hasClass('btn_eliminar') || $(e.target).hasClass('i_eliminar')){
      let btn_eliminar;

      if ($(e.target).hasClass('i_eliminar')) { btn_eliminar = $(e.target).parent() }
      else { btn_eliminar = $(e.target) }

      eliminarObjeto(btn_eliminar);
   }
});

//EDITAR OBJETO
function editarObjeto(btn_editar) {
   let id_objeto = btn_editar.attr('data-id');
   let datos = {id:id_objeto, accion:"mostrar_objeto"};

   peticionEditarObjeto(url_modelo_menu_app,datos);
}
function rellenarFormulario(ajaxResponse) {
   let objeto = ajaxResponse.Datos[0];

   //Objeto
   let 
      id_objeto= objeto.menu_id,
      descripcion = objeto.menu_descripcion,
      id_padre = objeto.menu_id_padre,
      nivel = id_padre > 0 ? "Hijo" : "Padre",
      url = objeto.menu_url == '#' ? ' ' : objeto.menu_url,
      perfil = objeto.menu_perfil,
      orden = objeto.menu_orden
   ;

   //Formulario
   id.val(Number(id_objeto));
   input_descripcion.val(descripcion);
   let datos = {accion:"mostrar_menus_padre"};
   rellenarSelect2(url_modelo_menu_app,datos,id_padre,"input_id_padre");
   input_url.val(url);
   input_orden.val(orden);
   input_descripcion.focus();
}

//ELIMINAR OBJETO
function eliminarObjeto(btn_eliminar) {
   let titulo = "¿Estás seguro de eliminar éste módulo?";
   let texto = `${btn_eliminar.attr("data-nombre")} ?`;
   let datos = {
      accion: "eliminar_objeto",
      id: Number(btn_eliminar.attr("data-id"))
   }

   peticionEliminarObjeto(titulo,texto,url_modelo_menu_app,datos);
}