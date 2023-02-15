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

class TipoEsc extends Conexiones
{

  function GetTiposEsc(){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from tipos_escenarios order by tipo";
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

  function GetTipoEsc($idTipoEsc){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from tipos_escenarios where id = '$idTipoEsc';";
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
  //
  function actualizarTipoEsc($id_tipoEsc, $tipoEsc1){
    try {
       // $repuesta = $this->respuestaDefault();
        $tipoEsc = $this->limpiarSpecialCh($tipoEsc1);
        $query = "UPDATE tipos_escenarios SET tipo = ? where id = ?";
        $this->ExecuteQuery($query, array($tipoEsc,$id_tipoEsc));
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function insertaTipoEsc($tipoEsc1){
    try {
        $tipoEsc = $this->limpiarSpecialCh($tipoEsc1);
        $repuesta = $this->respuestaDefault();
        $query = "insert into tipos_escenarios (tipo) values (?)";
        $this->ExecuteQuery($query, array($tipoEsc));
        $respuesta = $this->respuestaSuccess();

    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
  }

  function EdoTipoEsc($idTipoEsc,$estado){
    try {
       $repuesta = $this->respuestaDefault();
       $query = "UPDATE tipos_escenarios set estatus = ? where id = ?";
        $this->ExecuteQuery($query, array($estado,$idTipoEsc));
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
  }
}
