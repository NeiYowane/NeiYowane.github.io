<?php

  // 3) Incluir la App en el Backend
  include ('Banderas.php');
  $Banderas = new Banderas();

  // 4) Declarar la Variable Opcion
  $op = $_POST["op"];

  // Operacion para consultar la informacion de todas las Banderas
  if ($op =="GetBanderas") {
    echo trim($Banderas->GetBanderas());
  }

  // Operacion para consultar la informacion de todas las Banderas
  if ($op =="GetBanderasValidas") {
    echo trim($Banderas->GetBanderasValidas());
  }

  // Operacion para consultar la informacion de una sola Bandera
  if ($op =="GetBandera") {
    $id = $_POST["id"];
    echo trim($Banderas->GetBandera($id));
  }

  // Operacion Mostrar Bandera
  if ($op =="MostrarBandera") {
    $estado = $_POST["estado"];
    $id = $_POST["id"];
    echo trim($Banderas->MostrarBandera($estado,$id));
  }

  // Operacion Eliminar Bandera
  if ($op =="EliminarBandera") {
    $id = $_POST["id"];
    echo trim($Banderas->EliminarBandera($id));
  }

  // Insertar Banner
  if ($op == "InsertarBanner") {
    $titulo = $_POST["InputNombre"];
    $temp = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00dc\u00fc\x26\x24\x2D\x40\x23 ]/', '', $titulo);
    $archivo = "$temp.png";
    try {
      $carpeta = "../../img/imgBanderas/";
      if (isset($_FILES['InputImagen']['name'])&& $_FILES['InputImagen']['name'] != '') {
        $namefile = $_FILES['InputImagen']['name'];
        $ext = strtolower(pathinfo($namefile, PATHINFO_EXTENSION));
        $extValida = array("png","jpeg","jpg");

        if (in_array($ext,$extValida)) {
          $path = $carpeta.$temp.".png";

          if (move_uploaded_file($_FILES['InputImagen']['tmp_name'],$path)) {
            $NombreArchivo = $namefile;
            $resp = trim($Banderas->InsertaBandera($titulo,$archivo));
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
        $resp = trim($Banderas->InsertaBandera($titulo,' '));
      }
    } catch (\Exception $e) {

    }
    echo $resp;
  }

  // Actualizar Banner
  if ($op == "ActualizarBanner") {
    $id = $_POST["idbandera"];
    $titulo = $_POST["InputNombre"];
    $temp = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00dc\u00fc\x26\x24\x2D\x40\x23 ]/', '', $titulo);
    $oldimg = $_POST["imagen"];
    $imagen = "$temp.png";
    try {
      $carpeta = "../../img/imgBanderas/";
      if (isset($_FILES['InputImagen']['name'])&& $_FILES['InputImagen']['name'] != '') {
        $namefile = $_FILES['InputImagen']['name'];
        $ext = strtolower(pathinfo($namefile, PATHINFO_EXTENSION));
        // error_log("1");
        $extValida = array("png","jpeg","jpg");

        if (in_array($ext,$extValida)) {
          $path = $carpeta.$temp.".png";

          if (move_uploaded_file($_FILES['InputImagen']['tmp_name'],$path)) {
            $NombreArchivo = $namefile;
            $resp = trim($Banderas->ActualizarBandera($id,$titulo,$imagen));
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
        $resp = trim($Banderas->ActualizarBandera($id,$titulo,$oldimg));
      }
    } catch (\Exception $e) {
    }
    echo $resp;
  }

  if ($op == "UpdatePosicionOrden") {
    $idBanner = $_POST["idBanner"];
    $orden = $_POST["orden"];
    echo trim($Banderas->UpdatePosicionOrden($idBanner, $orden));
  }
