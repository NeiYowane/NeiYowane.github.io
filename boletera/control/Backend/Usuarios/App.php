<?php
include("Usuarios.php");

$op = $_POST["op"];
$Usuario = new Usuarios();

if ($op == "IniciaSesion") {
  $usuario = $_POST["usuario"];
  $claveE = crypt($_POST["clave"], '$2a$07$usesomesillystringforsalt$');
  $clave = $claveE;
  $codigo = $_POST["codigo"];
  echo trim($Usuario->IniciaSesion($usuario,$clave,$codigo));
}

if (isset($_POST["accion"])) { $accion = $_POST["accion"]; }
if (isset($_POST['id'])) { $id = $_POST['id']; } else { $id = null; }

if (isset($_POST["input_usuario"])) { $usuario = $_POST["input_usuario"]; }

if (isset($_POST["input_pwd"])) {
  $encrypt = crypt($_POST["input_pwd"], '$2a$07$usesomesillystringforsalt$');
  $pwd = $encrypt;
} else {
  $pwd = null;
}

if (isset($_POST["input_id_perfil"])) { $id_perfil = $_POST["input_id_perfil"]; }


//PETICIONES
if ($accion == "mostrar_objetos") {
  $Usuario->mostrarUsuarios();
}

if ($accion == "mostrar_objeto") {
   $Usuario->mostrarUsuario($id);
}

if ($accion == "registrar_editar_objeto") {
   $Usuario->crearYeditarUsuario($id,$usuario,$pwd,$id_perfil);
}

if ($accion == "eliminar_objeto") {
   $Usuario->eliminarUsuario($id);
}

?>
