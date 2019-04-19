<?php 

require_once 'app/model/Produtos.php';

class ProdutosController {
    public function index () {
        $produto = new Produtos;
        $listagem = $produto->findAll();
        $_REQUEST['listagem'] = $listagem;
        require_once 'app/view/index.php';
    }
}

?>