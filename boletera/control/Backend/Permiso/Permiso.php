<?php
if (file_exists("../Conexiones/Conexiones.php")) {
   require_once("../Conexiones/Conexiones.php");
} else {
   if (file_exists("./Conexiones/Conexiones.php")) {
      require_once("./Conexiones/Conexiones.php");
   } else if (file_exists("../Conexiones/Conexiones.php")) {
      require_once("../Conexiones/Conexiones.php");
   } else if (file_exists("../../Conexiones/Conexiones.php")) {
      require_once("../../Conexiones/Conexiones.php");
   } else if (file_exists("././Backend/Conexiones/Conexiones.php")) {
      require_once("././Backend/Conexiones/Conexiones.php");
   }
}

class Permiso extends Conexiones
{
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

   function mostrarPermisos($id_perfil) {
      try {
         $respuesta = $this->respuestaDefault();

         $query = "SELECT p.id_perfil as perfil_id, p.perfil as perfil_perfil, permisos as perfil_permisos FROM perfiles as p WHERE p.estatus=1 AND p.id_perfil=$id_perfil";
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

   function otorgarPermisos($id_perfil,$permisos) {
      try {
         $respuesta = $this->respuestaDefault();

         $query = "UPDATE perfiles SET permisos=? WHERE id_perfil=?";
         $this->ExecuteQuery($query, array($permisos,$id_perfil));

         $respuesta = array(
            "Resultado" => true,
            "Icono_alerta" => 'success',
            "Titulo_alerta" => 'EXITO!',
            "Texto_alerta" => 'Permisos otorgados.',
         );
         
      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
   }

}
