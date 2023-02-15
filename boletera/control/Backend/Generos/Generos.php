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

class Generos extends Conexiones
{

  function GetGeneros(){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from generos order by genero";
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

  function GetGenero($idgenero){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from generos where id = '$idgenero';";
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

  function actualizaGenero($idgenero,$genero1){
    try {
        $genero = $this->limpiarSpecialCh($genero1);
       // $repuesta = $this->respuestaDefault();
        $query = "UPDATE generos SET genero = ? where id = ?";
        $this->ExecuteQuery($query, array($genero,$idgenero));
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function insertaGenero($genero1){
    try {
        $genero = $this->limpiarSpecialCh($genero1);
        $repuesta = $this->respuestaDefault();
        $query = "insert into generos (genero, fecha_registro) values (?, CURRENT_TIMESTAMP())";
        $this->ExecuteQuery($query, array($genero));
        // InsertBitacora("Insert", "Se Inserto un genero a la base de datos");
        $respuesta = $this->respuestaSuccess();

    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
  }

  function EdoGenero($idGenero,$estado){
    try {
       $repuesta = $this->respuestaDefault();
       $query = "UPDATE generos set estatus = ? where id = ?";
        $this->ExecuteQuery($query, array($estado,$idGenero));
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
  }



  function GetGenerosCards(){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from generos where estatus = 1 order by fecha_registro desc";
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
}
