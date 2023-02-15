<?php
include ('TipoEscenario.php');
$TipoEsc = new TipoEsc();

$op = $_POST["op"];

if ($op =="GetTiposEsc") {
  echo trim($TipoEsc->GetTiposEsc());
}

if ($op =="GetTipoEsc") {
  $idTipoEsc = $_POST["idTipoEsc"];
  echo trim($TipoEsc->GetTipoEsc($idTipoEsc));
}

if ($op == "actualizarTipoEsc") {
  $id_tipoEsc = $_POST["id_tipoEsc"];
  $tipoEsc = $_POST["tipoEsc"];
  echo trim($TipoEsc->actualizarTipoEsc($id_tipoEsc, $tipoEsc));
}

if ($op == "insertaTipoEsc") {
  $tipoEsc = $_POST["tipoEsc"];
  echo trim($TipoEsc->insertaTipoEsc($tipoEsc));
}

if($op == 'EdoTipoEsc'){
  $idTipoEsc = $_POST["idTipoEsc"];
  $status = $_POST["estado"];
  echo trim($TipoEsc->EdoTipoEsc($idTipoEsc,$status));
}

 ?>
