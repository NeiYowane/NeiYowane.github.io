console.log("permisos");

const

   formulario = $("#formulario"),
   id = $("#id"),
   accion = $("#accion"),
   input_id_perfil = $("#input_id_perfil"),
   input_permisos_todos = $("#input_permisos_todos"),
   div_permisos = $("#permisos"),

   btn_enviar_formulario = $("#btn_enviar_formulario"),
   btn_reset_formulario = $("#btn_reset_formulario")
;


funcionesIniciales();
function funcionesIniciales() {
   cargarMenus();
   let datos = {accion:"mostrar_objetos"};
   rellenarSelect2(url_modelo_perfil_app,datos,-1,"input_id_perfil");
}

//RESETEAR FORMULARIOS
btn_reset_formulario.click((e) => {
   let datos = {accion:"mostrar_objetos"}
   resetearSelect2(input_id_perfil,url_modelo_perfil_app,datos);
   id.val("");
   input_id_perfil.focus();
});

//CAMBIO EN EL INPUT_PERFIL
input_id_perfil.change(function (e) { 
   let id_perfil = $(this).val();
   id.val(id_perfil);
   rellenarPermisos(id_perfil);
});

function rellenarPermisos(id_perfil) {
   let datos = {accion:"mostrar_permisos", input_id_perfil:id_perfil};

   $.ajax({
      type: "POST",
      url: url_modelo_permiso_app,
      data: datos,
      dataType: "json",
      beforeSend: () => {
         //mostrar pantalla cargando
         $.blockUI({ message: `<h4> REALIZANDO PETICIÓN, POR FAVOR ESPERE...</h4><br><div class='spinner-border text-light' role='status'> <span class='sr-only'></span></div>`, css: { backgroundColor: null, color: '#fff', border: null } });
      },
      success: (ajaxResponse) => {
         if (ajaxResponse.Resultado) {
            pintarPermisos(ajaxResponse);

         } else {
            Swal.fire({
               icon: "error",
               title: "Oops...!",
               text: `${ajaxResponse.Texto_alerta}`,
               showConfirmButton: true,
               confirmButtonColor: '#494E53'
            })
         }
      },
      error: (ajaxResponse) => {
         Swal.fire({
            icon: "error",
            title: "Oops...!",
            text: `Hubo un error, verifica tus datos e intenta de nuevo.`,
            showConfirmButton: true,
            confirmButtonColor: '#494E53'
         })
      },
      complete: () => {
         //quitar pantalla cargando
         $.unblockUI();
      }
   });

   function pintarPermisos(ajaxResponse) {
      let objResponse = ajaxResponse.Datos[0];
      $(".permisos_todos").prop("checked", false);

      if (objResponse.perfil_permisos != null) {
         let permisos = objResponse.perfil_permisos.split(',');
         $.each(permisos, function (i, permiso) {
            $(`#input_permisos_${permiso}`).prop('checked', true);
         });
      }
      verificarTodosLosPermisosActivos();
   }

}


// OTORGAR PERMISOS
formulario.on("submit", (e) => {
   e.preventDefault();
   campo_valido = validarInput(input_id_perfil,"PERFIL");
   if (!campo_valido) return;

   accion.val("otorgar_permisos");

   let datos = formulario.serializeArray();

   // return console.log(datos);
   peticionRegistrarEditar(url_modelo_permiso_app,datos,actualizarMenu);
});
function actualizarMenu() {
   setTimeout(() => {
      window.location.reload();
   }, 1500);
}


function cargarMenus() {
   let datos = {accion:"mostrar_objetos"}

   $.ajax({
      type: "POST",
      url: url_modelo_menu_app,
      data: datos,
      dataType: "json",
      beforeSend: () => {
         //poner pantalla cargando
         $.blockUI({ message: `<h4> REALIZANDO PETICIÓN, POR FAVOR ESPERE...</h4><br><div class='spinner-border text-light' role='status'> <span class='sr-only'></span></div>`, css: { backgroundColor: null, color: '#fff', border: null } });
      },
      success: (ajaxResponse) => {
         if (ajaxResponse.Resultado) {
            pintarMenus(ajaxResponse);

         } else {
            Swal.fire({
               icon: "error",
               title: "Oops...!",
               text: `${ajaxResponse.Texto_alerta}`,
               showConfirmButton: true,
               confirmButtonColor: '#494E53'
            })
         }
      },
      error: (ajaxResponse) => {
         Swal.fire({
            icon: "error",
            title: "Oops...!",
            text: `Hubo un error, verifica tus datos e intenta de nuevo.`,
            showConfirmButton: true,
            confirmButtonColor: '#494E53'
         })
      },
      complete: () => {
         //quitar pantalla cargando
         $.unblockUI();
      }
   });

   function pintarMenus(ajaxResponse) {
      let objResponse = ajaxResponse.Datos;
      let menus_padres = [];
      let menus_hijos = [];

      $.each(objResponse, function (i, objeto) { 
         if (Number(objeto.menu_id_padre) == 0){
            menus_padres.push(objeto);
         } else {
            menus_hijos.push(objeto);
         }
      });
      
      // PINTANDO MENUS PADRE
      $.each(menus_padres, function (i, objeto) {
         // OPCION PARA SELECCIONAR TODOS LOS HIJOS POR EL PADRE
         seccion_menu = /*html*/ 
         `
         <div class="row">
            <div class="col-12 mb-2">
               <div class="form-check form-check-inline">
                  <input class="form-check-input permisos_todos permisos_${objeto.menu_descripcion}" type="checkbox" value="${objeto.menu_id}" id="input_permisos_${objeto.menu_id}" name="input_permisos[]">
                  <label class="form-check-label h6" for="input_permisos_${objeto.menu_id}">
                     ${objeto.menu_descripcion}
                  </label>
               </div>
            </div>
            <div class="col-12">
               <div class="row container" id="hijos_del_padre_${objeto.menu_id}"></div>
            </div>
         </div>
         <hr>
         `;

         // seccion_menu = /*html*/ 
         // `
         // <div class="row">
         //    <div class="col-12 mb-2 h6">
         //       ${objeto.menu_descripcion}
         //    </div>
         //    <div class="col-12">
         //       <div class="row container" id="hijos_del_padre_${objeto.menu_id}"></div>
         //    </div>
         // </div>
         // <hr>
         // `;
         div_permisos.append(seccion_menu);
      });

      // PINTAR MENUS HIJOS
      $.each(menus_hijos, function (i, objeto) {
         menu_hijo = /*html*/ 
         `
         <div class="col-md-3">
            <div class="form-check form-check-inline">
               <input class="form-check-input permisos_todos permisos_${objeto.menu_id_padre}" data-id-padre="${objeto.menu_id_padre}" type="checkbox" value="${objeto.menu_id}" id="input_permisos_${objeto.menu_id}" name="input_permisos[]">
               <label class="form-check-label" for="input_permisos_${objeto.menu_id}">
                  ${objeto.menu_descripcion}
               </label>
            </div>
         </div>
         `;
         $(`#hijos_del_padre_${objeto.menu_id_padre}`).append(menu_hijo);
      });
   }
}

// ACTIVAR Y DESACTIVAR TODOS LOS PERMISOS
input_permisos_todos.click(() => {
   estado = input_permisos_todos.prop("checked")
   $(".permisos_todos").prop("checked", estado);
});
//TODOS LOS PERMISOS ACTIVOS O NO?
div_permisos.change(() => {
   verificarTodosLosPermisosActivos();
});
//ACTIVAR O DESACTIVAR PERMISOS POR CATALOGO?
// div_permisos.change(() => {
//    let todos_activos = true;
//    $.each($(".permisos_todos"), function (i, permiso) { 
//       if (!$(permiso).prop("checked")) { todos_activos = false; }
//    })
//    console.log(todos_activos);
//    if (todos_activos) { input_permisos_todos.prop("checked", true); }
//    else { input_permisos_todos.prop("checked", false); }
// })

function verificarTodosLosPermisosActivos() {
   let todos_activos = true;
   $.each($(".permisos_todos"), function (i, permiso) { 
      if (!$(permiso).prop("checked")) { todos_activos = false; }
   })
   if (todos_activos) { input_permisos_todos.prop("checked", true); }
   else { input_permisos_todos.prop("checked", false); }
}