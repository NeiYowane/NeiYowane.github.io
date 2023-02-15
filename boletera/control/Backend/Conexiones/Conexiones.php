<?php
class Conexiones{
	private $dbh;
	function __construct()
	{
		$dsn = "mysql:host=192.185.131.189;dbname=resosist_boletera;charset=utf8mb4";
		$options = [
			PDO::ATTR_EMULATE_PREPARES   => false,
			PDO::ATTR_EMULATE_PREPARES => true,
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		];
		$this->dbh = new PDO($dsn, 'resosist_usrboletera', 'Boleter@2022', $options);
	}
	function Select($q){
		try{
		    $sth = $this->dbh->prepare($q);
		    $sth->execute();
		    $sth->setFetchMode(PDO::FETCH_ASSOC);
		    $result = $sth->fetchAll();
				$this->dbh = null;
		    return $result;
		}
		catch(PDOException $e){
		    error_log('PDOException - ' . $e->getMessage(), 0);
		    http_response_code(500);
		    die($e->getMessage());
	    }
	}

	function Delete($q,$parametros)
	{
		try
		{
		    // Prepare the SQL query
		    $sth = $this->dbh->prepare($q);
		    // Bind parameters to statement variables
		    // Execute statement
		    $sth->execute($parametros);
		    //Close the connection to the database
		    $this->dbh = null;
		}
		catch(PDOException $e)
		{
		    error_log('PDOException - ' . $e->getMessage(), 0);
		    http_response_code(500);
		    die($e->getMessage());
		    return $e->getMessage();
	    }
	}

	/*function Delete($q, $parametros)
	{
		try
		{
		    // Prepare the SQL query
		    $sth = $this->dbh->prepare($q);
		    // Bind parameters to statement variables
		    // Execute statement
		    $sth->execute($parametros);
		    //Close the connection to the database
		    $this->dbh = null;
		}
		catch(PDOException $e)
		{
		    error_log('PDOException - ' . $e->getMessage(), 0);
		    http_response_code(500);
		    die($e->getMessage());
		    return $e->getMessage();
	    }
	}	*/
	function SelectAndContinue($q){
		try{
		    $sth = $this->dbh->prepare($q);
		    $sth->execute();
		    $sth->setFetchMode(PDO::FETCH_ASSOC);
		    $result = $sth->fetchAll();
		    return $result;
		}
		catch(PDOException $e){
		    error_log('PDOException - ' . $e->getMessage(), 0);
		    http_response_code(500);
		    die($e->getMessage());
	    }
	}

	function ExecuteQueryPrueba($q, $parametros){
		try	{
		    $sth = $this->dbh->prepare($q);
		    $sth->execute($parametros);
		    $this->dbh = null;
		}
		catch(PDOException $e){
		    error_log('PDOException - ' . $e->getMessage(), 0);
		    http_response_code(500);
		    die($e->getMessage());
		    return $e->getMessage();
	    }
	}

	function ExecuteQuery($q, $parametros){
		try	{
				$sth = $this->dbh->prepare($q);
				for ($i=0; $i < sizeof($parametros) ; $i++) {
					$sth->bindValue(($i+1), $parametros[$i], PDO::PARAM_STR);
				}
				$sth->execute();
		}
		catch(PDOException $e){
				error_log('PDOException - ' . $e->getMessage(), 0);
				http_response_code(500);
				die($e->getMessage());
				return $e->getMessage();
			}
	}

	function Procedure($q){
		try {
			$res = $this->dbh->prepare($q);
			$res->execute();
			$array = array();
			while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
				$array[] = $row;
			}
			return $array;
		} catch (\Exception $e) {
			error_log($e);
		}
	}

	function ProcedureTEST($q,$parametros){
		try {
			$sth = $this->dbh->prepare($q);
			for ($i=0; $i < sizeof($parametros) ; $i++) {
				$sth->bindValue(($i+1), $parametros[$i], PDO::PARAM_STR);
			}
			$sth->execute();
			$array = array();
			while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
				$array[] = $row;
			}
			return $array;
		} catch (\Exception $e) {
			error_log($e);
		}
	}

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
				"Icono_alerta" => 'warning',
				"Titulo_alerta" => 'Opps...!',
				"Texto_alerta" => 'Ha ocurrido un error, verifica tus datos.',
		 );
		 return $respuesta;
	}

	function respuestaSuccess() {
		 $respuesta = array(
				"Resultado" => true,
				"Icono_alerta" => 'success',
				"Titulo_alerta" => 'EXITO!',
				"Texto_alerta" => 'Operacion realizada correctamente',
		 );
		 return $respuesta;
	}

	function limpiarSpecialCh($entrada){
		$Salida = preg_replace('/[^a-zA-ZÀ-ÿ0-9\u00f1\u00d1\u00dc\u00fc\x26\x24\x2D\x2A\x40\x23\x2F\x2C\x2E ]/', '', $entrada);
		return $Salida;
	}

}
?>
