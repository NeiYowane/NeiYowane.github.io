$(document).ready(function(){
  GetGeneres();
});


function GetGeneres(){
  var datageneres = {
    op : "GetGenerosCards"
  };
  retornarDatosJson(url_genero_app,datageneres,'LlenarCards(ajaxResponse)')
}

function LlenarCards(ajaxResponse){
  GenerosContainer.empty();
  let coleccion = ajaxResponse.Datos;
  $.each(coleccion, function (i, objeto) {
  GenerosContainer.append(`<div class="col">
          <div class="card" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-4">
                <img src="https://source.unsplash.com/random/240x240/?music,${objeto.genero}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-8">
                <div class="card-body">
                  <h5 class="card-title">${objeto.genero} <small class="text-muted">(10 Resultados)</small></h5>
                  <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Ver Eventos</a>
                </div>
              </div>
            </div>
          </div>
        </div>`);
});
}
