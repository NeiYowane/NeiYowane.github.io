<?php

  // 1) Instanciar Conexion
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

  // 2) Extender la Clase Conexiones
  class Banderas extends Conexiones {

    // 10) Crear funcion GetBanderas
    function GetBanderas(){
      try {
         $respuesta = $this->respuestaDefault();
         $query =  "SELECT * FROM banderas WHERE Estatus = 1 order by Mostrar desc, orden asc";
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

    // Funcion para Obtener Banderas Activas y Mostradas
    function GetBanderasValidas(){
      try {
         $respuesta = $this->respuestaDefault();
         $query =  "SELECT Archivo FROM banderas WHERE Estatus = 1 AND Mostrar = 1 order by orden";
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

    // Obtener una sola Bandera
    function GetBandera($id){
      try {
         $respuesta = $this->respuestaDefault();
         $query =  "SELECT * from banderas where ID = '$id';";
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

    // Insertar Bandera
    function InsertaBandera($titulo, $archivo){
      try {
          $query = "INSERT INTO banderas (Titulo, Archivo) VALUES (?, ?);";
          $this->ExecuteQuery($query, array($titulo, $archivo));
          $respuesta = $this->respuestaSuccess();
      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
    }

    // Actualizar Bandera
    function ActualizarBandera($id,$titulo,$imagen){
      try {
        error_log($id."-".$titulo."-".$imagen);
        $repuesta = $this->respuestaDefault();
        $query = "UPDATE banderas SET Titulo = ?, Archivo = ? WHERE ID = ?;";
        $this->ExecuteQuery($query, array($titulo,$imagen,$id));
        $respuesta = $this->respuestaSuccess();
      } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
        $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
  	}

    // Mostrar / Ocultar Bandera
    function MostrarBandera($estado, $id){
      try {
        $query = "UPDATE banderas SET Mostrar = ? WHERE ID = ?;";
        $this->ExecuteQuery($query, array($estado,$id));
        $respuesta = $this->respuestaSuccess();
      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
  	}

    // Eliminar Bandera
    function EliminarBandera($id){
      try {
         $query = "UPDATE banderas SET Estatus = 0 WHERE ID = ?;";
         $this->ExecuteQuery($query, array($id));
         $respuesta = $this->respuestaSuccess();
      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
  	}

    function UpdatePosicionOrden($idBanner, $orden){
         $query = "UPDATE banderas SET orden = IF(orden = ?, orden,?) WHERE id = ?;";
         $this->ExecuteQuery($query, array($orden,$orden,$idBanner));
    }
  }
