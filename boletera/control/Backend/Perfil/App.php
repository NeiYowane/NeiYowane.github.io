<?php
include("Perfil.php");
$Perfil = new Perfil();

if (isset($_POST["accion"])) { $accion = $_POST["accion"]; }
if (isset($_POST['id'])) { $id = $_POST['id']; } else { $id = null; }

if (isset($_POST["input_perfil"])) { $perfil = $_POST["input_perfil"]; }

//PETICIONES
if ($accion == "mostrar_objetos") {
   $Perfil->mostrarPerfiles();
}

if ($accion == "mostrar_objeto") {
   $Perfil->mostrarPerfil($id);
}

if ($accion == "registrar_editar_objeto") {
   $Perfil->crearYeditarPerfil($id,$perfil);
}

if ($accion == "eliminar_objeto") {
   $Perfil->eliminarPerfil($id);
}

?>