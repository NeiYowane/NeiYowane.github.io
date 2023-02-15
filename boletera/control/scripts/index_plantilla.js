'use strict';
$(document).ready(() => {

});

//#region RUTAS AL APP DE LOS MODELOS
const
   url_modelo_usuario_app = "../Backend/Usuario/App.php",
   url_modelo_perfil_app = "../Backend/Perfil/App.php",
   url_modelo_menu_app = "../Backend/Menu/App.php",
   url_modelo_permiso_app = "../Backend/Permiso/App.php"

;
//#endregion

const UN_SEGUNDO = 1000;
const MEDIO_SEGUNDO = 500;
const CUARTO_SEGUNDO = 100;
const INTERVALO_BEFORE = 5;
const INTERVALO_COMPLETE = MEDIO_SEGUNDO;
const TIEMPO_MOSTRAR_ALERTA_CARGANDO = 100;
let tiempo_transcurrido = 0;
let hay_boton = false;


/*Select2*/
$.fn.select2.defaults.set('language', 'es');
moment.locale('es');
// console.log(moment.locale('es'));

// /* CERRAR SESION
// let btn_cerrar_sesion = document.getElementById("btn_cerrar_sesion")
// let i = btn_cerrar_sesion.querySelector("i")

// $("#btn_cerrar_sesion").mouseover(function () {
//    i.classList.remove("fa-door-closed");
//    i.classList.add("fa-door-open");
// })
// $("#btn_cerrar_sesion").mouseleave(function () {
//    i.classList.remove("fa-door-open");
//    i.classList.add("fa-door-closed");
// })

// $("#btn_cerrar_sesion").click((e) => {
//    e.preventDefault();
//    let datos = {accion:"cerrar_sesion"};
//    $.ajax({
//       url: "../Models/Usuario/App.php",
//       type: "POST",
//       data: datos,
//       dataType: "json",
//       success: (ajaxResponse) => {
//          if (ajaxResponse.Resultado == "correcto")
//             window.location.href = "../../"
//       }
//    })
// });

function relllenarTablaX(datos) {
   $.ajax({
      type: "POST",
      url: url_modelo_menu_app,
      data: datos,
      dataType: "json",
      beforeSend: () => {

      },
      success: () => {
         
      },
      error: () => {

      },
      complete: () => {
         
      }
   });

   //Limpiar tabla
   $("table tbody").slideUp();
   tabla.clear().draw();
}



function mayusculas(e) {
   e.value = e.value.toUpperCase();
};

function focusSelect2(select2) {
   select2.click(function (e) {
      try {
         var buscador = $(".select2-search__field");
         buscador[0].focus();
      } catch (e) {

      }
   });
   select2.keydown(function (e) {
      try {
         var buscador = $(".select2-search__field");
         buscador[0].focus();
      } catch (e) {

      }
   });
}


/* --- FUNCIONES DE CAJON--- */
function peticionAjax(url, datos, funcion_en_success) {
   if (datos == null) {
      datos = {};
   }
   hay_boton = false;

   $.ajax({
      url,
      type: "POST",
      data: datos,
      dataType: "json",
      beforeSend: () => {
         clearInterval(tiempo_transcurrido);
         tiempo_transcurrido = 0;
         setInterval(() => { tiempo_transcurrido++; },INTERVALO_BEFORE);
         if (tiempo_transcurrido > TIEMPO_MOSTRAR_ALERTA_CARGANDO) { mostrarBlockOutCargando(); }
         // mostrarBlockOutCargando();
      },
      success: (ajaxResponse) => {
         if (ajaxResponse.Resultado == "correcto") {
            if (funcion_en_success == null)
               return;

            funcion_en_success(ajaxResponse);
         } else if (ajaxResponse.Resultado == "incorrecto") {
            hay_boton = true;
            Swal.fire({
               icon: "error",
               title: "Oops...!",
               text: `${ajaxResponse.Texto_alerta}`,
               showConfirmButton: true,
               confirmButtonColor: '#494E53'
            })
         }
      },
      error: (error) => { // console.error(error.ajaxResponseText)
         hay_boton = true;
         Swal.fire({
            icon: "error",
            title: "Oops...!",
            text: `Hubo un error, verifica tus datos e intenta de nuevo.`,
            showConfirmButton: true,
            confirmButtonColor: '#494E53'
         })
      },
      complete: () => {
         if (!hay_boton) {
            setTimeout(() => {
               swal.close();
            }, INTERVALO_COMPLETE);
         }            
         // if (funcion_en_complete == "LISTO") {
            // if (tiempo_transcurrido > TIEMPO_MOSTRAR_ALERTA_CARGANDO) {
            //    mostrarBlockOutListo();
            //    clearInterval(tiempo_transcurrido);
            // }
         // }
         // else if (funcion_en_complete == "AGREGADO")
         //    mostrarAlerta(null,"sucess","EXITO","Registrado");
         // else if (funcion_en_complete == null)
         //    return;
         // else
         //    funcion_en_complete();
      }
   })
}





function peticionAjaxTabla(url, datos, tabla, nombre_tabla) {
   if (datos == null) {
      datos = {};
   }
   tiempo_transcurrido = 0
   hay_boton = false;

   $.ajax({
      url,
      type: "POST",
      data: datos,
      dataType: "json",
      beforeSend: () => {
         clearInterval(tiempo_transcurrido);
         tiempo_transcurrido = 0;
         setInterval(() => { tiempo_transcurrido++; },INTERVALO_BEFORE);
         if (tiempo_transcurrido > TIEMPO_MOSTRAR_ALERTA_CARGANDO) { mostrarBlockOutCargando(); }
         // mostrarBlockOutCargando();
      },
      success: (ajaxResponse) => {
         if (ajaxResponse.Resultado == "correcto") {
            if (!ajaxResponse.Sin_modal) {
               formulario_modal[0].reset();
               $(".btn-close").click();
            }
            mostrarAlertaTabla(ajaxResponse,tabla,nombre_tabla); //nombre tabla NO obligatorio
         } else if (ajaxResponse.Resultado == "incorrecto") {
            hay_boton = true;
            Swal.fire({
               icon: "error",
               title: "Oops...!",
               text: `${ajaxResponse.Texto_alerta}`,
               showConfirmButton: true,
               confirmButtonColor: '#494E53'
            })
         }
      },
      error: (error) => { // console.error(error.ajaxResponseText)
         hay_boton = true;
         Swal.fire({
            icon: "error",
            title: "Oops...!",
            text: `Hubo un error, verifica tus datos e intenta de nuevo.`,
            showConfirmButton: true,
            confirmButtonColor: '#494E53'
         })
      },
      complete: (ajaxResponse) => {
         // if (!hay_boton) {
         //    setTimeout(() => {
         //       swal.close();
         //    }, INTERVALO_COMPLETE);
         // }
      }
   });

}
function mostrarAlertaTabla(ajaxResponse, tabla, nombre_tabla) {
   let icono = ajaxResponse.Icono_alerta;
   let titulo = ajaxResponse.Titulo_alerta;
   let texto = ajaxResponse.Texto_alerta;
   let btn_aceptar = ajaxResponse.DataBool;
   let timer = btn_aceptar == true ? false : 1500

   Swal.fire({
      icon: icono,
      title: titulo,
      html: texto,
      showConfirmButton: btn_aceptar,
      confirmButtonColor: '#494E53',
      timer: timer,
      allowEscapeKey: false,
      allowOutsideClick: false,
      showConfirmButton: false,
   }).then(() => {
      pintarTabla(tabla,nombre_tabla); //nombre tabla NO obligatorio
   })
}
function peticionAjaxRellenar(url, datos, funcion_en_success) {
   if (datos == null) {
      datos = {};
   }
   hay_boton = true;
   
   $.ajax({
      url,
      type: "POST",
      data: datos,
      dataType: "json",
      beforeSend: () => {
         clearInterval(tiempo_transcurrido);
         tiempo_transcurrido = 0;
         setInterval(() => { tiempo_transcurrido++; },INTERVALO_BEFORE);
         if (tiempo_transcurrido > TIEMPO_MOSTRAR_ALERTA_CARGANDO) { mostrarBlockOutCargando(); }      
         // mostrarBlockOutCargando();
      },
      success: (ajaxResponse) => {
         if (ajaxResponse.Resultado == "correcto") {
            if (funcion_en_success == null)
               return;

            funcion_en_success(ajaxResponse);
         } else if (ajaxResponse.Resultado == "incorrecto") {
            hay_boton = true;
            Swal.fire({
               icon: "error",
               title: "Oops...!",
               text: `${ajaxResponse.Texto_alerta}`,
               showConfirmButton: true,
               confirmButtonColor: '#494E53'
            })
         }
      },
      error: (error) => { // console.error(error.ajaxResponseText)
         hay_boton = true;
         Swal.fire({
            icon: "error",
            title: "Oops...!",
            text: `Hubo un error, verifica tus datos e intenta de nuevo.`,
            showConfirmButton: true,
            confirmButtonColor: '#494E53'
         })
      },
      complete: () => {
         if (!hay_boton) {
            setTimeout(() => {
               swal.close();
            }, INTERVALO_COMPLETE);
         }  
      }
   })
}
function mostrarAlertaConOpcionesTabla(url_modelo_app, titulo, texto, datos, tabla, nombre_tabla) {
   Swal.fire({
      title: titulo,
      text: texto,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Eliminar',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
   }).then((result) => {
      if (result.isConfirmed) {
         $.ajax({
            url: url_modelo_app,
            type: "POST",
            data: datos,
            dataType: "json",
            success: (ajaxResponseThen) => {
               Swal.fire({
                  icon: ajaxResponseThen.Icono_alerta,
                  title: ajaxResponseThen.Titulo_alerta,
                  text: ajaxResponseThen.Texto_alerta,
                  showConfirmButton: false,
                  timer: 1500
               })
               .then(() => {
                  pintarTabla(tabla, nombre_tabla); //nombre tabla NO obligatorio
               });
            }
         });
      }
   });
}





function mostrarAlertaExito(ajaxResponse, icono, titulo, texto, btn_aceptar, refresh) {
   if (ajaxResponse != null) {
      icono = ajaxResponse.Icono_alerta;
      titulo = ajaxResponse.Titulo_alerta;
      texto = ajaxResponse.Texto_alerta;
      btn_aceptar = ajaxResponse.DataBool;
   }
   if (btn_aceptar) {
      Swal.fire({
         icon: icono,
         title: titulo,
         html: texto,
         showConfirmButton: true,
         confirmButtonColor: '#494E53'
      }).then(() => {
         if (refresh) {
            console.log("refresh1");
            // window.location.reload();
         } else {
            return
         }

      })
   } else {
      Swal.fire({
         icon: icono,
         title: titulo,
         html: texto,
         timer: 1500,
         showConfirmButton: false
      }).then(() => {
         if (refresh) {
            window.location.reload();
         } else {
            return
         }
      })
   }
}

function mostrarAlerta(ajaxResponse, icono, titulo, texto, btn_aceptar, refresh) {
   if (ajaxResponse != null) {
      icono = ajaxResponse.Icono_alerta;
      titulo = ajaxResponse.Titulo_alerta;
      texto = ajaxResponse.Texto_alerta;
      btn_aceptar = ajaxResponse.DataBool;
   }
   if (btn_aceptar) {
      Swal.fire({
         icon: icono,
         title: titulo,
         html: texto,
         showConfirmButton: true,
         confirmButtonColor: '#494E53'
      }).then(() => {
         if (refresh) {
            console.log("refresh2");
            // window.location.reload();
         } else {
            return
         }

      })
   } else {
      Swal.fire({
         icon: icono,
         title: titulo,
         html: texto,
         timer: 1500,
         showConfirmButton: false
      }).then(() => {
         if (refresh) {
            window.location.reload();
         } else {
            return
         }
      })
   }
}
function mostrarAlertaConOpciones(url_modelo_app,titulo, texto, datos,refresh,funcion_then) {
   Swal.fire({
      title: titulo,
      text: texto,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Eliminar',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
   }).then((result) => {
      if (result.isConfirmed) {
         $.ajax({
            url: url_modelo_app,
            type: "POST",
            data: datos,
            dataType: "json",
            success: (ajaxResponseThen) => {
               Swal.fire({
                  icon: ajaxResponseThen.Icono_alerta,
                  title: ajaxResponseThen.Titulo_alerta,
                  text: ajaxResponseThen.Texto_alerta,
                  showConfirmButton: false,
                  timer: 1500
               }).then(() => {
               if (refresh) { console.log("refresh3"); /*window.location.reload();*/}
                  switch (funcion_then) {
                     case "nada":
                        break;
                     default:
                        break;
                  }
               });
            }
         });
      }
   });
}
function mostrarToast(icono, mensaje, posicion) {
   if (posicion == null) {posicion = 'top-end'}
   const Toast = Swal.mixin({
      toast: true,
      position: posicion,
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true,
      didOpen: (toast) => {
         toast.addEventListener('mouseenter', Swal.stopTimer)
         toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
   })

   Toast.fire({icon: icono, title: mensaje})
}
function mostrarBlockOutCargando() {
   Swal.fire({
      title: 'Cargando...',
      // html: 'I will close in <b></b> milliseconds.',
      allowEscapeKey: false,
      allowOutsideClick: false,
      showConfirmButton: false,
      didOpen: () => {
         Swal.showLoading()
      }
   })
}
function mostrarBlockOutListo() {
   Swal.fire({
      title: "LISTO!",
      timer: 500,
      allowEscapeKey: false,
      allowOutsideClick: false,
      didOpen: () => {
         Swal.showLoading()
      }
   })
}
function validarInput(input, nombre_campo) {
   if (input.val() == "" || input.val() == -1 || input.val() == "-1") {
      // mostrarToast('error', `Campo ${nombre_campo} vacio.`);
      toastr.error(`Campo ${nombre_campo} vacio.`,'ERROR');
      input.focus();
      return false;
   }
   return true;
}
function formatearCantidadMX(cantidad) {
   let total = new Intl.NumberFormat("es-MX").format(cantidad);
   if (!total.includes(".")) {total+=".00"}
   let decimales = total.split(".").reverse();
   if (decimales[0].length == 1) {total+="0"}
   if (cantidad == 0) {total=="0.00"}

   return total;
}
function formatearCantidadDeRenglones(tds) {
   $.each(tds, function (i, elemento) {
      let td = $(elemento);
      let cantidad = td.text();
      let cantidad_formateada = formatearCantidadMX(cantidad);
      td.html(`$ ${cantidad_formateada}`);

   });
}
function formatearFechaHora(la_fecha) {
   let fecha = new Date(parseInt(la_fecha.substr(6)));
   let fecha_hora = new Intl.DateTimeFormat("es-MX", { day: '2-digit', month: '2-digit', year: 'numeric', hour: "2-digit", minute: "2-digit", second: "2-digit", hour12: true }).format(fecha);

   return fecha_hora;
}
function formatearFechaHoraNormal(la_fecha) {
   let fecha = new Date(la_fecha);
   let fecha_hora;

   if (la_fecha.length <= 10) {
      fecha = new Date(fecha.setDate(fecha.getDate()+1));
      return fecha_hora = new Intl.DateTimeFormat("es-MX", { day: '2-digit', month: '2-digit', year: 'numeric'}).format(fecha);
   }

   fecha = new Date(la_fecha);
   return fecha_hora = new Intl.DateTimeFormat("es-MX", { day: '2-digit', month: '2-digit', year: 'numeric', hour: "2-digit", minute: "2-digit", second: "2-digit", hour12: true }).format(fecha);
}
/* --- FUNCIONES DE CAJON--- */


//VALIDAR RANGO DE FECHAS
function validarRangoFechas(accion) {
   let
      fecha_actual = new Date();
      ayer = new Date(fecha_actual.setDate(fecha_actual.getDate()-1));
      ayer = new Date(ayer.setHours(23,59,59))
      ayer = ayer.getTime();

      fecha1 = new Date(input_fecha_inicial.val());
      fecha1 = new Date(fecha1.setDate(fecha1.getDate()+1));
      fecha1 = new Date(fecha1.setHours(0,0,0));
      data_fecha1 = new Date(fecha1).getTime();

      fecha2 = new Date(input_fecha_final.val());
      fecha2 = new Date(fecha2.setDate(fecha2.getDate()+1));
      fecha2 = new Date(fecha2.setHours(11,59,59));
      data_fecha2 = new Date(fecha2).getTime();

   if(accion == "crear"){
      if (data_fecha1 <= ayer) {
         mostrarToast("warning", "No puedes publicar con fecha anterior a hoy.");
         input_fecha_inicial.focus();
         return false;
      }
   }
   if (data_fecha1 > data_fecha2) {
      mostrarToast("warning", "Rango de fechas inválido.");
      input_fecha_final.focus();
      return false;
   }
   return true;
}

//AGREGAR DATO AL ARRAY
function agregarDatoAlArray(nombre,valor,array) {
   //array obtenido de formulario_modal.serializeArray()
   // console.log(nombre,valor,array);
   let dato_nuevo = {
      name: nombre,
      value: valor
   }
   array.push(dato_nuevo)
}

//RESETEAR SELECT 2
function resetearSelect2(select2) {
   select2.prop('selectedIndex', 0);
   select2.val("-1");
   $(`#select2-${select2[0].name}-container`).text('Selecciona una opción');
   $(`#select2-${select2[0].name}-container`).attr('title', 'Selecciona una opción');
   rellenarSelect2(-1,select2[0].name);
}

/* ------ RELLENAR SELECTS 2 ------ */

// Select2 Padre
function rellenarSelect2(id_activo,nombre_select) {
   let datos = {accion:"mostrar_menus_padre"};

   $.ajax({
      type: "POST",
      url: url_modelo_menu_app,
      data: datos,
      dataType: "json",
      success: function (ajaxResponse) {
         if (ajaxResponse.Resultado) {
            switch (nombre_select) {
               case "input_id_padre":
                  rellenarSelect2Padre(ajaxResponse,id_activo);
                  break;
               
               default:
                  break;
            }

         } else {
            Swal.fire({
               icon: "error",
               title: "Oops...!",
               text: `${ajaxResponse.Texto_alerta}`,
               showConfirmButton: true,
               confirmButtonColor: '#494E53'
            })
         }
      }
   });
}

function rellenarSelect2Padre(ajaxResponse,id_activo) {
   let coleccion = ajaxResponse.Datos;

   input_id_padre.html("");

   let opciones = /*HTML*/ `
      <option value="-1">Selecciona una opción</option>
   `;

   if (id_activo == 0) {
      opciones += /*HTML*/ `
         <option value="0" selected>*** Módulo Padre ***</option>
      `;
      input_url.attr('readonly', true);
      input_url.val('#');
      input_descripcion.focus();
   } else {
      opciones += /*HTML*/ `
         <option value="0">*** Módulo Padre ***</option>
      `;
      input_url.attr('readonly', false);
   }

   
   input_id_padre.append(opciones);

   $.each(coleccion, function (i, objeto) { 
      if (objeto.menu_id == id_activo)
         input_id_padre.append(`<option selected value='${objeto.menu_id}'>${objeto.menu_descripcion}</option>`);
      else
         input_id_padre.append(`<option value='${objeto.menu_id}'>${objeto.menu_descripcion}</option>`);
   });
}

// Select2 ---
function rellenarSelect2XX(ajaxResponse,id_activo) {
   let coleccion = ajaxResponse.Datos;

   $.each(coleccion, function (i, objeto) { 
      if (id_activo > 0)
         input_id_padre.append(`<option selected value='${objeto}'>${objeto}</option>`);
      else
         input_id_padre.append(`<option value='${objeto}'>${objeto}</option>`);
   });
}


/* ------ RELLENAR SELECTS 2 ------ */


/*function count(elemento,limite){ //tiene error en el kill()
   var counter = { var: 0 };
   TweenMax.to(counter, 2, {
     var: limite,
     onUpdate: function () {
       var number = Math.ceil(counter.var);
       let cantidadFormateada = formatearCantidadMX(number);
       elemento.html(`$ ${cantidadFormateada}`);
       if(number === counter.var){ count.kill(); }
     },
     onComplete: function(){
       count();
     },
     ease:Circ.easeOut
   });
 }
 */

/*function contadorAnimado(elemento,cantidad) {  //se limita a llegar hasta donde le perimte la duracion
   elemento.each(function() {
      var $this = $(this),
         countTo = cantidad;
      let cantidadFormateada
      const duracion= cantidad/10;

      $({ countNum: $this.text()}).animate({
      countNum: countTo
      },
      {
      duration: 2000,
      easing:'linear',
      step: function() {
         cantidadFormateada = formatearCantidadMX(this.countNum);
         $this.text(`$ ${cantidadFormateada}`);
         // $this.text(Math.floor(this.countNum));
      },
      complete: function() {
         $this.text(`$ ${cantidadFormateada}`);
         // $this.text(this.countNum);
         //alert('finished');
      }

      });

   });
}
*/