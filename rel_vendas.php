<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('layout/header.php');
?>

<?php 
  
  $ItemVendaDAO = new ItemVendaDAO();
  $ItemVenda = new ItemVenda();

  $itens = $ItemVendaDAO->listar();
//echo '<pre>';print_r($vendas); exit;
	
  if(isset($_POST['termo']) AND $_POST['termo'] != '' AND $_POST['termo2'] != '') {
    $itens = $ItemVendaDAO->listar($_POST['termo'], $_POST['termo2']);
  }
?>



      
  <div class="col-lg-12 col-sm-12">
    <div class="page-header">
      <h3 id="tables">Vendas deste mês</h3>
      
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
          <a href="atendimentos_excel.php?dt1=<?php echo $dt1; ?>&dt2=<?php echo $dt2; ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Exportar para excel" target="_blank">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
          </a>
          &nbsp;
          <a href="atendimentos_pdf.php?dt1=<?php echo $dt1; ?>&dt2=<?php echo $dt2; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Exportar para excel" target="_blank">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
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
           $VendaDAO = new VendaDAO();
           $Venda = new Venda();
           $clienteDAO = new ClienteDAO();
           $cliente = new Cliente();
           $venda = $VendaDAO->procurar($item->venda_id); 
           $cliente = $clienteDAO->procurar($venda->cliente_id); 
           //$cliente = $clienteDAO->procurar(21); 
          ?>
          <tr class="table-info">
            <td> <?php echo $cliente->getNome(); ?> </td>
            
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


