<?php
include ('Escenarios.php');
$Escenarios = new Escenarios();

$op = $_POST["op"];

if ($op =="GetEscenariosSel") {
  echo trim($Escenarios->GetTipoEsc());
}

if ($op =="GetEscenarios") {
  echo trim($Escenarios->GetEscenarios());
}

if ($op =="EdoEscenario") {
  $idEscenario = $_POST["idEscenario"];
  $status = $_POST["estado"];
  echo trim($Escenarios->EdoEscenario($idEscenario,$status));
}


if ($op =="GetEscenario") {
  $idEscenario = $_POST["idEscenario"];
  echo trim($Escenarios->GetEscenario($idEscenario));
}

if ($op == "insertaEscenario") {
  $esenario = $_POST["inputNombreEsc"];
  $esenario1 = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00dc\u00fc\x26\x24\x2D\x40\x23]/', '', $esenario);
  $escenarioTrim = preg_replace('/  */', '-', $esenario1);
  $imagen = "$escenarioTrim-Img.png";
  $estructura = "$escenarioTrim-Est.png";
    // error_log($imagen);
  $direccion = $_POST["inputDireccionEsc"];
  $tipo = $_POST["TipoEscenario"];
  $capacidad = $_POST["EscenarionumberInput"];
  try {
    $carpetaImg = "../../img/imgEscenarios/Imagen/";
    $carpetaEst = "../../img/imgEscenarios/Estructura/";
    if (isset($_FILES['InputStructureEscenario']['name'])&& $_FILES['InputStructureEscenario']['name'] != '' && isset($_FILES['InputImagenEscenario']['name'])&& $_FILES['InputImagenEscenario']['name'] != '') {
      $namefileImg = $_FILES['InputImagenEscenario']['name'];
      $namefileEst = $_FILES['InputStructureEscenario']['name'];
      $extImg = strtolower(pathinfo($namefileImg, PATHINFO_EXTENSION));
      $extEst = strtolower(pathinfo($namefileEst, PATHINFO_EXTENSION));
      // error_log("1");
      $extValida = array("png","jpeg","jpg");

      if (in_array($extImg,$extValida) && in_array($extEst,$extValida)) {
        $pathImg = $carpetaImg.$escenarioTrim."-Img.png";
        $pathEst = $carpetaEst.$escenarioTrim."-Est.png";

        if (move_uploaded_file($_FILES['InputImagenEscenario']['tmp_name'],$pathImg) && move_uploaded_file($_FILES['InputStructureEscenario']['tmp_name'],$pathEst)) {
          // $NombreArchivo = $namefile;
          $resp = trim($Escenarios->insertaEscenario($esenario,$imagen,$estructura,$direccion,$tipo,$capacidad));
        }
      }else{
        $respuesta = array(
    			 "Resultado" => true,
    			 "Icono_alerta" => 'warning',
    			 "Texto_alerta" => 'Tipo de archivo no válido',
    		);
        echo json_encode($respuesta);
      }
    }else{
      $resp = trim($Escenarios->insertaEscenario($esenario,' ',' ',$direccion,$tipo,$capacidad));
    }
  } catch (\Exception $e) {

  }
  echo $resp;
}

if ($op == "actualizarEscenario") {
  $idEscenario = $_POST["idEscenarioHidden"];
  $esenario = $_POST["inputNombreEsc"];
  $esenario1 = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00dc\u00fc\x26\x24\x2D\x40\x23]/', '', $esenario);
  $escenarioTrim = preg_replace('/  */', '-', $esenario1);
  $imagen = "$escenarioTrim-Img.png";
  $estructura = "$escenarioTrim-Est.png";
    // error_log($imagen);
  $direccion = $_POST["inputDireccionEsc"];
  $tipo = $_POST["TipoEscenario"];
  $capacidad = $_POST["EscenarionumberInput"];

  $imagen2 = $_POST["imgEscenario"];
  $estructura2 = $_POST["estructura"];

  try {
    $carpetaImg = "../../img/imgEscenarios/Imagen/";
    $carpetaEst = "../../img/imgEscenarios/Estructura/";
    if (isset($_FILES['InputStructureEscenario']['name'])&& $_FILES['InputStructureEscenario']['name'] != '' && isset($_FILES['InputImagenEscenario']['name'])&& $_FILES['InputImagenEscenario']['name'] != '') {
      $namefileImg = $_FILES['InputImagenEscenario']['name'];
      $namefileEst = $_FILES['InputStructureEscenario']['name'];
      $extImg = strtolower(pathinfo($namefileImg, PATHINFO_EXTENSION));
      $extEst = strtolower(pathinfo($namefileEst, PATHINFO_EXTENSION));
      // error_log("1");
      $extValida = array("png","jpeg","jpg");

      if (in_array($extImg,$extValida) && in_array($extEst,$extValida)) {
        $pathImg = $carpetaImg.$escenarioTrim."-Img.png";
        $pathEst = $carpetaEst.$escenarioTrim."-Est.png";

        if (move_uploaded_file($_FILES['InputImagenEscenario']['tmp_name'],$pathImg) && move_uploaded_file($_FILES['InputStructureEscenario']['tmp_name'],$pathEst)) {
          // $NombreArchivo = $namefile;
          $resp = trim($Escenarios->actualizarEscenario($idEscenario, $esenario,$imagen,$estructura,$direccion,$tipo,$capacidad));
        }
      }else{
        $respuesta = array(
    			 "Resultado" => true,
    			 "Icono_alerta" => 'warning',
    			 "Texto_alerta" => 'Tipo de archivo no válido',
    		);
        echo json_encode($respuesta);
      }
    }else{
      $resp = trim($Escenarios->actualizarEscenario($idEscenario, $esenario,$imagen2,$estructura2,$direccion,$tipo,$capacidad));
    }
  } catch (\Exception $e) {

  }
  echo $resp;

}
