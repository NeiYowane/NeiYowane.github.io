<?php
include ('Permiso.php');
$Permiso = new Permiso();

if (isset($_POST['accion'])) { $accion = $_POST['accion']; }
if (isset($_POST['id'])) { $id = $_POST['id']; } else { $id = null; }

if (isset($_POST['input_id_perfil'])) { $id_perfil = $_POST['input_id_perfil']; }
if (isset($_POST['input_permisos_todos'])) { $input_permisos_todos = $_POST['input_permisos_todos']; }
if (isset($_POST['input_permisos'])) { $input_permisos = $_POST['input_permisos']; }

//PETICIONES
if ($accion == 'mostrar_permisos') {
   $Permiso->mostrarPermisos($id_perfil);
}

if ($accion == 'otorgar_permisos') {
   if (!empty($input_permisos_todos) && !empty($input_permisos)) {
      $permisos = estructurarPermisos($input_permisos_todos,$input_permisos);
   } else if (!empty($input_permisos_todos)) {
      $permisos = estructurarPermisos($input_permisos_todos);
   } else if (!empty($input_permisos)) {
      $permisos = estructurarPermisos(null,$input_permisos);
   }

   $Permiso->otorgarPermisos($id_perfil,$permisos);
}

//FUNCIONES
function estructurarPermisos($input_permisos_todos=null,$input_permisos=null) {
   $permisos = "";
   if (!empty($input_permisos_todos)) {
      $permisos = $input_permisos_todos;
   } else {
      if (!empty($input_permisos)) {
         $cantidad = sizeof($input_permisos);
         $i = 1;
         foreach ($input_permisos as $permiso) {
            if ($i < $cantidad) {
               $permisos .= "$permiso,";
            } else {
               $permisos .= "$permiso";
            }
            $i++;
         }
      }
   }
   return $permisos;
}