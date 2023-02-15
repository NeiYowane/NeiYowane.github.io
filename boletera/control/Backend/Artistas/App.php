<?php
include ('Artistas.php');
$Artistas = new Artistas();

// if(isset($_COOKIE["id_usuario"])) {
//   $IdUserAdmin=$_COOKIE["id_usuario"];
// }

$op = $_POST["op"];

if ($op =="GetArtistas") {
  echo trim($Artistas->GetArtistas());
}

if ($op =="GetArtista") {
  $idArtista = $_POST["idArtista"];
  echo trim($Artistas->GetArtista($idArtista));
}

if ($op =="GetMaxId") {
  echo trim($Artistas->GetMaxId());
}

if ($op =="GetGeneroTo") {
  echo trim($Artistas->GetGeneroTo());
}

// if ($op =="GetArtistaGen") {
//   echo trim($Artistas->GetArtistaGen());
// }

if ($op == "actualizaArtista") {
  $idartista = $_POST["idartista"];
  $artista = $_POST["artista"];
  $artistaIMG = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00dc\u00fc\x26\x24\x2D\x40\x23 ]/', '', $artista);
  $imagen2 = $_POST["imagen"];
  $imagen = "$artistaIMG.png";
  $Tipo = $_POST["tipoArt"];

  try {
    $carpeta = "../../img/imgArtistas/";
    if (isset($_FILES['imagenArt']['name'])&& $_FILES['imagenArt']['name'] != '') {
      $namefile = $_FILES['imagenArt']['name'];
      $ext = strtolower(pathinfo($namefile, PATHINFO_EXTENSION));
      // error_log("1");
      $extValida = array("png","jpeg","jpg");

      if (in_array($ext,$extValida)) {
        $path = $carpeta.$artistaIMG.".png";

        if (move_uploaded_file($_FILES['imagenArt']['tmp_name'],$path)) {
          $NombreArchivo = $namefile;
          $resp = trim($Artistas->actualizaArtistas($idartista,$artista,$imagen, $Tipo));
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
      $resp = trim($Artistas->actualizaArtistas($idartista,$artista,$imagen2, $Tipo));
    }
  } catch (\Exception $e) {
  }
  echo $resp;
}

if ($op == "insertaArtista") {
  $artista = $_POST["artista"];
  $artistaIMG = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00dc\u00fc\x26\x24\x2D\x40\x23 ]/', '', $artista);
  $imagen2 = $_POST["imagen"];
  $imagen = "$artistaIMG.png";
  $Tipo = $_POST["tipoArt"];
  $generosGet = $_POST["Generos"];
  foreach ($generosGet as $genero) {
    error_log("Prueba 1: $genero");
  }
  try {
    $carpeta = "../../img/imgArtistas/";
    if (isset($_FILES['imagenArt']['name'])&& $_FILES['imagenArt']['name'] != '') {
      $namefile = $_FILES['imagenArt']['name'];
      $ext = strtolower(pathinfo($namefile, PATHINFO_EXTENSION));
      error_log("1");
      $extValida = array("png","jpeg","jpg");

      if (in_array($ext,$extValida)) {
        $path = $carpeta.$artistaIMG.".png";

        if (move_uploaded_file($_FILES['imagenArt']['tmp_name'],$path)) {
          $NombreArchivo = $namefile;
          $resp = trim($Artistas->insertaArtista($artista,$imagen,$Tipo,$generosGet));
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
      $resp = trim($Artistas->insertaArtista($artista,' ',$Tipo,$generosGet));
    }
  } catch (\Exception $e) {

  }
  echo $resp;
}

if($op == 'EdoArtista'){
  $idArtista = $_POST["idArtista"];
  $status = $_POST["estado"];
  echo trim($Artistas->EdoArtista($idArtista,$status));
}

if($op == 'InsertArtGen'){
  $idArtista = $_POST["idArtista"];
  $idGen = $_POST["idGen"];
  $Artistas->InsertArtGen($idGen, $idArtista);
}

if($op == 'UpdateArtGen'){
  $idArtista = $_POST["idArtista"];
  $idGen = $_POST["idGen"];
  $Artistas->UpdateArtGen($idArtista,$idGen);
}

if ($op =="GetArtGen") {
  $idArtista = $_POST["idArtista"];
  echo trim($Artistas->GetArtGen($idArtista));
}

if($op == 'DelRel'){
  // $arrayGen = json_decode($_POST['generos']);;
  $data = $_POST['generos'];
  $idArtista = $_POST["idArtista"];
  echo trim($Artistas->DelRel($data, $idArtista));
  // // $idGen = $_POST["idGen"];
  // echo trim($Artistas->DelRel($arrayGen, $idArtista));
}

if ($op =="GetArtistasCards") {
  $Tipo = $_POST["tipo"];
  echo trim($Artistas->GetArtistasCards($Tipo));
}

if ($op =="DelImgArt") {
  $IdArt = $_POST["idArt"];
  echo trim($Artistas->DelImgArt($IdArt));
}



 ?>
