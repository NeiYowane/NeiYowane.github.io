var tabla;

tabla = $('#tabla_usuarios').DataTable({
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
   tbody = $("tbody"),

   formulario = $("#formulario"),
   id = $("#id"),
   accion = $("#accion"),
   input_usuario = $("#input_usuario"),
   input_pwd = $("#input_pwd"),
   input_id_perfil =  $("#input_id_perfil"),

   btn_enviar_formulario = $("#btn_enviar_formulario"),
   btn_reset_formulario = $("#btn_reset_formulario")
;


funcionesIniciales();
function funcionesIniciales() {
   relllenarTabla();

   let datos = {accion:"mostrar_objetos"}
   rellenarSelect2(url_modelo_perfil_app,datos,-1,"input_id_perfil");
   input_usuario.focus();
}

//RESETEAR FORMULARIOS
btn_reset_formulario.click((e) => {
   let datos = {accion:"mostrar_objetos"}
   resetearSelect2(input_id_perfil,url_modelo_perfil_app,datos);
   id.val("");
   input_usuario.focus();
});

// REGISTRAR O EDITAR OBJETO
formulario.on("submit", (e) => {
   e.preventDefault();
   campo_valido = validarInput(input_usuario,"USUARIO");
   if (!campo_valido) return;
   campo_valido = validarInput(input_pwd,"CONTRASEÑA");
   if (!campo_valido) return;
   campo_valido = validarInput(input_id_perfil,"PERFIL");
   if (!campo_valido) return;

   if (id.val() <= 0)
      id.val("");

   accion.val("registrar_editar_objeto");

   let datos = formulario.serializeArray();

   // return console.log(datos);
   peticionRegistrarEditar(url_modelo_usuario_app,datos,relllenarTabla);
});
function relllenarTabla() {
   let datos = {accion:'mostrar_objetos'}
   peticionRellenarTabla(url_modelo_usuario_app,datos);
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
         id = objeto.usuario_id,
         usuario = objeto.usuario_usuario,
         pwd = objeto.usuario_pwd,
         id_perfil = objeto.usuario_id_perfil,
         perfil = objeto.perfil_perfil
      ;

      //Campos
      let
         campo_usuario = `${usuario}`,
         // campo_pwd = `${pwd}`,
         campo_perfil = `${perfil}`,
         campo_botones = //html
         `
         <td class='align-middle'>
            <div class='btn-group' role='group' aria-label='Basic example'>
               <button class='btn btn-outline-primary btn_editar' data-id='${id}' title='Editar Módulo'><i class='fa-solid fa-pen-to-square i_editar'></i></button>
               <button class='btn btn-outline-danger btn_eliminar' data-id='${id}' title='Eliminar Módulo' data-nombre='${usuario}'><i class='fa-solid fa-trash i_eliminar'></i></button>
            </div>
         </td>
         `
      ;

      //Dibujar Tabla
      tabla.row.add([
         campo_usuario,
         // campo_pwd,
         campo_perfil,
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

   peticionEditarObjeto(url_modelo_usuario_app,datos);
}
function rellenarFormulario(ajaxResponse) {
   let objeto = ajaxResponse.Datos[0];

   //Objeto
   let
         id_objeto = objeto.usuario_id,
         usuario = objeto.usuario_usuario,
         pwd = objeto.usuario_pwd,
         id_perfil = objeto.perfil_id,
         perfil = objeto.perfil_perfil
      ;

   //Formulario
   id.val(Number(id_objeto));
   input_usuario.val(usuario);
   input_pwd.val(pwd);

   let datos = {accion:"mostrar_objetos"}
   rellenarSelect2(url_modelo_perfil_app,datos,id_perfil,"input_id_perfil");
   input_usuario.focus();
}

//ELIMINAR OBJETO
function eliminarObjeto(btn_eliminar) {
   let titulo = "¿Estás seguro de eliminar éste usuario?";
   let texto = `${btn_eliminar.attr("data-nombre")} ?`;
   let datos = {
      accion: "eliminar_objeto",
      id: Number(btn_eliminar.attr("data-id"))
   }

   peticionEliminarObjeto(titulo,texto,url_modelo_usuario_app,datos);
}
