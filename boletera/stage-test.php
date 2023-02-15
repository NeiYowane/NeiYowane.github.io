
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Prueba</title>
    <meta charset="utf-8" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/seatchart@0.1.0/dist/seatchart.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
      body {
        display: flex;
        justify-content: center;
      }

      .economy {
        color: white;
        background-color: #43aa8b;
      }

      .first-class {
        color: white;
        background-color: #277da1;
      }

      .reduced {
        color: white;
        background-color: #f8961e;
      }
      svg .seat:hover{
    fill: red;
    cursor:pointer;
    }
    svg text:hover{
    fill: blac;
    cursor:pointer;
    }
    </style>
  </head>
  <body>

    <div id="AreaDisplay">
    <a class="btn btn-outline-danger" id="atrasB"><i class="fa fa-reply" aria-hidden="true" ></i>Volver</a>

    <div id="asientos-A1" style="display: none">

    </div>

    <div id="mapa">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="421px" viewBox="0 0 512 421" enable-background="new 0 0 512 421" xml:space="preserve">
    <g>
        <!-- ===========================STAGE===================================== -->
        <rect x="168.201" y="14.816" fill="#48484A" stroke-width="0.25" stroke-miterlimit="10" width="175.668" height="77.468"></rect>
        <text transform="matrix(1 0 0 1 256.35 53.55)" font-family="'TrebuchetMS'" font-size="35" fill="white" dominant-baseline="middle" text-anchor="middle" >STAGE</text>

        <!-- ===========================AREA 1===================================== -->
        <rect class="seat" id="area1" x="182.932" y="106.019" fill="#CE9C68" width="69.285" height="75.833" ></rect>
        <text transform="matrix(1 0 0 1 217.57 143.94)" font-family="'TrebuchetMS'" font-size="15" fill="white" dominant-baseline="middle" text-anchor="middle" >AREA 1</text>

        <!-- ===========================AREA 2===================================== -->
        <rect class="seat" id="area2" x="259.992" y="106.019" fill="#CE9C68" width="69.285" height="75.833"></rect>
        <text transform="matrix(1 0 0 1 294.64 143.94)" font-family="'TrebuchetMS'" font-size="15" fill="white" dominant-baseline="middle" text-anchor="middle" >AREA 2</text>

        <!-- ===========================AREA 3===================================== -->
        <rect class="seat" id="area3" x="182.932" y="192.125" fill="#CE9C68" width="69.285" height="75.833"></rect>
        <text transform="matrix(1 0 0 1 217.57 230.042)" font-family="'TrebuchetMS'" font-size="15" fill="white" dominant-baseline="middle" text-anchor="middle" >AREA 3</text>

        <!-- ===========================AREA 4===================================== -->
        <rect class="seat" id="area4" x="259.992" y="192.125" fill="#CE9C68" width="69.285" height="75.833"></rect>
        <text transform="matrix(1 0 0 1 294.64 230.042)" font-family="'TrebuchetMS'" font-size="15" fill="white" dominant-baseline="middle" text-anchor="middle" >AREA 4</text>

        <!-- ===========================LINEA IZQ===================================== -->
        <g>
        <line fill="none" stroke="#7D7E81" stroke-miterlimit="10" x1="174.203" y1="106.47" x2="174.203" y2="108.47" />
        <line fill="none" stroke="#7D7E81" stroke-miterlimit="10" stroke-dasharray="4.0452,4.0452" x1="174.203" y1="112.516" x2="174.203" y2="288.481" />
        <line fill="none" stroke="#7D7E81" stroke-miterlimit="10" x1="174.203" y1="290.504" x2="174.203" y2="292.504" />
        </g>

        <!-- ===========================LINEA DER===================================== -->
        <g>
        <line fill="none" stroke="#7D7E81" stroke-miterlimit="10" x1="338.006" y1="106.47" x2="338.006" y2="108.47" />
        <line fill="none" stroke="#7D7E81" stroke-miterlimit="10" stroke-dasharray="4.0452,4.0452" x1="338.006" y1="112.516" x2="338.006" y2="288.481" />
        <line fill="none" stroke="#7D7E81" stroke-miterlimit="10" x1="338.006" y1="290.504" x2="338.006" y2="292.504" />
        </g>
    </g>
    </svg>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/seatchart@0.1.0/dist/seatchart.min.js"></script>
    <script>
    var sc;
      var options = {
        map: {
          rows: 10,
          columns: 10,
          seatTypes: {
            default: {
              label: 'Economy',
              cssClass: 'economy',
              price: 15,
            },
            first: {
              label: 'First Class',
              cssClass: 'first-class',
              price: 25,
              seatRows: [0, 1, 2],
            },
            reduced: {
              label: 'Reduced',
              cssClass: 'reduced',
              price: 10,
              seatRows: [7, 8, 9],
            },
          },
          disabledSeats: [
          ],
          reservedSeats: [

          ],
          frontVisible:true,
          selectedSeats: [],
          rowSpacers: [3, 7],
          columnSpacers: [],
        },
        cart:
        {
            currency: '$',
            submitLabel: "Comprar",
            visible: false,
        },
      };

      var element = document.getElementById('asientos-A1');
      sc = new Seatchart(element, options);


    $('#area1').click(function() {
        document.getElementById("mapa").style.display = "none";
        document.getElementById("asientos-A1").style.display = "";
    });

    // $('#atrasB').click(function() {
    // });
    sc.addEventListener('seatchange', function handleChange(e) {
    var estadoActual = e.current.state;
    var estadoAnterior = e.previous.state;
    // var asientofila = asiento.index.row;
    // const seatTypes = sc.options.map.seatTypes;
    // var asientotipo = seatTypes[asiento.type].price;

    if (estadoActual == 'selected') {
      console.log("el asiento " + e.current.label +" se va a agregar");
    }
    else if(estadoAnterior == 'selected'){
      console.log("el asiento " + e.previous.label +" se va a eliminar");
    }

    console.log(estadoActual);
  });


    </script>
  </body>
</html>
