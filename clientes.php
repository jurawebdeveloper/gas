

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

  $query = $clienteDAO->listar();

?>
      
          <div class="col-lg-12 col-sm-12">
            <div class="page-header">
              <h1 id="tables">Clientes</h1>
            </div>

            <div class="bs-component">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Rua</th>
                    <th scope="col">Número</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Aniversário</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($query as $cliente) {
                    $cepDAO = new CepDAO();
                    $cep = new Cep();
                    $cep = $cepDAO->procuraCep($cliente->getCep());
                   
                   //echo '<pre>'; 
                    //print_r($cliente); exit;
                   ?>
                 <tr class="table-info">
                    <td> <?php echo $cliente->getNome(); ?> </td>
                    <td> <?php echo $cliente->getCpf(); ?> </td>
                    <td> <?php echo $cep->getLogradouro(); ?> </td>
                    <td> <?php echo $cliente->getNumero(); ?> </td>
                    <td> <?php echo $cliente->getCep(); ?> </td>
                    <td> <?php echo $cep->getBairro(); ?> </td>
                    <td> <?php echo $cliente->getAniversario(); ?> </td>
                    <td>
                        <a href="#" class="btn btn-light" data-toggle="tooltip" data-placement="top"  title="Visualizar">Tel</a>

                        <a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top"   title="Editar">Edita</a>

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


