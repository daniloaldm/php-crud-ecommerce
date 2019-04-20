<?php 
require_once 'app\model\Produtos.php';
class ProdutosController {
    protected $classProduto;
    public function __construct () {
        $this->classProduto = new Produtos;
    }
    public function index ($validador) {
        $listagem = $this->classProduto->findAll();
        $_REQUEST['listagem'] = $listagem;
        if($validador) {
            $_REQUEST['auxiliar'] = true;
        } else {
            $_REQUEST['auxiliar'] = false;
        }
        require_once 'app/view/index.php';
    }
    public function addProduto ($parametros) {
        $cadastrarProduto = $this->classProduto->insert($parametros);
        if ($cadastrarProduto) {
            ProdutosController::index($parametros);
        } 
    }
    public function atualizarProduto($parametros) {
        $atualizarProduto = $this->classProduto->update($parametros);
        if ($atualizarProduto) {
            ProdutosController::index($parametros);
        }
    }
    public function find($id) {
        $listagem = $this->classProduto->findAll();
        $_REQUEST['listagem'] = $listagem;
        $_REQUEST['auxiliar'] = false;
        $_REQUEST['editar'] = $this->classProduto->find($id);
        require_once 'app/view/index.php'; 
    }
    public function delete($id) {
        $listagem = $this->classProduto->findAll();
        $_REQUEST['listagem'] = $listagem;
        $_REQUEST['auxiliar'] = $this->classProduto->delete($id);
        $_REQUEST['auxiliar'] = 'DELETAR';
        header('Location: /'); 
        require_once 'app/view/index.php';  
    }
}
?>