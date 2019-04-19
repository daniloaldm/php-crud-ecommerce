<?php

require_once 'Crud.php';

class Produtos extends Crud{
	
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

}