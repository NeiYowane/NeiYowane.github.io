<?php
include ('Menu.php');
$Menu = new Menu();

if (isset($_POST['accion'])) { $accion = $_POST['accion']; }
if (isset($_POST['id'])) { $id = $_POST['id']; } else { $id = null; }

if (isset($_POST['input_descripcion'])) { $descripcion = $_POST['input_descripcion']; }
if (isset($_POST['input_id_padre'])) { $id_padre = $_POST['input_id_padre']; }
if (isset($_POST['input_url'])) { $url = $_POST['input_url']; }
if (isset($_POST['input_orden'])) { $orden = $_POST['input_orden']; }

if ($accion == 'mostrar_objetos') {
   $Menu->mostrarMenus();
}

if ($accion == 'mostrar_objeto') {
   $Menu->mostrarMenu($id);
}

if ($accion == 'registrar_editar_objeto') {
   $Menu->crearYeditarMenu($id,$descripcion,$id_padre,$url,$orden);
}

if ($accion == 'eliminar_objeto') {
   $Menu->eliminarMenu($id);
}

if ($accion == 'mostrar_menus_padre') {
   $Menu->mostrarMenusPadre();
}
