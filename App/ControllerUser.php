<?php 



/**
 * 
 */
class ControllerUser
{
		private $nome;
		private $username;
		private $email;
		private $senha;
		private $token;
		


	public function post()
	{


			$nome =     isset($_POST["nome"])? $_POST["nome"]: "";
			$username = isset($_POST["username"])? $_POST["username"]: "";
			$email =    isset($_POST["email"])? $_POST["email"]: "";
			$senha =    isset($_POST["senha"])? $_POST["senha"]: "";
			$token =    isset($_POST["token"])? $_POST["token"]: "";
			
			$this->setNome($nome);
			$this->setUserName($username);
			$this->setEmail($email);
			$this->setSenha($senha);
			$this->setToken($token);


			echo $this->getNome;
		
	}

	//getters
	public function getNome(){
		return $this->nome;
	}
	public function getUserName(){
		return $this->username;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getSenha(){
		return $this->senha;
	}public function geToken(){
		return $this->token;
	}
			//setters
	public function setNome ($value){
		$this->nome = $value;
	}
	public function setUserName ($value){
		$this->username = $value;
	}
	public function setEmail ($value){
		$this->email    = $value;
	}
	public function setSenha ($value){
		$this->senha = $value;
	}
	public function setToken ($value){
		$this->token = $value;
	}

	

}
