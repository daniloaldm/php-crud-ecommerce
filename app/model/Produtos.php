<?php
require_once 'app/config/DB.php';
class Produtos extends DB{
	protected $table;
	public function __construct() {
		$this->table = 'tb_produtos';
	}
	public function insert($parametros = []){
		$parametros = (object) $parametros;
		$stmt = DB::prepare(
			"INSERT INTO 
				$this->table (nome, preco, descricao, imagem) 
			VALUES 
				(:nome, :preco, :descricao, :imagem)"
		);
		return $stmt->execute(
			array(
				":nome" 		=> $parametros->nome, 
				":preco" 		=> $parametros->preco, 
				":descricao" 	=> $parametros->descricao, 
				":imagem" 		=> $parametros->imagem
			)
		); 
	}
	public function update($parametros){
		$parametros = (object) $parametros;
		$stmt = DB::prepare(
			"UPDATE 
				$this->table 
			SET 
				nome = :nome, preco = :preco, descricao = :descricao
			WHERE 
				id = :id"
		);
		return $stmt->execute(
			array (
				":id"			=> $parametros->id,
				":nome" 		=> $parametros->nome, 
				":preco" 		=> $parametros->preco, 
				":descricao" 	=> $parametros->descricao
			)
		);
	}
	public function find($id){
		$stmt = DB::prepare(
			"SELECT * FROM 
				$this->table 
			WHERE 
				id = :id"
		);
		$stmt->execute(array (":id"	=> $id));
		return $stmt->fetch();
	}
	public function findAll(){
		$stmt = DB::prepare("SELECT * FROM $this->table");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function delete($id){
		$stmt = DB::prepare(
			"DELETE FROM 
				$this->table 
			WHERE 
				id = :id"
		);
		return $stmt->execute(array(":id" => $id)); 
	}
}