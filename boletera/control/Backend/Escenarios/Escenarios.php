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

class Escenarios extends Conexiones
{
  function GetEscenarios(){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT e.id as id, e.nombre as nombre, e.direccion as direccion, e.tipo as idTipo, te.tipo as tipo, e.imagen as imagen, e.capacidad as capacidad, e.estructura as estructura, e.estatus as estatus FROM escenarios e inner join tipos_escenarios te on e.tipo = te.id";
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

  function GetTipoEsc(){
      try {
         $respuesta = $this->respuestaDefault();
         $query =  "SELECT id,tipo FROM tipos_escenarios where estatus = 1 order by tipo asc;";
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

    function EdoEscenario($idEscenario,$status){
      try {
        $repuesta = $this->respuestaDefault();
        $query = "UPDATE escenarios set estatus = ? where id = ?";
        $this->ExecuteQuery($query, array($status,$idEscenario));
        $respuesta = $this->respuestaSuccess();
      } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
        $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
    }


    function insertaEscenario($esenario1,$imagen,$estructura,$direccion1,$tipo,$capacidad){
      try {
          $esenario = $this->limpiarSpecialCh($esenario1);
          $direccion = $this->limpiarSpecialCh($direccion1);
          $repuesta = $this->respuestaDefault();
          $query = "insert into escenarios (nombre, direccion, tipo, imagen, capacidad, estructura) values (?,?,?,?,?,?)";
          $this->ExecuteQueryPrueba($query, array($esenario,$direccion,$tipo,$imagen,$capacidad,$estructura));
          $respuesta = $this->respuestaSuccess();
      } catch (Exception $e) {
         echo "Error: ".$e->getMessage();
         $respuesta = $this->respuestaCatch();
      }
      die(json_encode($respuesta));
    }

  function GetEscenario($idEscenario){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from escenarios where id = '$idEscenario';";
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

  function actualizarEscenario($idEscenario, $esenario1,$imagen,$estructura,$direccion1,$tipo,$capacidad){
    try {
        $esenario = $this->limpiarSpecialCh($esenario1);
        $direccion = $this->limpiarSpecialCh($direccion1);

        error_log($idEscenario." ".$esenario." ".$direccion." ".$imagen." ".$estructura." ".$tipo." ".$capacidad);
        $repuesta = $this->respuestaDefault();
        $query = "UPDATE escenarios set nombre = ? , direccion = ?, tipo = ?, imagen = ? , capacidad = ?, estructura = ? where id = ?";
        $this->ExecuteQueryPrueba($query, array($esenario,$direccion,$tipo,$imagen,$capacidad,$estructura,$idEscenario));

        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}



}
?>
