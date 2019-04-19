<?php
require_once 'app/config/DB.php';
class Produtos extends DB{
	protected $table = 'tb_produtos';
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
				nome = :nome, preco = :preco, descricao = :descricao, imagem = :imagem 
			WHERE 
				id = :id"
		);
		return $stmt->execute(
			array (
				":id"			=> $parametros->id,
				":nome" 		=> $parametros->nome, 
				":preco" 		=> $parametros->preco, 
				":descricao" 	=> $parametros->descricao, 
				":imagem" 		=> $parametros->imagem
			)
		);
	}
	public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
	public function findAll(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}
}