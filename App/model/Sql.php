<?php 
	
 /**
  * Classe que conecta no banco de da
  * autor: @helenilson Oliveira
 	data : 30/10/2020
  *
  */
 class Sql extends PDO
 {
 		private $conn;

 	function __construct()
 	{
		try{
			$opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
			$this->conn = new PDO(
				"mysql:host=localhost;dbname=id11855241_db_webuild",
				"root", 
				"", 
				$opcoes
			);
		}catch(PDOException $e){
			echo "Erro: ".$e->getMessage();
		}
 		
 	}

 	// Método que recebe a query e so parametros
 	public function query($rawQuery, $params = array()){
	
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
			
 			$stmt = $this->query($rawQuery , $params);

 			return $stmt->fetchAll(PDO::FETCH_ASSOC);
 	}

 }