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

class Menu extends Conexiones
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

   function mostrarMenus() {
      try {
         $respuesta = $this->respuestaDefault();

         $query = "SELECT m.id_menu as menu_id, m.Descripcion as menu_descripcion, m.Id_Padre as menu_id_padre, m.Habilitado as menu_habilitado, m.URL as menu_url, m.Argumentos as menu_argunemnto, m.orden as menu_orden
         FROM menus as m WHERE m.Habilitado=1";

         $resultado = $this->select($query);
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

   function mostrarMenu($id) {
      try {
         $respuesta = $this->respuestaDefault();

         $query = "SELECT m.id_menu as menu_id, m.Descripcion as menu_descripcion, m.Id_Padre as menu_id_padre, m.Habilitado as menu_habilitado, m.URL as menu_url, m.Argumentos as menu_argunemnto, m.orden as menu_orden
         FROM menus as m WHERE m.id_menu=$id";

         $resultado = $this->select($query);
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

   function crearYeditarMenu($id,$descripcion,$id_padre,$url,$orden) {
      try {
         $respuesta = $this->respuestaDefault();

         if ($id == null) {
            $query = "INSERT INTO menus(Descripcion,Id_Padre,URL,orden) VALUES(?,?,?,?)";
            $this->ExecuteQuery($query, array($descripcion,$id_padre,$url,$orden));

            $this->crearArchivo($url);
            $respuesta = array(
               "Resultado" => true,
               "Icono_alerta" => 'success',
               "Titulo_alerta" => 'EXITO!',
               "Texto_alerta" => 'Módulo agregado.',
            );

         } else {
            $query = "UPDATE menus SET Descripcion=?, Id_Padre=?, URL=?, orden=? WHERE id_menu=?";
            $this->ExecuteQuery($query, array($descripcion,$id_padre,$url,$orden,$id));

            $respuesta = array(
               "Resultado" => true,
               "Icono_alerta" => 'success',
               "Titulo_alerta" => 'EXITO!',
               "Texto_alerta" => 'Módulo modificado.',
            );
         }

      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
   }

   function eliminarMenu($id) {
      try {
         $respuesta = $this->respuestaDefault();

         $query = "UPDATE menus SET Habilitado=0 WHERE id_menu=?";
         $this->ExecuteQuery($query, array($id));

         $respuesta = array(
            "Resultado" => true,
            "Icono_alerta" => 'success',
            "Titulo_alerta" => 'EXITO!',
            "Texto_alerta" => 'Módulo eliminado.',
         );

      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
   }


   function mostrarMenusPadre() {
      try {
         $respuesta = $this->respuestaDefault();

         $query = "SELECT m.id_menu as menu_id, m.Descripcion as menu_descripcion, m.Id_Padre as menu_id_padre, m.Habilitado as menu_habilitado, m.URL as menu_url, m.Argumentos as menu_argunemnto, m.orden as menu_orden
         FROM menus as m WHERE m.Habilitado=1 AND m.Id_Padre=0";

         $resultado = $this->select($query);
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

   function crearArchivo($nombre_archivo) {
      // Abrir el archivo, creándolo si no existe:
      $ruta_archivo = "../../$nombre_archivo";
      $archivo_nuevo = fopen($ruta_archivo,"w+b");
      if( $archivo_nuevo == false ) {
      }
      else {
         //verificar que exista la plantilla
         $ruta_plantilla = "../../plantilla_nueva_pagina.php";
         if (file_exists($ruta_plantilla)) {
            fwrite($archivo_nuevo, "el archivo existe\r\n");

            $plantilla = file_get_contents($ruta_plantilla);

            file_put_contents($ruta_archivo,$plantilla);

         } else {
         }
         // Fuerza a que se escriban los datos pendientes en el buffer:
         fflush($archivo_nuevo);
      }
      // Cerrar el archivo:
      fclose($archivo_nuevo);
   }
}
