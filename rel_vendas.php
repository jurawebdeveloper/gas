<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('layout/header.php');
if (isset($_GET['msg'])) {
      $msg = ($_GET['msg']);
    } else{$msg = "";}
?>

<?php 
  $cliente = new Cliente();
  $clienteDAO = new ClienteDAO();
  $telefone = new Telefone();
  $telefoneDAO = new TelefoneDAO();
  $cep = new Cep();
  $cepDAO = new CepDAO();
  $venda = new Venda();
  $vendaDAO = new VendaDAO();
  $produto = new Produto();
  $produtoDAO = new ProdutoDAO();
  $itemVendaDAO = new itemVendaDAO();
  $itemVenda = new itemVenda();

  $vendas = $vendaDAO->listarVendas();
//print_r($vendas); exit;
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
                    <th scope="col">HORA VENDA</th>
                    <th scope="col">CLIENTE</th>
                    <th scope="col">RUA</th>
                    <th scope="col">NÚMERO</th>
                    <th scope="col">TELEFONE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($vendas as $venda) {
                    $clienteDAO = new ClienteDAO();
                    $cliente = new Cliente();
                    $cliente = $clienteDAO->procurar($venda->cliente_id);

                    $telefone = $telefoneDAO->procuraTelCli($cliente->getId());


                    $cepDAO = new CepDAO();
                    $cep = new Cep();
                    $cep = $cepDAO->procuraCep($cliente->getCep());

                    
                   ?>
                 <tr class="table-info">
                    <td> <?php echo $venda->getDataHora(); ?> </td>
                    <td> <?php echo $cliente->getNome(); ?> </td>
                    <td> <?php echo $cep->getLogradouro(); ?> </td>
                    <td> <?php echo $cliente->getNumero(); ?> </td>
                    <td> <?php echo $telefone->getNumero(); ?> </td>
                    
                  </tr>
                  <?php } ?>
               </tbody>
              </table> 
            </div><!-- /example -->
          </div>
       

<?php
    
    require_once('layout/footer.php');
?>


