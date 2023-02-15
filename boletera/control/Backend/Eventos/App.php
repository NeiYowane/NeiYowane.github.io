<?php
include('Eventos.php');
$Eventos = new Eventos();
// Aqui recibimos el vaor de la opcion que necesita nuestro front
$op = $_POST["op"];
if ($op == "GetArtistas") {
  echo trim($Eventos->GetArtistas());
}
if ($op == "GetEscenarios") {
  echo trim($Eventos->GetEscenarios());
}
if ($op == "insertaEvento")
{
  /////////// Imagen del evento ///////////////////
    $tituloEvento = $_POST["TituloEventoName"];
    $tempEvento = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00dc\u00fc\x26\x24\x2D\x40\x23 ]/', '', $tituloEvento);
    $eventoTrim = preg_replace('/  */', '_', $tempEvento);
    $archivoEvento = "$eventoTrim-Event.png";

    $fechaEvento = $_POST["FechaEventoName"];
    $horaEvento = $_POST["HoraEventoName"];
    $Sinopsis = $_POST["SinopsisName"];
    $observaciones = $_POST["ObservacionesName"];
    $escenario = $_POST["SelectEscenarioName"];
    ////////// Imagen del Escenario /////////////////////////////
    $imagenEscenario = $_POST["SelectEscenarioName"];
    $tempEscenario = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00dc\u00fc\x26\x24\x2D\x40\x23 ]/', '', $imagenEscenario);
    $escenarioTrim = preg_replace('/  */', '_', $tempEscenario);
    $archivoEscenario = "$escenarioTrim-Escenario.png";

    $idArtista = $_POST['SelectArtistaName'];
    try {
      $carpetaEvento = "../../img/imgEventos/";
      $carpetaEscenario = "../../img/imgEventos/Zonas/";
      if (isset($_FILES['ImagenEventoName']['name'])&& $_FILES['ImagenEventoName']['name'] != '' && isset($_FILES['ImagenEscenarioName']['name']) && $_FILES['ImagenEscenarioName']['name'] != '' )
      {
        $namefileEvento = $_FILES['ImagenEventoName']['name'];
        $namefileEscenario = $_FILES['ImagenEscenarioName']['name'];
        $extEvento = strtolower(pathinfo($namefileEvento, PATHINFO_EXTENSION));
        $extEscenario = strtolower(pathinfo($namefileEscenario, PATHINFO_EXTENSION));
        $extValida = array("png","jpeg","jpg");

        if (in_array($extEvento,$extValida) && in_array($extEscenario,$extValida)) {
          $pathEvento = $carpetaEvento.$tempEvento."-Event.png";
          $pathEscenario = $carpetaEscenario.$tempEscenario."-Escenario.png";

          if (move_uploaded_file($_FILES['ImagenEventoName']['tmp_name'],$pathEvento) && move_uploaded_file($_FILES['ImagenEscenarioName']['tmp_name'],$pathEscenario))
          {
            $NombrearchivoEvento = $archivoEvento;
            $NombrearchivoEscenario = $archivoEscenario;
            $resp = trim($Eventos->insertaEvento($tituloEvento,$NombrearchivoEvento,$fechaEvento,$horaEvento,$Sinopsis,$observaciones,$escenario,$NombrearchivoEscenario,$idArtista));

          }
        }else{
          $respuesta = array(
      			 "Resultado" => true,
      			 "Icono_alerta" => 'warning',
      			 "Texto_alerta" => 'Tipo de archivoEvento no válido',
      		);
          echo json_encode($respuesta);
        }
      }
      else{
        $resp = trim($Eventos->insertaEvento($tituloEvento,' ',$fechaEvento,$horaEvento,$Sinopsis,$observaciones,$escenario,' ',$idArtista));
      }
    } catch (Exception $e) {

    }
    echo $resp;
}
