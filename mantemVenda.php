<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
date_default_timezone_set("America/Sao_Paulo");
    require_once('autoload.php');

  $venda = new Venda();
  $vendaDAO = new VendaDAO();
  $itemVenda = new ItemVenda();
  $itemVendaDAO = new ItemVendaDAO();

  $itemEstoque = new ItemEstoque();
  $itemEstoqueDAO = new ItemEstoqueDAO();
  $cliente = new Cliente();
  $clienteDAO = new ClienteDAO(); 
  //print 'teste1';exit;

if ($_GET['vendaId']){
  $venda = $vendaDAO->procurar($_GET['vendaId']);
  $itemVenda = $itemVendaDAO->procurarItemPorVenda($venda->getId());
  //echo '<pre>'; print_r($venda);exit;
  
  if($_GET['acao']=='deletar'){
   $itemDel = $itemVendaDAO->deletar($itemVenda[0]->getId());
   //echo '<pre>'; print_r($venda);exit;
    $vendaDel = $vendaDAO->deletar($venda->getId());

    $msg = 'excluída com sucesso!';
    $class = 'success'; 
  
    header("Location:index.php?msg=$msg&class=$class");

  }elseif($_GET['acao']=='entregar'){
    $dataHora = date('Y-m-d H:i');
    
    $venda->setHoraEntrega($dataHora);
    //echo '<pre>'; print_r($venda);exit;
        $vendaEntrega = $vendaDAO->alteraVenda($venda);

    $msg = 'entregue com sucesso!';
    $class = 'success'; 
  
    header("Location:index.php?msg=$msg&class=$class");

  }else{ //quando for alterar venda;
    $venda_id = $_GET['vendaId'];
    $venda = $vendaDAO->procurar($venda_id );
    $venda->setTipoPagamento($_POST['tipoPagamento']);
    //echo'<pre>';print_r($venda);exit;
    $vendaDAO->alteraVenda($venda);

    $itemVenda = $itemVendaDAO->procurar($_POST['itemVenda_id']);
    $itemVenda->setQuantidade($_POST['quantidade']);
    $itemVenda->setValorCobradoUn($_POST['valorCobrado']);
    $itemVenda->setItemEstoque($_POST['itemEstoque']);
    $itemVenda->setVenda($venda_id);
      //echo'<pre>';print_r($itemVenda);exit;
  
  $itemVendaDAO->alteraItemVenda($itemVenda);

  

  $msg = 'alterada com sucesso!';
    $class = 'success'; 
  
    header("Location:index.php?msg=$msg&class=$class");
  }
}else{ //quando for incluir venda nova
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
}
?>