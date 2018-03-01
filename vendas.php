<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('layout/header.php');
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

  $vendas = $vendaDAO->listar();
//print_r($vendas); exit;
?>


  <div class="col-lg-6">
            
            <div class="bs-component">
              <form action="novaVenda.php" method = "post">
                <fieldset>
                  <div class="form-group">
                    <label class="col-form-label" for="numero">Telefone</label>
                    <input type="text" class="form-control fone" id="telefone" name = "telefone"  placeholder="Aguardando nova chamada...">
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
                    <th scope="col">id</th>
                    <th scope="col">hora venda</th>
                    <th scope="col">cliente</th>
                    <th scope="col">rua</th>
                    <th scope="col">numero</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($vendas as $venda) {
                    $clienteDAO = new ClienteDAO();
                    $cliente = new Cliente();
                    $cliente = $clienteDAO->procurar($venda->cliente_id);


                    $cepDAO = new CepDAO();
                    $cep = new Cep();
                    $cep = $cepDAO->procuraCep($cliente->getCep());
                   
                   //echo '<pre>'; 
                    //print_r($cliente); exit;
                   ?>
                 <tr class="table-info">
                    <td> <?php echo $venda->getid(); ?> </td>
                    <td> <?php echo $venda->getDataHora(); ?> </td>
                    <td> <?php echo $cliente->getNome(); ?> </td>
                    <td> <?php echo $cep->getLogradouro(); ?> </td>
                    <td> <?php echo $cliente->getNumero(); ?> </td>
                    <td>
                        

                        <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top"   title="Editar">Entrega</a>

                        <!--<a href="#" class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Deletar">Exclui</a> -->
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


