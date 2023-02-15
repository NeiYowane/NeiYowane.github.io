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

class Perfil extends Conexiones {

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


   function mostrarPerfiles() {
      try {
         $respuesta = $this->respuestaDefault();

         $query =  "SELECT p.id_perfil as perfil_id, p.perfil as perfil_perfil FROM perfiles as p WHERE p.estatus=1";

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

   function mostrarPerfil($id) {
      try {
         $respuesta = $this->respuestaDefault();

         $query =  "SELECT p.id_perfil as perfil_id, p.perfil as perfil_perfil FROM perfiles as p WHERE p.estatus=1 AND p.id_perfil=$id";

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

   function crearYeditarPerfil($id,$perfil) {
      try {
         $respuesta = $this->respuestaDefault();

         if ($id == null) {
            $query = "INSERT INTO perfiles(perfil) VALUES(?)";
            $this->ExecuteQuery($query, array($perfil));

            $respuesta = array(
               "Resultado" => true,
               "Icono_alerta" => 'success',
               "Titulo_alerta" => 'EXITO!',
               "Texto_alerta" => 'Perfil agregado.',
            );
         } else {
            $query = "UPDATE perfiles SET perfil=? WHERE id_perfil=?";
            $this->ExecuteQuery($query, array($perfil,$id));

            $respuesta = array(
               "Resultado" => true,
               "Icono_alerta" => 'success',
               "Titulo_alerta" => 'EXITO!',
               "Texto_alerta" => 'Perfil modificado.',
            );
         }
      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
   }

   function eliminarPerfil($id) {
      try {
         $respuesta = $this->respuestaDefault();

         $query = "UPDATE perfiles SET estatus=0 WHERE id_perfil=?";
         $this->ExecuteQuery($query, array($id));

         $respuesta = array(
            "Resultado" => true,
            "Icono_alerta" => 'success',
            "Titulo_alerta" => 'EXITO!',
            "Texto_alerta" => 'Perfil eliminado.',
         );

      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
   }
}
