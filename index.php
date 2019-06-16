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

  $vendas = $vendaDAO->listarVendasDia();
//echo '<pre>';print_r($vendas); exit;
?>


  <div class="col-lg-6">
    <h4> Venda <?php echo $msg; ?> </h4>        
            <div class="bs-component">
              <form action="novaVenda.php" method="GET">
                <fieldset>
                  <div class="form-group">
                    <label class="col-form-label" for="numero">Telefone</label>
                    <input type="text" class="form-control fone" id="telefone" name="telefone"  placeholder="Aguardando nova chamada...">
                  </div>
                </fieldset>
                
                  <button type="submit" class="btn btn-primary">Localizar Cliente</button>
              </form>
            </div>
            <br>
            <br>
          </div>
      
          <div class="col-lg-12 col-sm-12">
            <div class="page-header">
              <h1 id="tables">Últimas Vendas</h1>
            </div>

            <div class="bs-component">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">HORA</th>
                    <th scope="col">QTDE</th>
                    <th scope="col">PRODUTO</th>
                    <th scope="col">CLIENTE</th>
                    <th scope="col">RUA</th>
                    <th scope="col">NÚMERO</th>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">TP PGTO</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($vendas as $venda) {
                    
                    $clienteDAO = new ClienteDAO();
                    $cliente = new Cliente();
                    $cliente = $clienteDAO->procurar($venda->cliente_id);
                    
                    $telefone = $telefoneDAO->procuraTelCli($cliente->getId());
                    //echo '<pre'; print_r($telefone); exit;

                    $cepDAO = new CepDAO();
                    $cep = new Cep();
                    $cep = $cepDAO->procuraCep($cliente->getCep());
                    
                    
                    $itemVendaDAO = new ItemVendaDAO();
                    $itemVenda = new ItemVenda();
                    $itemVenda = $itemVendaDAO->procurarItemPorVenda($venda->getId());
                    
                    $itemEstoqueDAO = new ItemEstoqueDAO();
                    $itemEstoque = new ItemEstoque();
                    $itemEst = $itemEstoqueDAO->procurar($itemVenda[0]->itemEstoque_id);
                    
                    $produtoId = $itemEst->produto_id;
                    $produto = new Produto();
                    $produtoDAO = new ProdutoDAO();
                    $produto = $produtoDAO->procurar($itemEst->produto_id);
                
                    $tpPag = $venda->getTipoPagamento();
                    switch($tpPag){
                      case 1:
                         $tpPag = 'Deinheiro'; break;
                      case 2:
                         $tpPag = 'Débito'; break;
                      case 3:
                         $tpPag = 'Crédito'; break;
                      case 4:
                         $tpPag = 'Cheque'; break;
                      default:
                         $tpPag = 'Prazo';
                    }

                   ?>
                 <tr class="table-info">
                    
                    <td> <?php echo substr($venda->getDataHora(),10,6); ?> </td>
                    <td> <?php echo $itemVenda[0]->getQuantidade(); ?> </td>
                    <td> <?php echo $produto->getDescricao(); ?> </td>
                    <td> <?php echo $cliente->getNome(); ?> </td>
                    <td> <?php echo $cep->getLogradouro(); ?> </td>
                    <td> <?php echo $cliente->getNumero(); ?> </td>
                    <td> <a href="novaVenda.php?telefone=<?php echo $telefone->getNumero(); ?>" style="color: #FFF"><?php echo $telefone->getNumero(); ?></a></td>
                    <td> <?php echo  $tpPag; ?> </td>
                    <td>
                        

                        <a href="#" class="btn btn-warning"  data-toggle="tooltip" data-placement="top" title="Entregar">Entregar</a> 

                        <a href="#" class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Deletar">X</a> 
                    </td>

                  </tr>
                  <?php } ?>
               </tbody>
              </table> 
            </div><!-- /example -->
          </div>
       

<?php
    
    require_once('layout/footer.php');
?>


