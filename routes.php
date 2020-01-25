<?php 
require_once 'app/controller/ProdutosController.php';
$controller = new ProdutosController;
if (isset($_POST['cadastrar'])) 
    $controller->addProduto($_POST);    
if (isset($_POST['atualizar'])) 
    $controller->atualizarProduto($_POST);
if (isset($_GET['acao']) && $_GET['acao'] == 'editar')
    $controller->find($_GET['id']);
if (isset($_GET['acao']) && $_GET['acao'] == 'deletar')
    $controller->delete($_GET['id']);
?>