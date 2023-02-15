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

class Marcas extends Conexiones
{

  function GetMarcas(){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from marcas order by marca";
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

  function GetCategorias(){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from categorias order by categoria";
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
  function GetFamilias(){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * FROM clasificaciones";
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

  function GetMarca($idmarca){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from marcas where idmarca = '$idmarca'";
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



  function GetCategoria($idCategoria){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from categorias where idcategoria = '$idCategoria';";
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

  function GetClasificacion($idclasificacion){
    try {
       $respuesta = $this->respuestaDefault();
       $query =  "SELECT * from clasificaciones
   					where id_clasificacion = '$idclasificacion'";
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

  function EdoMarcas($estado,$idmarca){
    try {
       $repuesta = $this->respuestaDefault();
        $query = "UPDATE marcas set status = ? where idmarca = ?";
        $this->ExecuteQuery($query, array($estado,$idmarca));
        $Conexiones2 = new Conexiones();
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}
  function EdoFamilia($estado,$idclasificacion){
    try {
       $repuesta = $this->respuestaDefault();
        $query = "UPDATE clasificaciones set status = ? where id_clasificacion = ?";
        $this->ExecuteQuery($query, array($estado,$idclasificacion));
        $Conexiones2 = new Conexiones();
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function EdoCategorias($estado,$idcategoria){
    try {
       $repuesta = $this->respuestaDefault();
        $query = "UPDATE categorias set status = ? where idcategoria = ?";
        $this->ExecuteQuery($query, array($estado,$idcategoria));
        $Conexiones2 = new Conexiones();
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function insertaMarca($marca,$imagen,$bandera_carrito,$porcentaje,$direccion,$telefono,$descuentoMarca,$ivaMarca){
    try {
       $repuesta = $this->respuestaDefault();
        $query = "INSERT into marcas(marca, imagen, bandera_carrito,porcentaje,direccion,telefono,conDescuento,conIva)
     		values(?,?,?,?,?,?,?,?);";
        $this->ExecuteQuery($query, array($marca,$imagen,$bandera_carrito,$porcentaje,$direccion,$telefono,$descuentoMarca,$ivaMarca));

        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function insertaCategoria($categoria,$imagen,$bandera_carrito){
    try {
       $repuesta = $this->respuestaDefault();
        $query = "INSERT into categorias(categoria, imagen, bandera_carrito)
    		values(?,?,?);";
        $this->ExecuteQuery($query, array($categoria,$imagen,$bandera_carrito));

        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function actualizaMarca($idmarca,$marca,$imagen,$bandera_carrito,$porcentaje,$direccion,$telefono,$descuentoMarca,$ivaMarca){
    try {
       $repuesta = $this->respuestaDefault();
        $query = "UPDATE marcas set marca = ?, imagen = ?, bandera_carrito = ?, porcentaje = ?, direccion = ?, telefono = ?,conDescuento = ?, conIva = ?
    		where idmarca = ?";
        $this->ExecuteQuery($query, array($marca,$imagen,$bandera_carrito,$porcentaje,$direccion,$telefono,$descuentoMarca,$ivaMarca,$idmarca));

        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function actualizaClasificacion($idclasificacion,$clasificacion){
    try {
       $repuesta = $this->respuestaDefault();
        $query = "UPDATE clasificaciones set clasificaciones = ? where id_clasificacion = ?";
        $this->ExecuteQuery($query, array($clasificacion,$idclasificacion));

        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function actualizaCategoria($idcategoria,$categoria,$bandera_carrito,$imagen){
    try {
       $repuesta = $this->respuestaDefault();
        $query = "UPDATE categorias set categoria = ?, bandera_carrito = ?, imagen = ?
    		where idcategoria = ?";
        $this->ExecuteQuery($query, array($categoria,$bandera_carrito,$imagen,$idcategoria));

        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}

  function insertaClasificacion($clasificacion){
    try {
       $repuesta = $this->respuestaDefault();
        $query = "INSERT into clasificaciones(clasificaciones)
    		values(?)";
        $this->ExecuteQuery($query, array($clasificacion));
        $respuesta = $this->respuestaSuccess();
    } catch (Exception $e) {
       echo "Error: ".$e->getMessage();
       $respuesta = $this->respuestaCatch();
    }
    die(json_encode($respuesta));
	}
}

 ?>
