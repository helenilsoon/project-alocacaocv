<?php 
	
 /**
  * Classe que conecta no banco de da
  * autor: @helenilson Oliveira
  *	data : 30/10/2020
  *
  */

namespace app\database;

  use PDO;
  use PDOException;
 class Sql extends PDO
 {
 		private $conn;

 	function __construct()
 	{
		if(file_exists("bd.env")){
			$data = parse_ini_file("bd.env");
			
		}else{
			$data = parse_ini_file("bdLocal.env");
			
		}
		
		$host=$data['DATABASE_HOST'];
		$hostUser=$data['DATABASE_USER'];
		$password=$data['DATABASE_PASSWORD'];
		$dbName=$data['DATABASE_NAME'];

		try{
			$opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			$this->conn = new PDO(
				"mysql:host=$host;dbname=$dbName",
				"$hostUser", 
				"$password", 
				$opcoes
			);
		}catch(PDOException $e){
			echo "Erro: ".$e->getMessage();
		}
 		
 	}

 	// Método que recebe a query e so parametros
 	public function queryExecute($rawQuery, $params = array()){
	
		try{
			$stmt = $this->conn->prepare($rawQuery);
			$this->setParams($stmt, $params);
			$stmt->execute();
			return $stmt;

		}catch(PDOException $e){
			echo "Erro: ".$e->getMessage();
		}


 	}

 	private function setParams($statement, $parameters = array()){

 			foreach ($parameters as $key => $value) {

 				$this->setParam($statement, $key, $value);
 			}

 	}

 	private function setParam($statement, $key, $value){
 		$statement->bindParam($key, $value);

 	
 	}

 	public function select($rawQuery, $params = array()):array
 	{		
			
 			$stmt = $this->queryExecute($rawQuery , $params);

 			return $stmt->fetchAll(PDO::FETCH_ASSOC);
 	}

 }