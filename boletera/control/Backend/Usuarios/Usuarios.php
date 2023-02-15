<?php
if(file_exists("../Conexiones/Conexiones.php")){
  require_once("../Conexiones/Conexiones.php");
}
else{
  if(file_exists("./Conexiones/Conexiones.php")){
    require_once("./Conexiones/Conexiones.php");
  }
  else if(file_exists("../Conexiones/Conexiones.php")){
    require_once("../Conexiones/Conexiones.php");
  }
  else if(file_exists("../../Conexiones/Conexiones.php")){
    require_once("../../Conexiones/Conexiones.php");
  }
  else if(file_exists("././Backend/Conexiones/Conexiones.php")){
    require_once("././Backend/Conexiones/Conexiones.php");
  }
}

class Usuarios extends Conexiones {

   function IniciaSesion($usuario, $clave, $codigo)
   {
      $query = "SELECT pe.perfil,sy.usuario,sy.pwd, sy.id_perfil,
      sy.id_perfil,sy.id_sys_usuario from sys_usuarios as sy
      inner join perfiles as pe on pe.id_perfil = sy.id_perfil
      where sy.usuario = '$usuario' and sy.pwd = '$clave' and sy.estatus = 1";

      $consulta = $this->Select($query);
      if (sizeof($consulta) > 0) {
         setcookie("perfil", $consulta[0]["perfil"], time() + (86400 * 300), "/");
         setcookie("id_usuario", $consulta[0]["id_sys_usuario"], time() + (86400 * 300), "/");
         setcookie("usuario", $consulta[0]["usuario"], time() + (86400 * 300), "/");
         setcookie("id_perfil", $consulta[0]["id_perfil"], time() + (86400 * 300), "/");
         setcookie("sesion", "activa", time() + (86400 * 300), "/");
         return "1";
      } else {
         return "0";
      }
   }

   function permisosHabilitados() {
      // $id_perfil = $_COOKIE["id_perfil"];
      $id_perfil = 1;

      $query = "SELECT permisos as perfil_permisos FROM perfiles as p WHERE p.id_perfil=$id_perfil";
      $resultado = $this->SelectAndContinue($query);
      $valores = json_encode($resultado[0]["perfil_permisos"]);
      $permisos = str_replace('"','',$valores);
      return $permisos;
   }

   function MenuPadre()
   {
      // $id_perfil = $_COOKIE["id_perfil"];
      $id_perfil = 1;
      $permisos = $this->permisosHabilitados();

      $query = "SELECT * from menus where Id_Padre = 0 and Habilitado = 1 and id_menu IN ($permisos) order by orden";
      // echo "$query";
      // $query = "SELECT * from menus where Id_Padre = 0 and Habilitado = 1 and id_perfil = '$id_perfil' order by orden";
      return $this->Select($query);
   }

   function MenuHijo($Id_Padre)
   {
      // $id_perfil = $_COOKIE["id_perfil"];
      $id_perfil = 1;
      $permisos = $this->permisosHabilitados();

      $query = "SELECT * from menus where Id_Padre = '$Id_Padre' and Habilitado = 1 and id_menu IN ($permisos) order by orden";
      // $query = "SELECT * from menus where Id_Padre = '$Id_Padre' and Habilitado = 1 and id_perfil = '$id_perfil' order by orden";
      return $this->Select($query);
   }

   function getDescripcionByURL($URL)
   {
      $url2 = str_replace("/control/", "", $URL);
      $query = "SELECT Descripcion from menus where URL = '$url2' limit 1";
      return $this->Select($query)[0]["Descripcion"];
   }


   function respuestaDefault() {
      $respuesta = array(
         "Resultado" => true,
         "Icono_alerta" => 'warning',
         "Titulo_alerta" => 'Opps...!',
         "Texto_alerta" => 'No se encontraron registros.',
      );
      return $respuesta;
   }

   function respuestaCatch() {
      $respuesta = array(
         "Resultado" => false,
         "Icono_alerta" => 'error',
         "Titulo_alerta" => 'Opps...!',
         "Texto_alerta" => 'Ha ocurrido un error, verifica tus datos.',
      );
      return $respuesta;
   }


   function mostrarUsuarios() {
      try {
         $respuesta = $this->respuestaDefault();

         $query =  "SELECT u.id_sys_usuario as usuario_id, u.usuario as usuario_usuario, u.pwd as usuario_pwd, p.id_perfil as perfil_id, p.perfil as perfil_perfil
         FROM sys_usuarios as u INNER JOIN perfiles as p ON u.id_perfil=p.id_perfil WHERE u.estatus=1";

         $resultado = $this->Select($query);
         if (sizeof($resultado) > 0) {
            $respuesta = array(
               "Resultado" => true,
               "Datos" => $resultado,
            );
         }
      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
   }

   function mostrarUsuario($id) {
      try {
         $respuesta = $this->respuestaDefault();

         $query =  "SELECT u.id_sys_usuario as usuario_id, u.usuario as usuario_usuario, u.pwd as usuario_pwd, p.id_perfil as perfil_id, p.perfil as perfil_perfil
         FROM sys_usuarios as u INNER JOIN perfiles as p ON u.id_perfil=p.id_perfil WHERE u.estatus=1 AND u.id_sys_usuario=$id";

         $resultado = $this->Select($query);
         if (sizeof($resultado) > 0) {
            $respuesta = array(
               "Resultado" => true,
               "Datos" => $resultado,
            );
         }
      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
   }

   function crearYeditarUsuario($id, $usuario, $pwd, $id_perfil) {
      try {
         $repuesta = $this->respuestaDefault();

         if ($id == null) {
            $query = "INSERT INTO sys_usuarios(usuario,pwd,id_perfil) VALUES(?,?,?)";
            $this->ExecuteQuery($query, array($usuario,$pwd,$id_perfil));

            $respuesta = array(
               "Resultado" => true,
               "Icono_alerta" => 'success',
               "Titulo_alerta" => 'EXITO!',
               "Texto_alerta" => 'Usuario agregado.',
            );
         } else {
            $query = "UPDATE sys_usuarios SET usuario=?, pwd=?, id_perfil=? WHERE id_sys_usuario=?";
            $this->ExecuteQuery($query, array($usuario,$pwd,$id_perfil,$id));

            $respuesta = array(
               "Resultado" => true,
               "Icono_alerta" => 'success',
               "Titulo_alerta" => 'EXITO!',
               "Texto_alerta" => 'Usuario modificado.',
            );
         }
      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
   }

   function eliminarUsuario($id) {
      try {
         $repuesta = $this->respuestaDefault();

         $query = "UPDATE sys_usuarios SET estatus=0 WHERE id_sys_usuario=?";
         $this->ExecuteQuery($query, array($id));

         $respuesta = array(
            "Resultado" => true,
            "Icono_alerta" => 'success',
            "Titulo_alerta" => 'EXITO!',
            "Texto_alerta" => 'Usuario eliminado.',
         );

      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
   }
}
