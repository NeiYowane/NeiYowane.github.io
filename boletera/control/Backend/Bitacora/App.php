<?php
include ('Bitacora.php');
$Bitacora = new Bitacora();

if(isset($_COOKIE["id_usuario"])) {
  $IdUserAdmin=$_COOKIE["id_usuario"];
}

$op = $_POST["op"];

if ($op =="InsertBitacora") {
  $accion = $_POST["accion"];
  $descripcion = $_POST["descripcion"];

  echo trim($Bitacora->InsertBitacora($accion, $descripcion, $IdUserAdmin));
}

if ($op =="GetBitacora") {
  echo trim($Bitacora->GetBitacora());
}

 ?>
