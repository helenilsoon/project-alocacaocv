<?php 

/**
 * Classe usuario
* 	autor: @helenilson Oliveira
*	data : 30/10/2020
 */
class Profissao
{

	private $id_profissoes;
	private $nome_profissao;
	private $descricao;
	private $icon;

	
	//Localizando usuario pelo id
	

	public function loadById($id){
		$sql = new Sql();

		$res = $sql->select("SELECT * FROM tb_profissoes WHERE id_profissoes = :ID",array(
			":ID"=>$id
		));

		if (count($res) > 0) {

			$this->setData($res[0]);
		}

	}

	public static function getAllUser(){
		$sql = new Sql();

	 	return $sql->select("SELECT * FROM tb_profissoes");		

	}
	//método para  inserir usuarios
	public function insert(){
		$sql = new Sql();

		$results = $sql->select("CALL sp_profissoes_insert ( :NOMEPROFISSAO, :DESCRICAO, :ICON )",array(
			":NOMEPROFISSAO"=>$this->getNomeProfissao(),
			":DESCRICAO"=>$this->getDescricao(),
			":ICON"=>$this->getIcon()		

		));

		if (count($results) > 0){

			$this->setData($results[0]);

		}else{
			throw new Exception("Erro ao cadastrar");
		}

	}
	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM tb_profissoes where id_profissoes = :ID",array(
			":ID"=>$this->getIdProfissao()
		));
	}

	public function setData($data){


	$this->setIdProfissao($data['id_profissoes']);
	$this->setNomeProfissao($data['nome_profissao']);
	$this->setDescricao($data['descricao']);
	$this->setIcon($data['icon']);
	

	}

	public function update(){
		$sql = new Sql();

		$sql->query("UPDATE tb_profissoes set nome_profissao = :NOMEPROFISSAO, descricao = :DESCRICAO, icon = :ICON )",array(
			":NOMEPROFISSAO"=>$this->getNomeProfissao(),
			":DESCRICAO"=>$this->getDescricao(),
			":ICON"=>$this->getIcon()
			
		));
	}

	public function __toString(){

		return json_encode(array(
			"id_profissoes"=>$this->getIdProfissao(),
			"nome_profissao"=>$this->getNomeProfissao(),
			"descricao"=>$this->getDescricao(),
			"icon"=>$this->getIcon()
			
		));
	}


	// getters
	public function getIdProfissao(){
		return $this->id_profissoes;
	}
	public function getNomeProfissao(){
		return $this->nome_profissao;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function getIcon(){
		return $this->icon;
	}
	
	//setters
	public function setIdProfissao($value){
		 $this->id_profissoes = $value;
	}
	public function setNomeProfissao($value){
		 $this->nome_profissao = $value;
	}
	public function setDescricao($value){
		 $this->descricao = $value;
	}
	public function setIcon($value){
		 $this->icon = $value;
	}
	

}