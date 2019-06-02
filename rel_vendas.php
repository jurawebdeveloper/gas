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
              <h1 id="tables">Últimas Vendas</h1>
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


