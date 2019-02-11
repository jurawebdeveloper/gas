<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
date_default_timezone_set("America/Sao_Paulo");
    require_once('autoload.php');


  $itemEstoque = new ItemEstoque();
  $itemEstoqueDAO = new ItemEstoqueDAO();
  $produto = new Produto();
  $produtoDAO = new ProdutoDAO();

  $produto->setId($_POST['produto']);

  //str_replace(",", ".", $_POST['valorCompra'])
  $itemEstoque->setDataEntrada($_POST['dataHora']);
  $itemEstoque->setQuantidade($_POST['quantidade']);
  $itemEstoque->setValorCompraUn(str_replace(",", ".", $_POST['valorCompra']));
  $itemEstoque->setValorVendaUn(str_replace(",", ".", $_POST['valorVenda']));
  $itemEstoque->setProduto($produto);
  $itemEstoque->setNota($_POST['nota']);

  
//print_r($itemEstoque); exit;
  $itemEstoqueDAO->insereItemEstoque($itemEstoque);
  
	$msg = 'incluído com sucesso!';
  	$class = 'success'; 
  
    header("Location:novoEstoque.php?msg=$msg&class=$class");
?>