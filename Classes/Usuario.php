<?php 

/**
 * Classe usuario
 	autor: @helenilson Oliveira
 	data : 30/10/2020
 */
class Usuario
{

	private $id_usuario;
	private $CPF;
	private $nome;
	private $sobrenome;
	private $img;
	private $sexo;
	private $data_nascimento;
	private $CEL;
	private $TEL;
	private $sobre;
	private $email;
	private $username;
	private $profissao;
	private $password;
	private $experiencia;
	private $data_cadastro;
	private $last_pass_gen;
	private $ativo;
	private $tipo_usuario;

	
	//Localizando usuario pelo id
	

	public function loadById($id){
		$sql = new Sql();

		$res = $sql->select("SELECT * FROM tb_usuario WHERE id_usuario = :ID",array(
			":ID"=>$id
		));

		if (count($res) > 0) {

			$this->setData($res[0]);
		}

	}

	public static function getAllUser(){
		$sql = new Sql();

	 	return utf8_encode($sql->select("SELECT * FROM tb_usuario"));


		

	}
	//método para  inserir usuarios
	public function insert(){
		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert (:CPF, :NOME, :SOBRENOME, :IMG, :SEXO, :DATANASCIMENTO, :CEL, :TEL, :SOBRE, :EMAIL, :USERNAME, :PROFISSAO, :PASSWORD, :EXPERIENCIA, :ATIVO, :TIPOUSUARIO)",array(
			":CPF"=>$this->getCpf(),
			":NOME"=>$this->getNome(),
			":SOBRENOME"=>$this->getSobrenome(),
			":IMG"=>$this->getImg(),
			":SEXO"=>$this->getSexo(),
			":DATANASCIMENTO"=>$this->getDataNascimento(),
			":CEL"=>$this->getCel(),
			":TEL"=>$this->getTel(),
			":SOBRE"=>$this->getSobre(),
			":EMAIL"=>$this->getEmail(),
			":USERNAME"=>$this->getUsername(),
			":PROFISSAO"=>$this->getProfissao(),
			":PASSWORD"=>$this->getPassword(),
			":EXPERIENCIA"=>$this->getExperiencia(),
			":ATIVO"=>$this->getAtivo(),
			":TIPOUSUARIO"=>$this->getTipoUsuario()

		));

		

		if (count($results) > 0){

			$this->setData($results[0]);

		}else{
			throw new Exception("Erro ao cadastrar");
		}

	}
	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM tb_usuario where id_usuario = :ID",array(
			":ID"=>$this->getIdUsuario()
		));
	}

	public function setData($data){


	$this->setIdUsuario($data['id_usuario']);
	$this->setCpf($data['CPF']);
	$this->setNome($data['nome']);
	$this->setSobrenome($data['sobrenome']);
	$this->setImg($data['img']);
	$this->setSexo($data['sexo']);
	$this->setDataNascimento($data['data_nascimento']);
	$this->setCel($data['CEL']);
	$this->setTel($data['TEL']);
	$this->setSobre($data['sobre']);
	$this->setEmail($data['email']);
	$this->setUsername($data['username']);
	$this->setProfissao($data['profissao']);
	$this->setPassword($data['password']);
	$this->setExperiencia($data['experiencia']);
	$this->setDataCadastro($data['data_cadastro']);
	$this->setLastPassGen($data['last_pass_gen']);
	$this->setAtivo($data['ativo']);
	$this->setTipoUsuario($data['tipo_usuario']);


	}

	public function update(){
		$sql = new Sql();

		$sql->query("UPDATE tb_usuario set CPF =  :CPF, nome = :NOME, sobrenome = :SOBRENOME, img =  :IMG, sexo = :SEXO, data_nascimento = :DATANASCIMENTO, CEL = :CEL, TEL = :TEL, sobre :SOBRE, email :EMAIL, username = :USERNAME, profissao = :PROFISSAO, password = :PASSWORD, experiencia = :EXPERIENCIA, ativo = :ATIVO, tipo_usuario = :TIPOUSUARIO", array(
			":CPF"=>$this->getCpf(),
			":NOME"=>$this->getNome(),
			":SOBRENOME"=>$this->getSobrenome(),
			":IMG"=>$this->getImg(),
			":SEXO"=>$this->getSexo(),
			":DATANASCIMENTO"=>$this->getDataNascimento(),
			":CEL"=>$this->getCel(),
			":TEL"=>$this->getTel(),
			":SOBRE"=>$this->getSobre(),
			":EMAIL"=>$this->getEmail(),
			":USERNAME"=>$this->getUsername(),
			":PROFISSAO"=>$this->getProfissao(),
			":PASSWORD"=>$this->getPassword(),
			":EXPERIENCIA"=>$this->getExperiencia(),
			":ATIVO"=>$this->getAtivo(),
			":TIPOUSUARIO"=>$this->getTipoUsuario()
		));
	}

	public function __toString(){

		return json_encode(array(
			"id_usuario"=>$this->getIdUsuario(),
			"CPF"=>$this->getCpf(),
			"nome"=>$this->getNome(),
			"sobrenome"=>$this->getSobrenome(),
			"img"=>$this->getImg(),
			"sexo"=>$this->getSexo(),
			"data_nascimento"=>$this->getDataNascimento(),
			"CEL"=>$this->getCel(),
			"TEL"=>$this->getTel(),
			"sobre"=>$this->getSobre(),
			"email"=>$this->getEmail(),
			"username"=>$this->getUsername(),
			"profissao"=>$this->getProfissao(),
			"password"=>$this->getPassword(),
			"experiencia"=>$this->getExperiencia(),
			"data_cadastro"=>$this->getDataCadastro(),
			"last_pass_gen"=>$this->getLastPassGen(),
			"ativo"=>$this->getAtivo(),
			"tipo_usuario"=>$this->getTipoUsuario()

		));
	}


	// getters
	public function getIdUsuario(){
		return $this->id_usuario;
	}
	public function getCpf(){
		return $this->CPF;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getSobrenome(){
		return $this->sobrenome;
	}
	public function getImg(){
		return $this->img;
	}
	public function getSexo(){
		return $this->sexo;
	}
	public function getDataNascimento(){
		return $this->data_nascimento;
	}
	public function getCel(){
		return $this->CEL;
	}
	public function getTel(){
		return $this->TEL;
	}
	public function getSobre(){
		return $this->sobre;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getProfissao(){
		return $this->profissao;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getExperiencia(){
		return $this->experiencia;
	}
	public function getDataCadastro(){
		return $this->data_cadastro;
	}

	public function getLastPassGen(){
		return $this->last_pass_gen;
	}
	public function getAtivo(){
		return $this->ativo;
	}
	public function getTipoUsuario(){
		return $this->tipo_usuario;
	}
	//setters
	public function setIdUsuario($value){
		 $this->id_usuario = $value;
	}
	public function setCpf($value){
		 $this->CPF = $value;
	}
	public function setNome($value){
		 $this->nome = $value;
	}
	public function setSobrenome($value){
		 $this->sobrenome = $value;
	}
	public function setImg($value){
		 $this->img = $value;
	}
	public function setSexo($value){
		 $this->sexo = $value;
	}
	public function setDataNascimento($value){
		 $this->data_nascimento = $value;
	}
	public function setCel($value){
		 $this->CEL = $value;
	}
	public function setTel($value){
		 $this->TEL = $value;
	}
	public function setSobre($value){
		 $this->sobre = $value;
	}
	public function setEmail($value){
		 $this->email = $value;
	}
	public function setUsername($value){
		 $this->username = $value;
	}
	public function setProfissao($value){
		 $this->profissao = $value;
	}
	public function setPassword($value){
		 $this->password = $value;
	}
	public function setExperiencia($value){
		 $this->experiencia = $value;
	}
	public function setDataCadastro($value){
		 $this->data_cadastro = $value;
	}

	public function setLastPassGen($value){
		 $this->last_pass_gen = $value;
	}
	public function setAtivo($value){
		 $this->ativo = $value;
	}
	public function setTipoUsuario($value){
		 $this->tipo_usuario = $value;
	}

}