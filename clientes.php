

<?php
date_default_timezone_set("America/Sao_Paulo");
    require_once('layout/header.php');

if (isset($_GET['msg'])) {
      $msg = ($_GET['msg']);
    } else{$msg = "";}
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
              <p><?php echo $msg; ?></p>
            </div>
            <div class="cards">
                      <div class="card-header d-flex align-items-right">
                        <a href="novoCliente.php?acao=Cadastrar" class="btn btn-primary " id="direita" style="margin-left: auto;">Novo Cliente</a>  
                        &nbsp;
                        &nbsp;
                      </div>
            <div class="bs-component">
              <table class="table table-hover">
                <thead style="text-align: center; background-color: white;">
                  <tr>
                    <th scope="col">TELEFONE</th>
                    <th scope="col">NOME</th>
                    <th scope="col">CPF</th>
                    <th scope="col">RUA</th>
                    <th scope="col">NÚMERO</th>
                     <!-- <th scope="col">CEP</th> -->
                    <th scope="col">BAIRRO</th>
                    <th scope="col">ANIVERSÁRIO</th>
                    <th scope="col">CONTROLE Ações</th>
                  </tr>
                </thead>
                <tbody style="text-align: center; ">
                  <?php foreach ($query as $cliente) {
                    $cepDAO = new CepDAO();
                    $cep = new Cep();
                    $cep = $cepDAO->procuraCep($cliente->getCep());
                    $telefone = $telefoneDAO->procuraTelCli($cliente->getId());
                   
                   //echo '<pre>'; 
                    //print_r($cliente); exit;
                   ?>
                 <tr class="table-info">
                    <td> <?php echo $telefone->getNumero(); ?> </td>
                    <td> <?php echo $cliente->getNome(); ?> </td>
                    <td> <?php echo $cliente->getCpf(); ?> </td>
                    <td> <?php echo $cep->getLogradouro(); ?> </td>
                    <td> <?php echo $cliente->getNumero(); ?> </td>
                     <!-- <td> <?php echo $cliente->getCep(); ?> </td> -->
                    <td> <?php echo $cep->getBairro(); ?> </td> 
                    <td> <?php echo $cliente->getAniversario(); ?> </td>
                    <td>
                       
                        <a href="novoCliente.php?id=<?php echo $cliente->getId(); ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Alterar">A</a>
                        <a href="mantemCliente.php?id=<?php echo $cliente->getId(); ?>&acao=deletar" class="btn btn-danger delecao" data-toggle="tooltip" data-placement="top" title="Excluir">X</a>
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


