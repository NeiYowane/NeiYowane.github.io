<?php
include ('Generos.php');
$Generos = new Generos();

$op = $_POST["op"];

if ($op =="GetGeneros") {
  echo trim($Generos->GetGeneros());
}

if ($op =="GetGenero") {
  $idGenero = $_POST["idGenero"];
  echo trim($Generos->GetGenero($idGenero));
}

if ($op == "actualizaGenero") {
  $idgenero = $_POST["id_genero"];
  $genero = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\x26\x24\x2D\x40\x2F\x2E]/', '', $_POST["genero"]);
  echo trim($Generos->actualizaGenero($idgenero, $genero));
}

if ($op == "insertaGenero") {
  $genero = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\x26\x24\x2D\x40\x2F\x2E]/', '', $_POST["genero"]);
  echo trim($Generos->insertaGenero($genero));
}

if($op == 'EdoGenero'){
  $idGenero = $_POST["idGenero"];
  $status = $_POST["estado"];
  echo trim($Generos->EdoGenero($idGenero,$status));
}

if ($op =="GetGenerosCards") {
  $idGenero = $_POST["idGenero"];
  echo trim($Generos->GetGenerosCards($idGenero));
}
 ?>
