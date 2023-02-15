$(document).ready(function(){
  var tipo;
  if (window.location.href.indexOf("artists") > -1) {
     tipo = 1;
   }
   else if (window.location.href.indexOf("groups") > -1) {
      tipo = 2;
    }
  GetArtistas(tipo);
});


function GetArtistas(tipoArt){
  var datageneres = {
    op : "GetArtistasCards",
    tipo:tipoArt
  };
  retornarDatosJson(url_artista_app,datageneres,'LlenarCards(ajaxResponse)');

}

function LlenarCards(ajaxResponse){
  ArtistasContainer.empty();
  let coleccion = ajaxResponse.Datos;

  console.log(coleccion);
  $.each(coleccion, function (i, objeto) {
    let
    Artista = objeto.Artista,
    IdArt = objeto.idArt,
    Foto = objeto.Foto == " " || objeto.Foto == ""? 'default.png' : objeto.Foto,
    Generos=objeto.generos;

  ArtistasContainer.append(`
            <div class="col mx-1" id="${IdArt}" >
              <div class="card shadow-sm">
                <div class="zoom">
                  <img class="card-img-top"  width="100%" height="100%" src="control/img/imgArtistas/${Foto}" alt="Thumbnail">
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title">${Artista}</h5>
                  <hr>
                  <small class="text-muted">${Generos}</small>
                  <br>
                  <br>
                  <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" onclick="myFunction()">
                      Ver Eventos
                    </a>
                    <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Seguir</a>
                  </div>
                </div>
              </div>
            </div>
`);
});

ArtistasContainer.slick({
  centerMode: true,
  centerPadding: '80px',
  autoplay: true,
  autoplaySpeed: 4000,

  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

}
