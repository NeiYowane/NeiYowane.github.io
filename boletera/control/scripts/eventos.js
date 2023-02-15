
$(document).ready(function(){
  select_Escenarios.selectpicker();
  select_Artistas.selectpicker();
  getArtistas();
  getEscenario();
});
// Variables que contienen los ids que se necesitan para hacer inserts (Tabla Eventos)
let idEscenario;
let idArtista;
let accion;
// me quede en este punto 
function clearModal()
{
  $('#TituloEventoId').val('');
  $('#ImagenEventoId').val('');
  $('#FechaEventoId').val('');
  $('#HoraEventoId').val('');
  $('#SinopsisId').val('');
  $('#ObservacionesId').val('');
  select_Escenarios.selectpicker('refresh');
  $('#ImagenEscenarioId').val('');
  select_Artistas.selectpicker('refresh');
}
$('#btnNuevoEvento').click(function(){
  clearModal();
  $('#modalTitle').text('Añadir Nuevo Evento');
  $('#AñadirEvento').text('Añadir');
  accion = 'insertaEvento';
  $("#op").val(accion);
  console.log(accion);
});

$('.opcionEditar').click(function(){
  clearModal();
  $('#modalTitle').text('Editar Evento');
  $('#AñadirEvento').text('Guardar Cambios');
  accion = 'editarEvento';
  $("#op").val(accion);
  console.log(accion);
});
// Obtenemos los ids de los artistas mediante este Jquery
select_Artistas.change(function(){
  idArtista = select_Artistas.val();
});

select_Escenarios.change(function(){
  idEscenario = select_Escenarios.val();
});
// funcion que inserta todos los datos de nuestros inputs
$('#AñadirEvento').click(function(){
  if(document.getElementById('formEventosId').checkValidity()){
    if (accion == 'insertaEvento') {
      event.preventDefault();
      var op = 'insertaEvento';
      var form = $('#formEventosId')[0];
      var data = new FormData(form);
      artistas = Array.from(idArtista);
      peticionAccionArchivo(url_modelo_evento_app,data);
      peticionAccionArchivo(url_modelo_evento_app,artistas);
    }
    if (accion == 'editarEvento') {
      console.log('i will edit');
    }
  }
  else
  {
    mostrarToast('warning','Completa todos los campos por favor');
  }
});
////Funcion que me trae todos los artistas disponibles y los inserta en el select
function getArtistas()
{
  var op = {
    op: "GetArtistas"
  };
  retornarDatosJson(url_modelo_evento_app,op,`RellenarSelectArtistas(ajaxResponse)`);
}
function RellenarSelectArtistas(ajaxResponse)
{
  select_Artistas.empty();
  let artistList = ajaxResponse.Datos;
  $.each(artistList, function (i, objeto) {
    select_Artistas.append(`<option value='${objeto.id}' name="ArtistaOp">${objeto.nombre}</option>`);
    select_Artistas.selectpicker('refresh');
  });
}
///Esta funcion me trae los escenarios para insertarlos en el select
function getEscenario()
{
  var op = {
    op: "GetEscenarios"
  };
  retornarDatosJson(url_modelo_evento_app,op,`RellenarSelectEscenario(ajaxResponse)`);
}
function RellenarSelectEscenario(ajaxResponse)
{
  select_Escenarios.empty();
  let escenarioList = ajaxResponse.Datos;
  $.each(escenarioList, function (i, objeto) {
    select_Escenarios.append(`<option value='${objeto.id}' name="ArtistaOp">${objeto.nombre}</option>`);
    select_Escenarios.selectpicker('refresh');
  });
}
