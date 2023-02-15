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
class Eventos extends Conexiones
{
  function GetArtistas()
  {
    try {
      $respuesta = $this->respuestaDefault();
      $q = "select id, nombre from artistas where estatus = 1";
      $resultado = $this->Select($q);
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
  function GetEscenarios()
  {
    try {
      $respuesta = $this->respuestaDefault();
      $q = "select id, nombre from escenarios where estatus = 1";
      $resultado = $this->Select($q);
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
  function insertaEvento($tituloEvento,$NombrearchivoEvento,$fechaEvento,$horaEvento,$Sinopsis,$observaciones,$escenario,$NombrearchivoEscenario,$idArtista) // id Artista es un arreglo
  {
    try
    {
      $respuesta = $this->respuestaDefault();
      $q = "call selectMaxEvento('$tituloEvento','$NombrearchivoEvento','$fechaEvento','$horaEvento','$Sinopsis','$observaciones','$escenario','$NombrearchivoEscenario');";
      $ultimoEvento = $this->Procedure($q);
       // Insertamos en la tabla relacional artista evento
      $idEvento = $ultimoEvento[0]['ID'];
      $evento = new Eventos();
      $evento->insertaArtistaEvento($idEvento,$idArtista);
      $respuesta = $this->respuestaSuccess();
    }
    catch (Exception $e)
    {
      echo "Error: ".$e->getMessage();
      $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
  }
  function insertaArtistaEvento($idEvento,$idArtista)
  {
    try
    {
      // $respuesta = $this->respuestaDefault();
      $q = "insert into artistas_eventos (id_artista,id_evento) values (?,?);";
      for ($i=0; $i <sizeof($idArtista); $i++)
      {
        $id = $idArtista[$i];
        $this->ExecuteQuery($q,array($id,$idEvento));
      }
      // $respuesta = $this->respuestaSuccess();
    }
    catch (Exception $e)
    {
      // echo "Error: ".$e->getMessage();
      // $respuesta = $this->respuestaCatch();
    }
    // die(json_encode($respuesta));
  }
}
