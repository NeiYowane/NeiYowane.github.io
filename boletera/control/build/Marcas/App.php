<?php
include ('Marcas.php');
$Marcas = new Marcas();

$op = $_POST["op"];

if ($op =="GetMarcas") {
  echo trim($Marcas->GetMarcas());
}
if ($op =="GetFamilias") {
  echo trim($Marcas->GetFamilias());
}
if ($op =="GetCategorias") {
  echo trim($Marcas->GetCategorias());
}
if ($op == "GetCategoria") {
  $idCategoria = $_POST["idCategoria"];
  echo trim($Marcas->GetCategoria($idCategoria));
}
if ($op =="GetMarca") {
  $idmarca = $_POST["idmarca"];
  echo trim($Marcas->GetMarca($idmarca));
}
if ($op =="GetClasificacion") {
  $idclasificacion = $_POST["idclasificacion"];
  echo trim($Marcas->GetClasificacion($idclasificacion));
}

if ($op == "insertaMarca") {
  $marca = $_POST["marca"];
  $bandera_carrito = $_POST["bandera_carrito"];
  $porcentaje = $_POST["porcentaje"];
  $direccion = $_POST["direccion"];
  $telefono = $_POST["telef"];
  $ivaMarca = $_POST["ivaMarca"];
  $descuentoMarca = $_POST["descuentoMarca"];
  $imagen = "$marca.png";
  try {
    $carpeta = "../../imgMarcas/";
    if (isset($_FILES['imagenMc']['name'])&& $_FILES['imagenMc']['name'] != '') {
      $namefile = $_FILES['imagenMc']['name'];
      $ext = strtolower(pathinfo($namefile, PATHINFO_EXTENSION));
      error_log("1");
      $extValida = array("png","jpeg","jpg");

      if (in_array($ext,$extValida)) {
        $path = $carpeta.$marca.".png";

        if (move_uploaded_file($_FILES['imagenMc']['tmp_name'],$path)) {
          $NombreArchivo = $namefile;
          $resp = trim($Marcas->insertaMarca($marca,$imagen,$bandera_carrito,$porcentaje,$direccion,$telefono,$descuentoMarca,$ivaMarca));
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
      $resp = trim($Marcas->insertaMarca($marca,'',$bandera_carrito,$porcentaje,$direccion,$telefono,$descuentoMarca,$ivaMarca));
    }
  } catch (\Exception $e) {

  }
  echo $resp;
}

if ($op == "actualizaMarca") {
  $idmarca = $_POST["idmarca"];
  $marca = $_POST["marca"];
  $bandera_carrito = $_POST["bandera_carrito"];
  $porcentaje = $_POST["porcentaje"];
  $direccion = $_POST["direccion"];
  $telefono = $_POST["telef"];
  $descuentoMarca = $_POST["descuentoMarca"];
  $ivaMarca = $_POST["ivaMarca"];
  $ivaMarca = $_POST["ivaMarca"];
  $imagen = "$marca.png";
  $imagen2 = $_POST["imagen"];



  try {
    $carpeta = "../../imgMarcas/";

    if (isset($_FILES['imagenMc']['name'])&& $_FILES['imagenMc']['name'] != '') {
      $namefile = $_FILES['imagenMc']['name'];
      $ext = strtolower(pathinfo($namefile, PATHINFO_EXTENSION));

      $extValida = array("png","jpeg","jpg");

      if (in_array($ext,$extValida)) {
        $path = $carpeta.$marca.".png";

        if (move_uploaded_file($_FILES['imagenMc']['tmp_name'],$path)) {
          $NombreArchivo = $namefile;
          $resp = trim($Marcas->actualizaMarca($idmarca,$marca,$imagen,$bandera_carrito,$porcentaje,$direccion,$telefono,$descuentoMarca,$ivaMarca));
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
      $resp = trim($Marcas->actualizaMarca($idmarca,$marca,$imagen2,$bandera_carrito,$porcentaje,$direccion,$telefono,$descuentoMarca,$ivaMarca));
    }
  } catch (\Exception $e) {

  }
  echo $resp;
}

if ($op == "EdoMarcas") {
  $estado = $_POST["estado"];
  $idmarca = $_POST["idmarca"];
  echo trim($Marcas->EdoMarcas($estado,$idmarca));
}
if ($op == "EdoCategorias") {
  $estado = $_POST["estado"];
  $idcategoria = $_POST["idcategoria"];
  echo trim($Marcas->EdoCategorias($estado,$idcategoria));
}
if ($op == "EdoFamilia") {
  $estado = $_POST["estado"];
  $idclasificacion = $_POST["idclasificacion"];
  echo trim($Marcas->EdoFamilia($estado,$idclasificacion));
}
if ($op == "insertaClasificacion") {
  $clasificacion = $_POST["clasificacion"];
  echo trim($Marcas->insertaClasificacion($clasificacion));
}
if ($op == "actualizaClasificacion") {
  $idclasificacion = $_POST["idclasificacion"];
  $clasificacion = $_POST["clasificacion"];
  echo trim($Marcas->actualizaClasificacion($idclasificacion,$clasificacion));
}


if ($op == "insertaCategoria") {
  $categoria = $_POST["categoria"];
  $bandera_carrito = $_POST["bandera_carrito"];
  $imagen = "$categoria.png";
  try {
    $carpeta = "../../imgCategorias/";
    if (isset($_FILES['imagenCat']['name'])&& $_FILES['imagenCat']['name'] != '') {
      $namefile = $_FILES['imagenCat']['name'];
      $ext = strtolower(pathinfo($namefile, PATHINFO_EXTENSION));
      error_log("1");
      $extValida = array("png","jpeg","jpg");

      if (in_array($ext,$extValida)) {
        $path = $carpeta.$categoria.".png";

        if (move_uploaded_file($_FILES['imagenCat']['tmp_name'],$path)) {
          $NombreArchivo = $namefile;
          $resp = trim($Marcas->insertaCategoria($categoria,$imagen,$bandera_carrito));
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
      $resp = trim($Marcas->insertaCategoria($categoria,'',$bandera_carrito));
    }
  } catch (\Exception $e) {

  }
  echo $resp;
}

if ($op == "actualizaCategoria") {
  $idcategoria = $_POST["idcategoria"];
  $categoria = $_POST["categoria"];
  $bandera_carrito = $_POST["bandera_carrito"];
  $imagen2 = $_POST["imagen"];
  $imagen = "$categoria.png";

  try {
    $carpeta = "../../imgCategorias/";
    if (isset($_FILES['imagenCat']['name'])&& $_FILES['imagenCat']['name'] != '') {
      $namefile = $_FILES['imagenCat']['name'];
      $ext = strtolower(pathinfo($namefile, PATHINFO_EXTENSION));
      error_log("1");
      $extValida = array("png","jpeg","jpg");

      if (in_array($ext,$extValida)) {
        $path = $carpeta.$categoria.".png";

        if (move_uploaded_file($_FILES['imagenCat']['tmp_name'],$path)) {
          $NombreArchivo = $namefile;
          $resp = trim($Marcas->actualizaCategoria($idcategoria,$categoria,$bandera_carrito,$imagen));
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
      $resp = trim($Marcas->actualizaCategoria($idcategoria,$categoria,$bandera_carrito,$imagen2));
    }
  } catch (\Exception $e) {

  }

  echo $resp;
}
 ?>
