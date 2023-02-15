<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Preguntas Frecuentes</title>

  <?php include("module-styles.php"); ?>


</head>
<body class="bg-light">

  <?php include("module-navbar.php"); ?>

  <main>
    <div class="container">

      <!-- Content -->
      <div class="container">
        <h1 class="mt-5">Preguntas Frecuentes</h1>
        <br>

        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                ¿Cómo puedo pagar mis boletos?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <b>Tarjetas de crédito:</b> Visa, MasterCard o American Express.<br>
                <b>Tarjetas de débito:</b> Citibanamex, Santander o Banorte.<br>
                <b>No podrás utilizar tarjetas departamentales, ni tarjetas de Banco Azteca o BanCoppel.</b><br>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                ¿Cuál es el límite de boletos que una persona puede comprar?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                El límite de venta de los boletos lo fija el promotor del evento o el Inmueble para garantizar al público una adecuada distribución del boletaje y cubrir la demanda de éste.<br>
                <br>
                RESO Boletos vende un máximo de <b>6, 8, 10 o 12 boletos por persona dependiendo del evento</b>, con estas medidas buscamos combatir la reventa, reducir el acaparamiento y garantizar una adecuada distribución de los boletos para todo el público (sujeto a cambios sin previo aviso).<br>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                ¿RESO Boletos reserva boletos para Clientes o Empresas?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                <b>No</b>, RESO Boletos vende la totalidad de los boletos por cuenta y orden del inmueble o promotor. Existen ciertos asientos que no salen a la venta ya que son guardados por el propio inmueble a cuenta del promotor, del artista y del patrocinador del evento. Estos, generalmente son utilizados para la prensa y/o invitados especiales de los mismos.
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- / Content -->

      <?php include("module-footer.php"); ?>

    </div>
  </main>

  <?php include("module-scripts.php"); ?>

</body>
</html>
