'use strict';
$(document).ready(() => {

});

const
   url_artista_app = "./control/Backend/Artistas/App.php",
   url_genero_app = "./control/Backend/Generos/App.php",
   url_bitacora_app = "./control/Backend/Bitacora/App.php"
;

let GenerosContainer = $('#ContainerGeneros');
let ArtistasContainer = $('#ArtistContainer');


function retornarDatosJson(url,datos,funcion) {
   $.ajax({
      type: "POST",
      url: url,
      data: datos,
      dataType: "json",
      beforeSend: function () {
         //mostrar pantalla cargando
         $.blockUI({ message: `<h4> Obteniendo Datos...</h4><br><div class='spinner-border text-light' role='status'> <span class='sr-only'></span></div>`, css: { backgroundColor: null, color: '#fff', border: null } });
      },
      success: (ajaxResponse) => {
         if (ajaxResponse.Resultado) {
           eval(funcion);
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
}

function mayusculas(e) {
   e.value = e.value.toUpperCase();
};

/* --- FUNCIONES DE CAJON--- */

function peticionAccion(url,datos) {
   $.ajax({
      type: "POST",
      url: url,
      data: datos,
      dataType: "json",
      beforeSend: function () {
         //mostrar pantalla cargando
         $.blockUI({ message: `<h4> REALIZANDO PETICIÓN, POR FAVOR ESPERE...</h4><br><div class='spinner-border text-light' role='status'> <span class='sr-only'></span></div>`, css: { backgroundColor: null, color: '#fff', border: null } });
      },
      success: (ajaxResponse) => {
         if (ajaxResponse.Resultado) {
           mostrarToast(ajaxResponse.Icono_alerta,ajaxResponse.Texto_alerta);
           cargarTablaFormulario();
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
}

function peticionAccionArchivo(url,datos) {
   $.ajax({
      type: "POST",
      url: url,
      data: datos,
      dataType: "json",
      contentType:false,
      cache:false,
      async: true,
      processData:false,
      beforeSend: function () {
         //mostrar pantalla cargando
         $.blockUI({ message: `<h4> REALIZANDO PETICIÓN, POR FAVOR ESPERE...</h4><br><div class='spinner-border text-light' role='status'> <span class='sr-only'></span></div>`, css: { backgroundColor: null, color: '#fff', border: null } });
      },
      success: (ajaxResponse) => {
         if (ajaxResponse.Resultado) {
           mostrarToast(ajaxResponse.Icono_alerta,ajaxResponse.Texto_alerta);
           cargarTablaFormulario();
         } else {
            Swal.fire({
               icon: "error",
               title: "Oops...!2",
               text: `${ajaxResponse.Texto_alerta}`,
               showConfirmButton: true,
               confirmButtonColor: '#494E53'
            })
         }
      },
      error: (ajaxResponse) => {
         Swal.fire({
            icon: "error",
            title: "Oops...!1",
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
}

function peticionEliminarObjeto(titulo,texto,url,datos) {
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
            type: "POST",
            url: url,
            data: datos,
            dataType: "json",
            beforeSend: function () {
               //mostrar pantalla cargando
               $.blockUI({ message: `<h4> REALIZANDO PETICIÓN, POR FAVOR ESPERE...</h4><br><div class='spinner-border text-light' role='status'> <span class='sr-only'></span></div>`, css: { backgroundColor: null, color: '#fff', border: null } });
            },
            success: (ajaxResponse) => {
               if (ajaxResponse.Resultado) {
                  Swal.fire({
                     icon: ajaxResponse.Icono_alerta,
                     title: ajaxResponse.Titulo_alerta,
                     html: ajaxResponse.Texto_alerta,
                     showConfirmButton: false,
                     confirmButtonColor: '#494E53',
                     timer: 1500,
                     allowEscapeKey: false,
                     allowOutsideClick: false,
                     showConfirmButton: false,
                  })
                  relllenarTabla();

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
      mostrarToast('error', `Campo ${nombre_campo} vacio.`);
      // toastr.error(`Campo ${nombre_campo} vacio.`,'ERROR');
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
