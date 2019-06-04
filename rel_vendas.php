<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('layout/header.php');
?>

<?php 
  
  $ItemVendaDAO = new ItemVendaDAO();
  $ItemVenda = new ItemVenda();

  $itens = $ItemVendaDAO->listarVendasDatas();
//echo '<pre>';print_r($vendas); exit;
	
  if(isset($_POST['termo']) AND $_POST['termo'] != '' AND $_POST['termo2'] != '') {
    $itens = $ItemVendaDAO->listarVendasDatas($_POST['termo'], $_POST['termo2']);
  }
?>



      
  <div class="col-lg-12 col-sm-12">
    <div class="page-header">
      <h4 id="tables" >Vendas deste mês</h4>
      <p>Para outros períodos selecione as datas início e fim abaixo:</p>
      
      <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <div class="col-md-12">
          &nbsp;
          <input type="date" class="form-control col-lg-4" style="float: left;" name="termo" value="<?php if(isset($_POST['termo']) AND $_POST['termo'] != '') { echo $_POST['termo']; } ?>" data-toggle="tooltip" data-placement="top" title="Data inicial" required />
          &nbsp;
          <input type="date" class="form-control col-lg-4" style="float: left;" name="termo2" value="<?php if(isset($_POST['termo2']) AND $_POST['termo2'] != '') { echo $_POST['termo2']; } ?>" data-toggle="tooltip" data-placement="top" title="Data final" />
          &nbsp;
          <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Selecione data início e fim">
            <i class="fa fa-search" aria-hidden="true">Filtrar</i>
          </button>
          &nbsp;
          <a href="#" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Exportar para excel" target="_blank">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
          </a>
          &nbsp;
         
        
        </div>

      </form>
    </div>

    <div class="bs-component">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">CLIENTE</th>
            <th scope="col">PRODUTO</th>
            <th scope="col">QUANTIDADE</th>
            <th scope="col">VALOR COMPRA</th>
            <th scope="col">VALOR VENDA</th>
            <th scope="col">DATA</th>
            <th scope="col">TP PAGAMENTO</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($itens as $item){ 
           
           $Venda = new Venda();
           $VendaDAO = new VendaDAO();
           $ItemEstoque = new ItemEstoque();
           $ItemEstoqueDAO = new ItemEstoqueDAO();
           $Produto = new Produto();
           $ProdutoDAO = new ProdutoDAO();
           $cliente = new Cliente();
           $clienteDAO = new ClienteDAO();
           
           $venda = $VendaDAO->procurar($item->venda_id); 
           $client = $clienteDAO->procurar($venda->cliente_id); 
           $itemEst = $ItemEstoqueDAO->procurar($item->itemEstoque_id); 
           $prod = $ProdutoDAO->procurar($itemEst->produto_id); 
           
          ?>
          <tr class="table-info">
            <td> <?php echo $client->getNome(); ?> </td>
            <td> <?php echo $prod->getDescricao(); ?> </td>
            <td> <?php echo $item->getQuantidade(); ?> </td>
            <td> <?php echo $itemEst->getValorCompraUn(); ?> </td>
            <td> <?php echo $item->getValorCobradoUn(); ?> </td>
            <td> <?php echo substr($venda->getDataHora(),-20,10); ?> </td>
            <td> <?php echo $venda->getTipoPagamento(); ?> </td>
<!--private $id;
		private $quantidade;
		private $valorCobradoUn;
		private $itemEstoque;
		private $venda; 
Venda{
		private $id;
		private $cliente;
		private $dataHora;
		private $horaEntrega;
		private $entregador;
		private $tipoPagamento;
		private $dataPrevista;    
    
    
-->
          </tr>
          <?php } ?>
        </tbody>
      </table> 
    </div><!-- /example -->
  </div>
       

<?php
    
    require_once('layout/footer.php');
?>


