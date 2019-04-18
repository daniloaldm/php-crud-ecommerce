<?php

require_once 'Crud.php';

class Produtos extends Crud{
	
	protected $table = 'tb_produtos';
	private $nome;
	private $preco;
	private $descricao;
	private $imagem;

	public function setNome($nome){
		$this->nome = $nome;
	}

	
	public function getNome(){
		return $this->nome;
	}
	

	public function setPreco($preco){
		$this->preco = $preco;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function setImagem($imagem){
		$this->imagem = $imagem;
	}

	//=====================
	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, preco, descricao, imagem) VALUES (:nome, :preco, :descricao, :imagem)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':preco', $this->preco);
		$stmt->bindParam(':descricao', $this->descricao);
		$stmt->bindParam(':imagem', $this->imagem);
	//	$stmt->bindParam(':imagem', $blob, PDO::PARAM_LOB, this->imagem);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, preco = :preco, descricao = :descricao, imagem = :imagem WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':preco', $this->preco);
		$stmt->bindParam(':descricao', $this->descricao);
		$stmt->bindParam(':imagem', $this->imagem);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}