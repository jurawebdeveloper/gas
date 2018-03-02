<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('autoload.php');

  $venda = new Venda();
  $vendaDAO = new VendaDAO();
  $itemVenda = new ItemVenda();
  $itemVendaDAO = new ItemVendaDAO();

  $itemEstoque = new ItemEstoque();
  $itemEstoqueDAO = new ItemEstoqueDAO();

  $venda->setCliente($_POST['cliente_id']);
  $venda->setDataHora($_POST['dataHora']);
  $venda->setTipoPagamento($_POST['tipoPagamento']);

  $idVenda = $vendaDAO->insereVenda($venda);
  //print_r($idVenda); exit;
  $itemVenda->setQuantidade($_POST['quantidade']);
  $itemVenda->setValorCobradoUn($_POST['valorCobrado']);
  $itemVenda->setItemEstoque($_POST['itemEstoque']);
  $itemVenda->setVenda($idVenda);
//print_r($itemVenda); exit;
  $itemVendaDAO->insereItemVenda($itemVenda);
  $itemEstoqueDAO->baixaItem($itemVenda->getItemEstoque(),$itemVenda->getQuantidade());
	$msg = 'concluída com sucesso!';
  	$class = 'success'; 
  
    header("Location:index.php?msg=$msg&class=$class"); 
?>