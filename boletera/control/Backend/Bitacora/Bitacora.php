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

class Bitacora extends Conexiones
{
  function InsertBitacora($accion1, $descripcion1, $IdUserAdmin){
    $accion = $this->limpiarSpecialCh($accion1);
    $descripcion = $this->limpiarSpecialCh($descripcion1);
    $query = "insert into bitacora (accion, descripcion, fecha, id_usuario) values (?, ?, CURRENT_TIMESTAMP(), ?)";
    $this->ExecuteQuery($query, array($accion, $descripcion, $IdUserAdmin));
    die();
  }

    function GetBitacora(){
      try {
         $respuesta = $this->respuestaDefault();
         $query =  "SELECT B.id as 'id', B.accion as 'accion', B.descripcion as 'descripcion', B.fecha as 'fecha', U.usuario as 'usuario' from bitacora as B inner join sys_usuarios as U on U.id_sys_usuario = B.id_usuario order by B.fecha desc";
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
