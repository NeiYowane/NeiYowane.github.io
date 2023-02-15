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

class Artistas extends Conexiones
{

  function GetArtistas(){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from artistas order by nombre";
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


  function GetGeneroTo(){
      try {
         $respuesta = $this->respuestaDefault();
         $query =  "SELECT id, genero from generos where estatus = 1 order by genero";
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




  function GetArtista($idArtista){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from artistas where id = '$idArtista';";
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

  function actualizaArtistas($idartista,$artista1,$imagen, $tipo){
    try {
        $artista = $this->limpiarSpecialCh($artista1);
        $repuesta = $this->respuestaDefault();
        $query = "UPDATE artistas SET nombre = ?, nombre_archivo = ?, tipo = ? where id = ?";
        $this->ExecuteQuery($query, array($artista,$imagen,$tipo,$idartista));

        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function insertaArtista($artista1,$imagen,$Tipo, $Generos){
    try {
        $artista = $this->limpiarSpecialCh($artista1);
        $repuesta = $this->respuestaDefault();
        $query = "call GetMaxArtID(?,?,?);";
        $IDArtista = $this->ProcedureTEST($query, array($artista,$imagen, $Tipo));
        $IDArtistaTest = $IDArtista[0]['ID'];
        $Artista = new Artistas();
        error_log("Id: $IDArtistaTest");
        foreach ($Generos as $genero) {
          error_log("Prueba 2: $genero");
          $Artista->InsertArtGen($IDArtistaTest,$genero);
        }
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
  }

  function EdoArtista($idArtista,$estado){
    try {
       $repuesta = $this->respuestaDefault();
       $query = "UPDATE artistas set estatus = ? where id = ?";
        $this->ExecuteQuery($query, array($estado,$idArtista));
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
  }

  function InsertArtGen($idArt, $idGen){
       $query = "INSERT into artistas_generos(id_artista, id_genero) values (?,?)";
       $this->ExecuteQuery($query, array($idArt, $idGen));
  }

  function UpdateArtGen($idArt, $idGen){
       $query = "INSERT INTO artistas_generos (id_artista, id_genero) SELECT $idArt, $idGen WHERE NOT EXISTS (SELECT id_genero FROM artistas_generos WHERE id_artista = $idArt and id_genero = $idGen);";
       $this->ExecuteQuery($query, array());
  }
  // function GetMaxId(){
  //      $query = "SELECT (MAX(id)+1) as idMax from artistas";
  //      $MaxID = $this->Select($query);
  //      die(json_encode($MaxID));
  // }

  function GetArtGen($idArtista){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT ag.id_genero as id_genero FROM artistas_generos ag inner join generos g on ag.id_genero = g.id where ag.id_artista = $idArtista and g.estatus = 1";
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


  function DelRel($Generos, $idArtist){
       $GenArray = implode("', '", $Generos);
       // echo "<script type='text/javascript'>console.log('$GenArray');</script>";
       $query = "DELETE FROM artistas_generos WHERE id_genero NOT IN ('$GenArray') and id_artista = $idArtist";
       $this->ExecuteQuery($query, array());
       die(json_encode($GenArray));
  }

  function GetArtistasCards($Tipo){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT a.id as idArt, a.nombre as Artista, a.nombre_archivo as Foto, GROUP_CONCAT(g.genero SEPARATOR ', ') AS generos
                  FROM artistas_generos ag
                  INNER JOIN artistas a ON ag.id_artista =  a.id
                  INNER JOIN generos g ON ag.id_genero = g.id
                  where a.tipo = $Tipo and a.estatus = 1 and g.estatus = 1
                  GROUP BY a.nombre;";
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

  function DelImgArt($IdArt){
    try {
       $repuesta = $this->respuestaDefault();
       $query =  "update artistas set nombre_archivo = '' where id =?;";
       $this->ExecuteQuery($query,array($IdArt));
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
  }



}
